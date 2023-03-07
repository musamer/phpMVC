<?php
defined('ROOTPATH') or exit('<h1 style="margin-top:20px;text-align:center">Access Denied!</h1>');
/**
 * customs function 
 */
checkExtensions();
function checkExtensions()
{
    $required_extensions = [
        'gd',
        'mysqli',
        'pdo_mysql',
        'pdo_sqlite',
        'curl',
        'fileinfo',
        'intl',
        'exif',
        'mbstring'
    ];
    $not_loaded = [];
    foreach ($required_extensions as $ext) {
        if (!extension_loaded($ext)) {
            $not_loaded[] = $ext;
        }
    }
    if (!empty($not_loaded)) {
        show("Please load the following extensions in your php.ini file:<br>" . implode("<br>", $not_loaded));
        die();
    }
}
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
function redirect($path)
{
    header('location: ' . ROOT . '/' . $path);
    die;
}
/** load image. if not exist, load placeholder **/
function getImage(mixed $file = '', string $type = 'post'): string
{
    $file = $file ?? '';
    if (file_exists($file)) {
        return ROOT . '/' . $file;
    }
    if ($type == 'user') {
        return ROOT . '/assets/images/user.png';
    } else {
        return ROOT . '/assets/images/no_image.jpg';
    }
}
/** return pagenation links */
function getPaginationVars(): array
{
    $vars = [];
    $vars['page']       = $_GET['page'] ?? 1;
    $vars['page']       = (int)$vars['page'];
    $vars['prev_page']  = $vars['page'] <= 1 ? 1 : $vars['page'] - 1;
    $vars['next_page']  = $vars['page'] + 1;
    return $vars;
}
