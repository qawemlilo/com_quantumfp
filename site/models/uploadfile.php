<?php
defined('_JEXEC') or die('Restricted access');
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
class QuantumFpModelUploadFile extends JModelItem
{
        protected $users;
        public function getUsers() 
        {
                if (!isset($this->users)) 
                {
                       $db =& JFactory::getDBO();					   
					   $query = "SELECT DISTINCT user_id FROM #__quantum_users";
					   $db->setQuery($query);
					   $result = $db->loadResultArray();
					   $query_two_string = implode(",", $id_arr);
					   
                       $query_two = "SELECT id, name FROM #__users WHERE id in ($query_two_string)";
                       $db->setQuery($query_two);
				       $this->users = $db->loadAssocList();
                }
                return $this->users;
        }
}
