<?php
defined('ROOTPATH') or exit('<h1 style="margin-top:20px;text-align:center">Access Denied!</h1>');
/**
 * Controller Home class  
 */
class Home
{
    use Controller;

    public function index()
    {
        $this->view('home');
    }
}
