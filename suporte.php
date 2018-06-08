<?php

use \AjudaNerd\PageSuporte;
use \AjudaNerd\Model\User;

$app->get('/suporte', function () {

    User::verifyLogin();

    $page = new PageSuporte();

    $page->setTpl("index");

});

?>