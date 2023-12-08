<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database', 'session','email','cart');

$autoload['drivers'] = array();

$autoload['helper'] = array('url','html','form');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('Cart_model');