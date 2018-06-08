<?php

use \AjudaNerd\PageAdmin;
use \AjudaNerd\Model\User;

$app->get('/admin/profile', function () {

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("profile");

});

?>