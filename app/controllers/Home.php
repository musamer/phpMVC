<?php

class Home extends Controller
{
    public function index()
    {
        echo 'this is home controller';
        $this->view('home');
    }
}
