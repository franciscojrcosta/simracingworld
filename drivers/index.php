<?php

require_once("../vendor/autoload.php");

$f3 = \Base::instance();

$f3->set('APPNAME', 'SimRacingWorld');
$f3->set('APPVERSION','1.0');
$f3->set('AUTHOR','Francisco Costa');

$f3->set('THEME', 'bs5'); //defining Theme directory 
$f3->set('LOCALES', 'dict/'); //defining where dictionaire files are
//$f3->set('LANGUAGE','en'); //defining default language, if not set than browser lang is used
$f3->set('FALLBACK','en');  //defining the default language when the browser language is not found

$f3->config('config.ini');
$f3->config('routes.ini');

$f3->run();