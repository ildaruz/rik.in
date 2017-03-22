<?php

include_once(CRegistry::GetInstance()->Get('local_classes_path') . 'util.php');

class CRouter
{
   static private $instance = NULL;
   
   static public function GetInstance()
   {
      if(self::$instance == NULL)
         self::$instance = new CRouter();

      return self::$instance;
   }

   private function __construct()
   { 
   }

   private function __clone() { /* ... */ }

   private function __wakeup() { /* ... */ }

   private function InitSession()
   {      
   }

   private function ResetSession()
   {
   }

  private function StartSession()
   {
   }

   public function Show($in_sMainRoute, $in_sSubRoute)
   {
      $this->InitSession();
      $this->StartSession();

      // �������� ������� ������� ������
      if(trim($in_sMainRoute))
      {
         if($in_sMainRoute == 'logout')
         {
            $this->ResetSession();            
            SetLocation(CRegistry::GetInstance()->Get('www_cms_work_path') . 'login');
         }
         
         // ��������� ����� �����
         $l_sFile = CRegistry::GetInstance()->Get('cms_classes_path') . 'c' . $in_sMainRoute . 'pagecontrol.php';

         // �������� ������� �����
         if(file_exists($l_sFile))
         {
            // ���������� �����
            include_once($l_sFile);

            // ��������� ����� ������
            $l_sClassName  = 'c' . $in_sMainRoute . 'pagecontrol';
            $l_pClass      = NULL;

            // �������� �������
            if(class_exists($l_sClassName))
               $l_pClass = new $l_sClassName();

            // �����������
            if($l_pClass && method_exists($l_pClass, 'View'))
               $l_pClass->View($in_sSubRoute);
         }
      }

      SetLocation(CRegistry::GetInstance()->Get('www_cms_work_path') . 'default');
   }
};

?>
