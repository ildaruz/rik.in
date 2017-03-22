<?php

   /**
    *
    */
   class CSession Implements ArrayAccess
   {
      static private $instance = NULL;

      /**
       *
       */
      static public function GetInstance()
      {
         if(self::$instance == NULL)
            self::$instance = new CSession();

         return self::$instance;
      }

      /**
       *
       */
      private function __construct()
      {
         session_start();
      }

      /**
       *
       */
      private function __clone() { /* ... */ }

      /**
       *
       */
      private function __wakeup() { /* ... */ }

      /*
       * 
       */
      public function Set($in_sKey, $in_Var)
      {
         $_SESSION[$in_sKey] = $in_Var;
         
         return true;
      }

      /*
       * 
       */
      public function Get($in_sKey)
      {
         if(!isset($_SESSION[$in_sKey]))
            return NULL;

         return $_SESSION[$in_sKey];
      }

      /*
       * 
       */
      public function Remove($in_sKey)
      {
         unset($_SESSION[$in_sKey]);
      }

      /*
       * 
       */
      public function offsetExists($offset)
      {
         return isset($_SESSION[$offset]);
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
   };

?>
