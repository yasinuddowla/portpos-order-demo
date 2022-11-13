<?php
include_once('models/CustomerModel.php');
include_once('models/AddressModel.php');

class Customer
{
    public $auth;
    public $customerModel;
    public function __construct()
    {
        $this->auth = new Auth();
        $this->customerModel = new CustomerModel();
        $this->addressModel = new AddressModel();
    }
    public function get()
    {
        $userId = $this->auth->validateToken();
        $data = $this->customerModel->getAll();
        returnResponse($data);
    }
    public function add()
    {
        $userId = $this->auth->validateToken();
        $postData = getRawInput(true);

        $customerData = $this->customerModel->makeDataset($postData ?? throwError(ITEM_INSERT_FAILURE, 'Customer required.'));
        $addressData = $this->addressModel->makeDataset($postData->address ?? throwError(ITEM_INSERT_FAILURE, 'Address required.'));
        $assignAddress = $this->customerModel->assignAddress($customerData['id'], $addressData['id']);
        returnResponse($this->customerModel->getWithAddress($customerData['id']));
    }
}
