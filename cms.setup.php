<?php
include_once 'setup.php';

// отключение вывода сообщений об ошибках
//error_reporting(0);
   
// базовые данные
$l_sCmsClassesDirectory	= 'cms_classes';           // папка с классами

// предворитеьные данные
$l_sSelfDirectoryPath      = dirname(__FILE__);    // локальная папка

// заполнение регистра
CRegistry::GetInstance()->Set('cms_classes_path', $l_sSelfDirectoryPath . DIRECTORY_SEPARATOR . $l_sCmsClassesDirectory . DIRECTORY_SEPARATOR);
CRegistry::GetInstance()->Set('www_cms_work_path', CRegistry::GetInstance()->Get('www_work_path') . 'cms/');
   
?>