<?php

require_once 'Application/Config/autoload.php';
require_once 'Application/Config/config.php';


foreach($autoload as $keys => $values){
	foreach($values as $value){
		require_once 'System/' . $keys . '/' . $value . '.php';
	}
}

spl_autoload_register(function($class){
	require_once 'Core/' . $class . '.php';
});