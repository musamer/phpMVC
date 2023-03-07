<?php
defined('ROOTPATH') or exit('<h1 style="margin-top:20px;text-align:center">Access Denied!</h1>');
/**
 * User Calss
 */
class User
{
    use Model;
    protected $table = 'users';
    protected $allowedColums = [
        'name',
        'email'
    ];
}
