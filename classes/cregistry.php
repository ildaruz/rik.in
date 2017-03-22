<?php

class CRegistry Implements ArrayAccess
{
   private $m_aVars;
   static private $instance = NULL;
   
   static public function GetInstance()
	{
		if(self::$instance == NULL)
			self::$instance = new CRegistry();

		return self::$instance;
	}
   
   /**
	 *
	 */
	private function __construct()
   {
      $this->m_aVars = array();
   }
		
	private function __clone() { /* ... */ }
			
	private function __wakeup() { /* ... */ }
   
   /*
    * 
    */
   public function Set($in_sKey, $in_Var)
   {
      if(isset($this->m_aVars[$in_sKey]))
         throw new Exception('Unable to set var `' . $in_sKey . '`. Already set.');
        
      $this->m_aVars[$in_sKey] = $in_Var;

      return true;
   }
   
   /*
    * 
    */
   public function Get($in_sKey)
   {
      if(!isset($this->m_aVars[$in_sKey]))
         return NULL;

      return $this->m_aVars[$in_sKey];
   }

   /*
    * 
    */
   public function Remove($in_sKey)
   {
      unset($this->m_aVars[$in_sKey]);
   }
   
   /*
    * 
    */
   public function offsetExists($offset)
   {
      return isset($this->m_aVars[$offset]);
   }

   /*
    * 
    */
   public function offsetGet($offset)
   {
      return $this->Get($offset);
   }

   /*
    * 
    */
   public function offsetSet($offset, $value)
   {
      $this->Set($offset, $value);
   }

   /*
    * 
    */
   public function offsetUnset($offset)
   {
      $this->Remove($offset);
   }
}

?>
