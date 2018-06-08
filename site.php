<?php

use \AjudaNerd\Page;

$app->get('/', function() {

    $page = new Page();

    $page->setTpl("index");

});

$app->get('/book', function () {

    $page = new Page();

    $page->setTpl("books");

});

$app->get('/login', function () {

    $page = new Page();

    $page->setTpl("login");

});

?>