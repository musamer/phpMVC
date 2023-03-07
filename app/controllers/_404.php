<?php
defined('ROOTPATH') or exit('<h1 style="margin-top:20px;text-align:center">Access Denied!</h1>');
/**
 * Not Found Page Class
 */
class _404
{
    use Controller;

    public function index()
    {
        echo 'Page Not Found';
    }
}
