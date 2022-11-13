<?php

function validateInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function validateFormData($arr)
{
    if (!is_array($arr)) return null;
    foreach ($arr  as $key => $val) {
        $arr[$key] = validateInput($val);
    }
    return $arr;
}

function getPhoneNumberWithCountryCode($num, $code = '+88')
{
    $phoneNumberLength = 11;
    $len = strlen($num);
    if ($len == 11) {
        if ($num[0] !== '0') return false;
        else $validNo = $num;
    } else if ($len == 13) {
        $sub = substr($num, 0, 2);
        if ($sub != '88') return false;
        else $validNo = substr($num, -$phoneNumberLength, $phoneNumberLength);
    } else if ($len == 14) {
        if (substr($num, 0, 3) !== '+88') return false;
        else $validNo = substr($num, -$phoneNumberLength, $phoneNumberLength);
    } else {
        return false;
    }
    return $code . $validNo;
}
function getRawInput($asObject = false)
{
    $asArray = $asObject ? false : true;
    $handler = fopen('php://input', 'r');
    return json_decode(stream_get_contents($handler), $asArray);
}
function pp($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
function ppd($arr)
{
    pp($arr);
    die();
}
function getDataFromMysqlObject($result, $asObject = false)
{
    $data = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $asObject ? json_decode(json_encode($data)) : $data;
}

function removeFields($arr)
{
    $indices = ['id', 'created_at', 'updated_at'];
    foreach ($indices as $i) {
        unset($arr[$i]);
    }
    return $arr;
}
