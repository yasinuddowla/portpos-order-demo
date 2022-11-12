<?php
include_once('models/CustomerModel.php');
include_once('models/AddressModel.php');

class Customer
{
    public $auth;
    public $custmoerModel;
    public function __construct()
    {
        $this->auth = new Auth();
        $this->custmoerModel = new CustomerModel();
        $this->addressModel = new AddressModel();
    }
    public function get()
    {
        $userId = $this->auth->validateToken();
        $data = $this->custmoerModel->getAll();
        returnResponse($data);
    }
    public function add()
    {
        $userId = $this->auth->validateToken();
        $postData = getRawInput(true);

        $customerData = $this->custmoerModel->makeDataset($postData ?? throwError(ITEM_INSERT_FAILURE, 'Customer required.'));
        $addressData = $this->addressModel->makeDataset($postData->address ?? throwError(ITEM_INSERT_FAILURE, 'Address required.'));
        $customerAddressData = $this->custmoerModel->assignAddress($customerData['id'], $addressData['id']);

        returnResponse($customerAddressData);
    }
}
