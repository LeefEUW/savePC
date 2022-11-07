<?php
 // imports 
include './utils/bddConnect.php';

$url = parse_url($_SERVER['REQUEST_URI']);

$path = isset($url['path']) ? $url['path'] : '/';

switch ($path) {
    case '/contact/addContact':
        include 'controller/ctrl_add_contact.php';
        break;

        default:
        // code
        break;
}
?> 