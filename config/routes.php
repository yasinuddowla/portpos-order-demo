<?php

include_once('config/autoload.php');

$request = $_SERVER['REQUEST_URI'];
$method = strtoupper($_SERVER['REQUEST_METHOD']);

if ($request === '/' && $method === GET) {
    $home = new Home;
    $home->index();
} elseif ($request === '/login' && $method === POST) {
    $user = new User;
    $user->login();
} elseif ($request === '/logout' && $method === POST) {
    $user = new User;
    $user->logout();
} elseif ($request === '/customers' && $method === GET) {
    $customer = new Customer;
    $customer->get();
} elseif ($request === '/customers' && $method === POST) {
    $customer = new Customer;
    $customer->add();
} elseif ($request === '/products' && $method === POST) {
    $customer = new Product;
    $customer->add();
} elseif ($request === '/products' && $method === GET) {
    $customer = new Product;
    $customer->get();
} elseif ($request === '/orders' && $method === POST) {
    $order = new Order;
    $order->add();
} elseif ($request === '/orders' && $method === PATCH) {
    $order = new Order;
    $order->updateStatus();
} else {
    $error = new CustomError();
    $error->show_404();
}

exit(1);
