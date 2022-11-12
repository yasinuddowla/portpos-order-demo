<?php


class User
{
    public function login()
    {
        $postData = getRawInput();
        $username = $postData['username'] ?? '';
        $password = $postData['password'] ?? '';
        $auth = new Auth();
        $auth->getToken($username, $password);
    }
}
