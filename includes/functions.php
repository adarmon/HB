<?php
// constantes
define('ROOTDIR', $_SERVER['DOCUMENT_ROOT']);

// debug
function ff($tab) {
	if($tab) {
		$e = "<pre>";
		$e .= print_r($tab, true);
		$e .= "</pre>";

		echo $e;
	}
	return false;
}

// add message
function addMessage($code, $type, $message) {
	$_SESSION['msg'][]=array(
	'code'=> $code,
	'type'=> $type,
	'label'=> $message);
}

// return area of a circle
function circleArea($r) {
	$area = M_PI * pow($r, 2);
	return $area;
}