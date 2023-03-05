<?php

class Home extends Controller
{
    public function index()
    {
        $model = new Model();
        $arr['id'] = 1;
        $arr['name'] = 'sds';
        $result = $model->first($arr);
        show($result);
        echo 'this is home controller';
        $this->view('home');
    }
}
