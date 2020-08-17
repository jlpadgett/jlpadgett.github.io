<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './vendor/autoload.php';

use FormGuide\Handlx\FormHandler;

$pp = new FormHandler(); 

$validator = $pp->getValidator();
$validator->fields(['name','email'])->areRequired();
$validator->field('email')->isEmail();
$validator->fields(['school','position'])->areRequired();
$validator->field('other');
$validator->field('background');
$validator->field('interests');

$pp->attachFiles(['cv']);

$pp->sendEmailTo('joshua.padgett@ttu.edu'); 

echo $pp->process($_POST);
