<?php
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
jimport( 'joomla.environment.request' );
jimport('joomla.user.helper');
jimport('joomla.filesystem.file');

//checks user permissions
function isAllowed($chech_perms, $user_perms) {
    $is_allowed = false;
	
    if (is_int($chech_perms)) {
        foreach($user_perms as $v) {
	        if($v == $chech_perms) $is_allowed = true;
        }	
	}
	return $is_allowed;
}

//verify email
function checkEmail($str) {
	return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
}

//Class for creating custom users
class quantumUser {

    private $myarr, $id, $output = '';

	//verify form input
    private function processForm() {
       $arr = array();
	   $arr['title'] = JRequest::getWord('title', '', 'POST');
	   $arr['fullname'] = JRequest::getString('fullname', '', 'POST');
	   $arr['email'] = JRequest::getString('email', '', 'POST');
	   $arr['username'] = JRequest::getWord('username', '', 'POST'); 
	   $arr['cell'] = JRequest::getInt('cell', '', 'POST');
	   $arr['tel'] = JRequest::getInt('tel', '', 'POST');
	   $arr['fax'] = JRequest::getInt('fax', '', 'POST' ); 
	   $arr['password'] = JRequest::getString('password', '', 'POST');
       $arr['subscribe'] = JRequest::getInt('subscribe', 1, 'POST'); 	   
	   
	   if(!checkEmail($arr['email'])) {
           echo '<script language="JavaScript">
			        alert ("Invalid Email");
					history.go(-1);
				 </script>';
           return;	   
	   }
	   
       $this->myarr = $arr;	 
       return true;	   
	}
	
    public function create() {
	    $output='';
		$home = "index.php?option=com_quantumfp&view=addclient";
	    $this->processForm();
		
	    $user['fullname'] = $this->myarr['fullname'];
		$user['email'] = $this->myarr['email'];
		$user['username'] = $this->myarr['username'];
		$password = $this->myarr['password'];
		
		$salt = JUserHelper::genRandomPassword(32);
        $crypt = JUserHelper::getCryptedPassword($password, $salt);
        $password = $crypt.':'.$salt;
		
		$instance = JUser::getInstance();		
		$config = JComponentHelper::getParams('com_users');
		$defaultUserGroup = $config->get('new_usertype', 2);
		$acl = JFactory::getACL();
		
		$instance->set('id', 0);
		$instance->set('name', $user['fullname']);
		$instance->set('username', $user['username']);
		$instance->set('password', $password);
		$instance->set('email', $user['email']);
		$instance->set('usertype', 'deprecated');
		$instance->set('groups', array($defaultUserGroup));
		

        if ($instance->save()) {      
	        $newUser =& JFactory::getUser($this->myarr['username']);
			$this->id = $newUser->get('id');
			$this->addInfo();
			$this->createFolder();
			
			$output .= "<h2>New User created</h2>";
			$output .= "-----------------------------------------";			
			$output .= "<p><strong>Name:</strong> \t ".$user['fullname']."</p>";
			$output .= "<p><strong>Username:</strong> \t ".$user['username']."</p>";
			$output .= "<p><strong>Password:</strong> \t ".$this->myarr['password']."</p>";
			$output .= "<br /> -----------------------------------------";
			
			$output .= "<p><a href=\"$home\">Go Back</a></p>";
			
			
			
			return $output;
		}
        else {   
	        return JError::raiseWarning('SOME_ERROR_CODE', $instance->getError());	
        }			
    }
	//adds more user info
    private function addInfo() {
	  if (isset($this->id)) {
	    $title = $this->myarr['title'];
		$cell = $this->myarr['cell'];
		$tel = $this->myarr['tel'];
		$fax = $this->myarr['fax'];
        $user_id = $this->id;
		
        $db =& JFactory::getDBO();
        $query = "INSERT INTO jos_quantum_users(user_id, title, cell, tel, fax) 
		          VALUES('".$user_id."', '".$title."', '".$cell."', '".$tel."', '".$fax."')";
        $db->setQuery($query);
		
		return $db->query();
      }		
	}
	
    private function createFolder() {
	  if (isset($this->id)) {
        $path = JPATH_SITE . DS . 'media' . DS . 'com_quantumfp' . DS . 'client_folders' . DS . 'user_' . $this->id;
 
		if (!JFolder::exists($path)) { 
		    if(!JFolder::create($path, 0777)) {
              echo '<script language="JavaScript">
			       alert ("Folder Already Exists, please delete old folders.");
			     </script>';
              return;
		       }
            else return true;	
        }
        else if(!JFolder::create($path . '_', 0777)){
           echo '<script language="JavaScript">
			       alert ("Folder Already Exists, please delete old folders.");
			     </script>';
           return;
        }
      }		
    }
}
/**
 * HTML View class for the HelloWorld Component
 */
class QuantumFpViewAddClient extends JView
{
        // Overwriting JView display method
        function display($tpl = null) 
        { 
		        $currentUser =& JFactory::getUser();
				$this->allowed = isAllowed(3, $currentUser->authorisedLevels());
				
	            if(!$this->allowed) {
	                header("Location: index.php");
					return;
	            }

                if(isset($_POST['import'])) {
				    $myClas = new quantumUser();
                    $a = $myClas->create();
					
                    echo $a;
					return true;
				}
				
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