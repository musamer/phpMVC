<?php

class Home extends Controller
{
    public function index()
    {
        $model = new Model();
        $arr['name'] = 'ali';
        $arr['email'] = 'a@a.com';
        $result = $model->update(1, $arr);
        show($result);
        $this->view('home');
    }
}
