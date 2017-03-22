<?php 

// ���������� ������ ��������� �� �������
//error_reporting(0);

// ���������� ���� �� ���������
date_default_timezone_set('Europe/London');
//date_default_timezone_set('Asia/Yekaterinburg');

// ������� ������
$l_sDBDirectoryName = 'db';        // ��� ����� ��� ���� ������
$l_sClassesDirectoryName = 'classes';   // ��� ����� ��� ����� �������� ������
$l_sUploadDirectoryName = 'uploaded';  // ��� ����� ��� �������� ������

$l_sHostName = 'Rik.in';
$l_sPathOnHost = '';

// �������������� ������
$l_sURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';  // ����������� ���� url
$l_sSelfDirectoryPath = dirname(__FILE__); // ��������� �����

// �������� ��������
include_once($l_sSelfDirectoryPath . DIRECTORY_SEPARATOR . $l_sClassesDirectoryName . DIRECTORY_SEPARATOR . 'cregistry.php');
include_once($l_sSelfDirectoryPath . DIRECTORY_SEPARATOR . $l_sClassesDirectoryName . DIRECTORY_SEPARATOR . 'csession.php');

// ���������� ��������
CSession::GetInstance();
CRegistry::GetInstance();

CRegistry::GetInstance()->Set('local_db_path', $l_sSelfDirectoryPath . DIRECTORY_SEPARATOR . $l_sDBDirectoryName . DIRECTORY_SEPARATOR);
CRegistry::GetInstance()->Set('local_classes_path', $l_sSelfDirectoryPath . DIRECTORY_SEPARATOR . $l_sClassesDirectoryName . DIRECTORY_SEPARATOR);
CRegistry::GetInstance()->Set('local_upload_path', $l_sSelfDirectoryPath . DIRECTORY_SEPARATOR . $l_sUploadDirectoryName . DIRECTORY_SEPARATOR);

CRegistry::GetInstance()->Set('www_host_name', $l_sHostName);
CRegistry::GetInstance()->Set('www_work_path', $l_sURL . $l_sHostName . '/' . ((trim($l_sPathOnHost)) ? ($l_sPathOnHost . '/') : ''));

// �������� ������������ ��������
if(get_magic_quotes_gpc())
{
   // ����� �������
   foreach($_POST as $i => $data1)
   {
      // ���� ������
      if(is_array($data1))
      {
         // ����� �������
         foreach($data1 as $j => $data2)
         {
            // ���������� ��������
            $_POST[$i][$j] = stripslashes($data2);
         }
      // ������ ������
      } else
      {
         // ���������� ��������
         $_POST[$i] = stripslashes($data1);
      }
   }

   // ����� �������
   foreach($_GET as $i => $data1)
   {
      // ���� ������
      if(is_array($data1))
      {
         // ����� �������
         foreach($data1 as $j => $data2)
         {
            // ���������� ��������
            $_GET[$i][$j] = stripslashes($data2);
         }
      // ������ ������
      } else
      {
         // ���������� ��������
         $_GET[$i] = stripslashes($data1);
      }
   }
}

?>