<?php

use \AjudaNerd\PageAdmin;
use \AjudaNerd\Model\User;
use \AjudaNerd\Model\Book;

$app->get("/admin/books", function () {

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("books");

});

$app->get("/admin/books/create", function () {

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("books-create");

});

