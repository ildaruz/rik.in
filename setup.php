<?php 

// отключение вывода сообщений об ошибках
//error_reporting(0);

// времаенная зона по умолчанию
date_default_timezone_set('Europe/London');
//date_default_timezone_set('Asia/Yekaterinburg');

// базовые данные
$l_sDBDirectoryName = 'db';        // имя папки для базы данных
$l_sClassesDirectoryName = 'classes';   // имя папки где лежат основные классы
$l_sUploadDirectoryName = 'uploaded';  // имя папки для загрузки файлов

$l_sHostName = 'Rik.in';
$l_sPathOnHost = '';

// предворитеьные данные
$l_sURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';  // определение типа url
$l_sSelfDirectoryPath = dirname(__FILE__); // локальная папка

// загрузка регистра
include_once($l_sSelfDirectoryPath . DIRECTORY_SEPARATOR . $l_sClassesDirectoryName . DIRECTORY_SEPARATOR . 'cregistry.php');
include_once($l_sSelfDirectoryPath . DIRECTORY_SEPARATOR . $l_sClassesDirectoryName . DIRECTORY_SEPARATOR . 'csession.php');

// заполнение регистра
CSession::GetInstance();
CRegistry::GetInstance();

CRegistry::GetInstance()->Set('local_db_path', $l_sSelfDirectoryPath . DIRECTORY_SEPARATOR . $l_sDBDirectoryName . DIRECTORY_SEPARATOR);
CRegistry::GetInstance()->Set('local_classes_path', $l_sSelfDirectoryPath . DIRECTORY_SEPARATOR . $l_sClassesDirectoryName . DIRECTORY_SEPARATOR);
CRegistry::GetInstance()->Set('local_upload_path', $l_sSelfDirectoryPath . DIRECTORY_SEPARATOR . $l_sUploadDirectoryName . DIRECTORY_SEPARATOR);

CRegistry::GetInstance()->Set('www_host_name', $l_sHostName);
CRegistry::GetInstance()->Set('www_work_path', $l_sURL . $l_sHostName . '/' . ((trim($l_sPathOnHost)) ? ($l_sPathOnHost . '/') : ''));

// удаление экранирующих символов
if(get_magic_quotes_gpc())
{
   // обход массива
   foreach($_POST as $i => $data1)
   {
      // если массив
      if(is_array($data1))
      {
         // обход массива
         foreach($data1 as $j => $data2)
         {
            // сохранение значения
            $_POST[$i][$j] = stripslashes($data2);
         }
      // строка данных
      } else
      {
         // сохранение значения
         $_POST[$i] = stripslashes($data1);
      }
   }

   // обход массива
   foreach($_GET as $i => $data1)
   {
      // если массив
      if(is_array($data1))
      {
         // обход массива
         foreach($data1 as $j => $data2)
         {
            // сохранение значения
            $_GET[$i][$j] = stripslashes($data2);
         }
      // строка данных
      } else
      {
         // сохранение значения
         $_GET[$i] = stripslashes($data1);
      }
   }
}

?>