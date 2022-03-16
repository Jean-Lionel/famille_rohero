<?php

use Illuminate\Support\Facades\Route;


function setActiveRoute($name=""){
	 $routeName = Route::currentRouteName();

	 return ($routeName == $name) ? 'active' : '';
}
