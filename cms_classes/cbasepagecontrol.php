<?php

include_once(CRegistry::GetInstance()->Get('local_classes_path') . 'cbasecontrol.php');

/**
* CBasePageControll
*/
abstract class CBasePageControl extends CBaseControl
{
	/**
	 * Конструктор
	 */
	public function __construct()
	{
		parent::__construct();
      
      $this->m_sHeader = $this->CreatePageHeader();
      $this->m_sFooter = $this->CreatePageFooter();
	}

	/**
	 * Создние заголовка
	 * @return string
	 */
	public function CreatePageHeader()
	{
		$l_sHtml =
'
<html>
   <head>
	   <title>' . $this->GetTitle() . '</title>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
		<meta http-equiv="pragma" content="no-cache">
		<meta http-equiv="cache-control" content="no-cache">
		<link rel="shortcut icon" href="' . CRegistry::GetInstance()->Get('www_work_path') . 'favicon.ico">
		<link href="' . CRegistry::GetInstance()->Get('www_work_path') . 'style.css" type="text/css" rel="stylesheet">
   </head>
   <body>
		<table width="750" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  			<tr>
    			<td>
    				<table border="0" cellspacing="0" cellpadding="0" style="margin-left:94px ">
      				<tr>
        					<td>
	        					<div class="header">
					         	<div class="logo"><a href="' . CRegistry::GetInstance()->Get('www_cms_work_path') . '" class="logo">' . CRegistry::GetInstance()->Get('www_host_name') . '</a></div>
					         </div>
        					</td>
      				</tr>';

		return $l_sHtml;
	}
	
	/**
	 * Создание нижней части
	 * @return string
	 */
	public function CreatePageFooter()
	{
		$l_sHtml =
'
      				<tr>
        					<td height="33" background="images/bg_footer.gif">
        					<div class="footer">
					         	<div class="copyright"><a href="' . CRegistry::GetInstance()->Get('www_cms_work_path') . '" class="copyright">Rik.in © 2012-2013 All rights reserved</a></div>
					         </div>
        					</td>
      				</tr>
    				</table>
    			</td>
  			</tr>
		</table>
	</body>
</html>
';

		return $l_sHtml;
	}
   
   public function GetTitle()
   {
      return CRegistry::GetInstance()->Get('www_host_name');
   }
};

?>
