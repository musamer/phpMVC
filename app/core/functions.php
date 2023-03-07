<?php
defined('ROOTPATH') or exit('<h1 style="margin-top:20px;text-align:center">Access Denied!</h1>');
/**
 * customs function 
 */
function show($staff)
{
    echo '<pre>';
    print_r($staff);
    echo '</pre>';
}
function esc($str)
{
    return htmlspecialchars($str);
}
