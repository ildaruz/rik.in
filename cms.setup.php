<?php
include_once 'setup.php';

// ���������� ������ ��������� �� �������
//error_reporting(0);
   
// ������� ������
$l_sCmsClassesDirectory	= 'cms_classes';           // ����� � ��������

// �������������� ������
$l_sSelfDirectoryPath      = dirname(__FILE__);    // ��������� �����

// ���������� ��������
CRegistry::GetInstance()->Set('cms_classes_path', $l_sSelfDirectoryPath . DIRECTORY_SEPARATOR . $l_sCmsClassesDirectory . DIRECTORY_SEPARATOR);
CRegistry::GetInstance()->Set('www_cms_work_path', CRegistry::GetInstance()->Get('www_work_path') . 'cms/');
   
?>