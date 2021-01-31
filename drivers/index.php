<?php

/*
 * Copyright (C) 2021 SimRacingWorld by Francisco Costa
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

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