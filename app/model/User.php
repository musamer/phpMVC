<?php

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
