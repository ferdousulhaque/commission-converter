<?php

// AutoLoader
require './vendor/autoload.php';

use \Src\Commission;

try{
    Commission::calculateCommission($argv[1]);
}catch (\Exception $ex){
    echo $ex->getMessage();die;
}

