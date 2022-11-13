<?php
define('USER_ISSUER',     'portpos-order-tracker');
define('JWT_SECRETE_KEY', '29ced1067c81fdfaeb29985a6f47f6b5040aeae7');
include_once('libraries/Jwt.php');

class Auth
{
    function __construct()
    {
        $this->expireAt = time() + (15 * 24 * 60 * 60);
        $this->issuedAt = time();
    }

    public $expireAt;
    public $issuedAt;
    public $username = 'test@test.com';
    public $password = 'test123';
    public $userId = 123;
    public function getToken($username, $password)
    {
        if ($username !== $this->username || $password !== $this->password) {
            throwError(UNAUTHORIZED, 'Invalid login');
        }
        try {
            $payload = [
                'iat' => $this->issuedAt,
                'iss' => USER_ISSUER,
                'exp' => $this->expireAt,
                'id' => $this->userId
            ];
            $token = $this->generateToken($payload);
            $data = [
                'user_id' => $this->userId,
                'token' => $token,
            ];
            setSession('loggedIn', true);
            returnResponse($data);
        } catch (Exception $e) {
            throwError(JWT_PROCESSING_ERROR, $e->getMessage());
        }
    }
    public function generateToken($payload)
    {
        try {
            return JWT::encode($payload, JWT_SECRETE_KEY);
        } catch (Exception $e) {
            throwError(JWT_PROCESSING_ERROR, $e->getMessage());
        }
    }

    public function validateToken()
    {
        if (!getSession('loggedIn')) throwError(UNAUTHORIZED);
        try {
            $token = $this->getBearerToken();
            $payload = JWT::decode($token, JWT_SECRETE_KEY, ['HS256']);
            $issuer = $payload->iss;
            if ($issuer != USER_ISSUER) {
                throwError(UNAUTHORIZED);
            }
            $userId = $payload->id;
            return $userId;
        } catch (Exception $e) {
            throwError(ACCESS_TOKEN_ERRORS, $e->getMessage());
        }
    }

    public function getAuthorizationHeader()
    {
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        } else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }

    public function getBearerToken()
    {
        $headers = $this->getAuthorizationHeader();
        // HEADER: Get the access token from the header
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }
        throwError(AUTHORIZATION_HEADER_NOT_FOUND, 'Access Token Not found');
    }
}
