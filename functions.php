<?php

use \AjudaNerd\Model\User;

function getUserName() {

    $user = User::getFromSession();

    return $user->getperson();

}

function getUserPhoto() {

    $user = User::getFromSession();

    return $user->getimgprofile();

}

function getUserProfession() {

    $user = User::getFromSession();

    return $user->getprofession();

}

function getFormatDate() {

    $user = User::getFromSession();

    return $user->getdtregister();

}

function getUsersTotal() {

    $user = new User;

    $totals = $user->getUsersTotals();

    return $totals['nrqtd'];

}