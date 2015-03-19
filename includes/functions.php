<?php
// constantes
define('ROOTDIR', $_SERVER['DOCUMENT_ROOT']);
define('CLASSES_DIR', ROOTDIR.'/models');

// db connexion
require_once('includes/connexion.php');

/** autoload
 * 
 * @param type $classname
 */
function __autoload($classname) {
    require(CLASSES_DIR . '/' . $classname . '.php');
}

/**
 * debug
 * 
 * @param type $tab
 * @return boolean
 */
function ff($tab) {
    if ($tab) {
        $e = "<pre>";
        $e .= print_r($tab, true);
        $e .= "</pre>";

        echo $e;
    }
    return false;
}

/**
 * add message
 * 
 * @param type $code
 * @param type $type
 * @param type $message
 */
function addMessage($code, $type, $message) {
    $_SESSION['msg'][] = array(
        'code' => $code,
        'type' => $type,
        'label' => $message);
}

/** return area of a circle
 * 
 * @param type $r
 * @return type
 */
function circleArea($r) {
    $area = M_PI * pow($r, 2);
    return $area;
}
