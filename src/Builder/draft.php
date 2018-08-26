<?php

class Product {
    public $name;
    public $price;
    public $discounts = array();

}

class Discount {
    public $name;
    public $description;
    public $policies = array();
}

class DiscountPolicy {
    public $startDate;
    public $endDate;
    public $quantity;
    public $limit;
    public $amount;
    public $policies = array();
}

class DiscountManager {

}

class Invoice {
    public $total;
    public $tax;
    public $customer;
    public $address;
    public $payment;
    public $invoiceItems = array();
}

class InvoiceItem {
    public $name;
    public $price;
    public $quantity;
    public $total;
    public $type;

}

class Address {}
class Customer {}
class Payment {}

class Order {
    public function __construct()
    {
    }

}
class OrderList {
    private $products = array();
    public function addOrder($name, $quantity)
    {
        $p = new Product();
        $p->name = $name;

        $this->products[] = $p;
    }

    public function getOrder()
    {
        return $this->products;
    }
}

class InvoiceBuilder {
    public function getInvoice()
    {
        $inv = new Invoice();


    }
}
class InvoiceItemBuilder {

}

$p = new Product();
$p->id = 1;
$p->name = 'pencil';
$p->price = 1;

$p1 = new Product();
$p1->id = 2;
$p1->name = 'notebook';
$p1->price = 3;

$p1 = new Product();
$p1->id = 3;
$p1->name = 'premium notebook';
$p1->price = 5;

$d = new Discount();
$d->name = 'Buy 2 premium notebook,
 Get 1 free regular notebook, limit 4 per customer';
$d->amount = '.5';
$d->rules = [
    [
        'min' => 2,
        'limit' => 4,
        'amount' => 1,
        'pid' => 3,
        'rules' => [
            [
                'qty' => 1,
                'amount' => 0,
                'pid' => 2
            ]
        ]
    ]

];

$d2 = new Discount();
$d2->name = 'Buy 2 premium notebook Get 1 50%,
 or 4 notebook Get 1 Free';
$d2->amount = '.5';
$d2->rules = [
    [
        'min' => 2,
        'limit' => 4,
        'amount' => 1,
        'pid' => 3,
        'rule' => [
            'amount' => '.5',
            'pid' => 3,
            'qty' => 1
        ]
    ],
    [
        'min' => 4,
        'pid' => 2,
        'limit' => 8,
        'rules' => [
            'amount' => 0,
            'pid' => 2,
            'qty' => 1
        ]
    ]
];

$rule = new DiscountPolicy();


$orderList = new OrderList();
$orderList->addOrder('pencil', 12);
$orderList->addOrder('notebook', 3);
$products = $orderList->getOrder();
$payment = new Payment();

foreach ($products as $product) {
    $item = new InvoiceItem();
    $item->name = $product->name;
}
