<?php

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
