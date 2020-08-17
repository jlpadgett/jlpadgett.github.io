<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './vendor/autoload.php';

use FormGuide\Handlx\FormHandler;

$pp = new FormHandler(); 

$validator = $pp->getValidator();
$validator->fields(['name','email','funding'])->areRequired();
$validator->field('email')->isEmail();
$validator->fields(['school','position'])->areRequired();
$validator->field('other');
$validator->field('poster');
$validator->field('title');
$validator->field('abstract');
$validator->fields(['room','roomate']);
$validator->field('reason')->maxLength(6000);

$pp->attachFiles(['cv']);

$pp->sendEmailTo(['joshua.padgett@ttu.edu','a.peace@ttu.edu']); 

echo $pp->process($_POST);
