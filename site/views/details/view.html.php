<?php
defined('_JEXEC') or die('Restricted access');
// import Joomla view library
jimport('joomla.application.component.view');
function isAllowed($chech_perms, $user_perms) {    $is_allowed = false;	    if (is_int($chech_perms)) {        foreach($user_perms as $v) {	        if($v == $chech_perms) $is_allowed = true;        }		}	return $is_allowed;}
class QuantumFpViewDetails extends JView
{
        function display($tpl = null) 
        { 
		        $currentUser =& JFactory::getUser();
				$this->q_users = $this->get('Users');
				$this->allowed = isAllowed(3, $currentUser->authorisedLevels());				
	            if($currentUser->get('guest')) {
	                header("Location: index.php");
					return;
	            }
                if (count($errors = $this->get('Errors'))) 
                {
                        JError::raiseError(500, implode('<br />', $errors));
                        return false;
                }
                // Display the view
                parent::display($tpl);
        }
}
