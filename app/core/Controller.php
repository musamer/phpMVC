<?php
defined('ROOTPATH') or exit('<h1 style="margin-top:20px;text-align:center">Access Denied!</h1>');
/**
 * Controller trait
 */
trait Controller
{
    public function view($name, $data = [])
    {
        if (!empty($data))
            extract($data);

        $filename = '../app/views/' . $name . '.view.php';
        if (file_exists($filename)) {
            require $filename;
        } else {
            $filename = '../app/views/404.view.php';
            require $filename;
        }
    }
}
