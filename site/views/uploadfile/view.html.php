<?php
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');
jimport('joomla.filesystem.file');
jimport('joomla.user.helper');
jimport( 'joomla.environment.request' );


function isAllowed($chech_perms, $user_perms) {
    $is_allowed = false;
	
    if (is_int($chech_perms)) {
        foreach($user_perms as $v) {
	        if($v == $chech_perms) $is_allowed = true;
        }	
	}
	return $is_allowed;
}


class quantumFiles {
  private $client, $filename, $filetype;
	
  public function upload($userName) {
    $home = "index.php?option=com_quantumfp&view=uploadfile";
    $file = JRequest::getVar('file_upload', null, 'files', 'array');
		$client = JRequest::getInt('client', null, 'POST');
		$filetype = JRequest::getWord('filetype', '', 'POST');
		
		jimport('joomla.filesystem.file');
		
		$filename = JFile::makeSafe($file['name']);
		$src = $file['tmp_name'];
		$dest = JPATH_SITE . DS . 'media' . DS . 'com_quantumfp' . DS . 'client_folders' . DS . 'user_' . $client . DS . $filename;
		
		$this->client = $client;
		$this->filename = $filename;
		$this->filetype = $filetype;
		
		if ( strtolower(JFile::getExt($filename) ) == 'pdf') {
		    if ( JFile::upload($src, $dest) ) {
			
		      $this->databaseRegister();
			
			    $output .= "<h2 style=\"color: green\">File uploaded successful</h2>";
			    $output .= "-----------------------------------------";			
			    $output .= "<p><strong>Client:</strong> \t " . $userName . "</p>";
			    $output .= "<p><strong>File Type</strong> \t " . $filetype . "</p>";
			    $output .= "<br /> -----------------------------------------";
			
			    $output .= "<p><a href=\"$home\">Go Back</a></p>";
			
			    return $output;
				
			} else {
			    $output .= "<h2 style=\"color: red\">File uploaded failed</h2>";
			    $output .= "-----------------------------------------";			
			    $output .= "<p><strong>Client:</strong> \t " . $userName . "</p>";
			    $output .= "<p><strong>File Type</strong> \t " . $filetype . "</p>";
			    $output .= "<br /> -----------------------------------------";
			
			    $output .= "<p><a href=\"$home\">Go Back</a></p>";         
            }
		}
  }	
	
	private function databaseRegister() {
		$user_id = $this->client;
		$name = $this->filename;
		$file_type = $this->filetype;
		$file_url = "http://www.quantumfp.co.za/home/media/com_quantumfp/client_folders/user_" . $user_id ."/" . $name;
		
    $db =& JFactory::getDBO();
    if ($file_type == 'tracker') {
        $query = "UPDATE jos_quantum_files SET `name`= '".$name."', `file_url`='".$file_url."' WHERE `user_id`='".$user_id."' AND `file_type`='tracker'";
    }
    else {
        $query = "INSERT INTO jos_quantum_files(`user_id`, `name`, `file_url`, `file_type`) VALUES('".$user_id."','".$name."','".$file_url."','".$file_type."')";
    }
    $db->setQuery($query);
		
		return $db->query();    
  }
}

/**

 * HTML View class for the HelloWorld Component

 */

class QuantumFpViewUploadFile extends JView {

    // Overwriting JView display method
    function display($tpl = null)  {

		    $currentUser =& JFactory::getUser();
				$this->allowed = isAllowed(3, $currentUser->authorisedLevels());

			  if(!$this->allowed) {
	         header("Location: index.php");
           return;
        }
        
			  if(isset($_POST['import'])) {
	         $quantumFiles = new quantumFiles();   
	         $result = $quantumFiles->upload($currentUser->get('name'));
	         
	         echo $result;
           return;
        }

        $this->users = $this->get('Users');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        // Display the view
        parent::display($tpl);
     }
}

