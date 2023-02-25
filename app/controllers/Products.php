<?php

class Products extends Controller
{
    public function index()
    {
        echo 'this is Products  controller';
        $this->view('products/pro');
    }
}
