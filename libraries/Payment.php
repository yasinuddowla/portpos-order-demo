<?php
define('APPKEY', 'db09e1518d5f4ebddc74db6877791573');
define('SECRETKEY', '882320eeca83f9e79e61cb9b15b57b81');
class Payment
{
    public $createInvoiceUrl = 'https://api-sandbox.portwallet.com/payment/v2/invoice';
    public $ipnValidateUrl = 'https://api-sandbox.portwallet.com/payment/v2/invoice/ipn/';
    public $method = 'POST';
    public function __construct()
    {
    }
    public function makeOrder($orderData)
    {
        $token = "Bearer " . $this->getEncodedToken();
        $headers = array(
            'Content-Type: application/json',
            'Authorization: ' . $token,
        );
        $invoiceInfo = $this->makeRequest($this->createInvoiceUrl, json_encode($orderData), $headers);
        return [
            'status' => $invoiceInfo->result,
            'invoice_id' => $invoiceInfo->data->invoice_id,
            'payment_url' => $invoiceInfo->data->action->url
        ];
    }
    public function ipnValidate($invoiceId, $amount)
    {
        $token = "Bearer " . $this->getEncodedToken();
        $headers = array(
            'Content-Type: application/json',
            'Authorization: ' . $token,
        );
        $this->ipnValidateUrl .= "{$invoiceId}/{$amount}/";
        $invoiceInfo = $this->makeRequest($this->ipnValidateUrl, [], $headers);
        return [
            'status' => strtolower($invoiceInfo->data->order->status),
            'invoice_id' => $invoiceInfo->data->invoice_id
        ];
    }
    public function getEncodedToken()
    {
        return base64_encode(APPKEY . ":" . md5(SECRETKEY . time()));
    }
    public function makeRequest($url, $data, $headers)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $this->method);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

        $resultdata = curl_exec($curl);
        curl_close($curl);
        return json_decode($resultdata);
    }
}
