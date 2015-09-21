<?php
ini_set('error_reporting', E_ALL);

// initiate Hyde
require_once 'Hyde/Hyde.php';
$app = new Hyde();

// pages
$app->addPage('/', 'home');

// route pages (must go at end)
$app->routePages();
