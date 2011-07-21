<?php
defined('_JEXEC') or die('Restricted access');
// import Joomla controller library
jimport('joomla.application.component.controller');
class QuantumFpController extends JController
{
	function display() {
	   //if user has not requested for a particular page
       if(!JRequest::getVar('view')) {
	          //make add client the default
              JRequest::setVar('view', 'addclient');
       }
       parent::display();    
    }
}
