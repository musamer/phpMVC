<?php

/**
 * Conntroller Home class  
 */
class Home extends Controller
{
    public function index()
    {
        $user = new User;
        $result = $user->where(['id' => 3]);
        show($result);
        $this->view('home');
    }
}
