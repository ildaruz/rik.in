<?php

include_once(CRegistry::GetInstance()->Get('local_classes_path') . 'util.php');

/**
 * CBaseControl
 */
abstract class CBaseControl
{
   public $m_sTempFormSessionFieldName;
   
   public $m_sHeader;
   public $m_sBody;
   public $m_sMessage;
   public $m_sFooter;
   	
	/**
	 * Конструктор
	 */
	public function __construct()
   {
      $this->m_sTempFormSessionFieldName = 'tfs';
      $this->m_sHeader = $this->CreatePageDefaultHeader();
      $this->m_sBody = $this->CreatePageDefaultBody();
      $this->m_sMessage = '';
      $this->m_sFooter = $this->CreatePageDefaultFooter();
   }

   /**
	 * Создание временной переменной формы
	 */
   public function GetTempFormSessionName()
   {
      // создание случайного хеша
      $l_sSessionName = md5(time());      
      
      // сохранение хеша в сессии
      CSession::GetInstance()->Set($l_sSessionName, 1);
      
      return $l_sSessionName;
   }
   
   /**
	 * Получение имения поля хранения временной переменной формы
	 */
   public function GetTempFormSessionField()
   {      
      return $this->m_sTempFormSessionFieldName;
   }
   
   /**
	 * Проверка временной переменной формы
	 */
   public function TempFormSessionTest()
   {
      $l_bResult = false;
      
      // проверка наличия переменной и еесостояние
      if(isset($_POST[$this->m_sTempFormSessionFieldName]) && CSession::GetInstance()->Get($_POST[$this->m_sTempFormSessionFieldName]) == 1)
      {
         // удаление временной переменной формы
         CSession::GetInstance()->Remove($_POST[$this->m_sTempFormSessionFieldName]);
         
         $l_bResult = true;
      }
      
      return $l_bResult;
   }
   
	/**
	 * Создние заголовка
	 * @return string
	 */
	public function CreatePageDefaultHeader()
	{
		$l_sHtml =
'<html>
   <head>
   </head>
   <body>
      <div align="center">
';

		return $l_sHtml;
	}

   /**
 	 * Создание основного тела
	 * @return string
	 */
	public function CreatePageDefaultBody()
	{
		$l_sHtml = 
'        It\'s work
';
      
		return $l_sHtml;
	}

	/**
	 * Создание нижней части
	 * @return string
	 */
	public function CreatePageDefaultFooter()
	{
		$l_sHtml =
'     </div>
   </body>
</html>
';

		return $l_sHtml;
	}

	/**
	 * Отображение заголовка
	 */
	public function ShowPageHeader()
	{
		echo($this->m_sHeader);
	}
	
   private function ShowPageBody()
   {
      echo($this->m_sBody);
      echo($this->m_sMessage);
   }
   
	/**
	 * Отображение нижней части
	 */
	public function ShowPageFooter()
	{
		echo($this->m_sFooter);
	}

   /**
    * Установка точки перехода
    * @param type $in_sLocation
    */
   public function SetLocation($in_sLocation)
   {
      if(trim($in_sLocation))
         SetLocation($in_sLocation);
   }
   
	/**
	 * Отображение
	 */
	public function View($in_sSubRoute = '')
	{
		$this->ShowPageHeader();
		$this->ShowPageBody();
		$this->ShowPageFooter();
		exit;
	}
};

?>
