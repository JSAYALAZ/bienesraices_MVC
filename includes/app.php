<?php

require __dir__.'/funciones.php';
require  dirname(__DIR__).'/vendor/autoload.php';
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

$db=incluirDB();

use Model\ActiveRecord;

ActiveRecord::setDb($db);
