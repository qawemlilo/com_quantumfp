<?php
defined('_JEXEC') or die('Restricted access');
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');
class QuantumFpModelDetails extends JModelItem
{
        protected $users;

        private function combineMyArrays($arr1, $arr2) 
        {
		            $comb = array();
                    $comb = array_merge($arr1, $arr2);
					$resul = array();					
				    foreach($comb as $val) {
					      foreach($val as $key2 => $val2) {
                              $resul[0][$key2] = $val2;
					      }
					}
                return $resul;
        }
        public function getUsers() 
        {
                if (!isset($this->users)) 
                {
                       $user = JFactory::getUser();
                       $id = $user->id;
                       $db =& JFactory::getDBO();
                       $query = $query = "SELECT id, name, username, email FROM #__users WHERE jos_users.id=$id";
					   $query2 = "SELECT title,  fax, cell, tel  FROM #__quantum_users WHERE user_id = $id";
                       $db->setQuery($query);
				       $user_table1 = $db->loadAssocList();
					   $db->setQuery($query2);
					   $user_table2 = $db->loadAssocList();
					   $this->users = $this->combineMyArrays($user_table1, $user_table2);
                }
                return $this->users;
        }
}
