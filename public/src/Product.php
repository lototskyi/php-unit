<?php

class Product
{
    protected int $product_id;

    public function __construct()
    {
        $this->product_id = rand();
    }
}