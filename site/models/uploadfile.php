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
                       $query = "SELECT id, name FROM #__users";
                       $db->setQuery($query);
				       $this->users = $db->loadAssocList();
                }
                return $this->users;
        }
}
