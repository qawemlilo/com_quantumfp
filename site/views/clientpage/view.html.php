<?php
defined('_JEXEC') or die('Restricted access');
// import Joomla view library
jimport('joomla.application.component.view');
function isAllowed($chech_perms, $user_perms) {

class QuantumFpViewClientPage extends JView
{
        // Overwriting JView display method
        function display($tpl = null) 
        { 
                $currentUser =& JFactory::getUser();
                $this->current_user = $currentUser->get('name');
				$this->allowed = isAllowed(3, $currentUser->authorisedLevels());
	            if($currentUser->get('guest')) {
	                header("Location: index.php");
					return;
	            }				
		        $this->tracker = $this->get('Tracker');
				$this->correspondence = $this->get('Correspondence');
				$this->document = $this->get('Documents');
                // Check for errors.
                if (count($errors = $this->get('Errors'))) 
                {
                    JError::raiseError(500, implode('<br />', $errors));
                    return false;
                }
                // Display the view
                parent::display($tpl);
        }
}