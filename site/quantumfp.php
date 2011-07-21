<?php
defined('_JEXEC') or die('Restricted access');
// import joomla controller library
jimport('joomla.application.component.controller');

// it will create a controller named QuantumFpController using the controller.php file
$controller = JController::getInstance('QuantumFp');
// Perform the Request task
$controller->execute(JRequest::getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();
