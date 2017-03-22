<?php

/**
 * 
 * Util.php
 * 
 * Вспомогательные функции
 * 
 */

/**
 *	
 */
function getContent($in_sLink)
{
   $l_Handle   = fopen($in_sLink, 'r');
   $l_sData    = '';

   if($l_Handle)
   {
      while(!feof($l_Handle))
         $l_sData .= fgets($l_Handle, 4096);
   }

   fclose($l_Handle);

   return $l_sData;
}

/**
 *	Получение строки со времением по идентификатору
 */
function getTimeString($in_iTime)
{
   $l_sString = '';

   if($in_iTime > 0)
      $l_sString = date('d.m.Y H:i:s', $in_iTime);

   return $l_sString;
}

/**
 * Получение строки со времением по идентификатору, без секунд
 */
function getTimeStringWithoutSec($in_iTime)
{
   $l_sString = '';

   if($in_iTime > 0)
      $l_sString = date('d.m.Y H:i', $in_iTime);

   return $l_sString;
}

/**
 * Конвертирование времени в локальное
 */
function ConvertTimeToAdminTime($in_iTime)
{  
   $l_iTime = 0;

   if($in_iTime)
      $l_iTime = $in_iTime + (CRegistry::GetInstance()->Get('work_admin_correction_time') * 60 * 60);

   return $l_iTime;
}

/**
 * Генерация пароля
 */
function generatePassword($length = 8,$use_upper = true,$use_lower = true, $use_number = true, $use_custom='')
{
   $seed = '';
   $seed .= ($use_upper ? 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' : '');
   $seed .= ($use_lower ? 'abcdefghijklmnopqrstuvwxyz' : '');
   $seed .= ($use_number ? '0123456789' : '');
   $seed .= ($use_custom ? $use_custom : '');
   $seed_length = strlen($seed);

   $password = '';

   for($i = 0; $i < $length; $i++)
      $password .= $seed[rand(0, $seed_length-1)];

   return $password;
}

/**
 * Проверка является ли файл PDF
 * @param type $in_sFlename - путь к файлу
 * @return true - если файл имеет тип PDF
 */
function isPDF($in_sFlename)
{
   $l_sPDFStartData = '%PDF';
   $l_sStartData = file_get_contents($in_sFlename, false, null, 0, strlen($l_sPDFStartData));

   return ($l_sStartData == $l_sPDFStartData) ? true : false;
}

/**
 * 
 */
function getYesNoStatusString($in_iStatus = 0)
{
   $l_sStatus = 'NO';

   if($in_iStatus)
      $l_sStatus = 'YES';

   return $l_sStatus;
}

/**
 * 
 */
function DeleteFile($in_sPath)
{
   if(trim($in_sPath))
   {
      if(file_exists($in_sPath))
      {
         unlink($in_sPath);
      }
   }
}

/**
 * 
 */
function URLEexcute($in_sURL)
{
   $l_sOutput = 'failure';

   if(trim($in_sURL))
   {
      $l_pcurlData = curl_init();

      curl_setopt($l_pcurlData, CURLOPT_URL, $in_sURL);
      curl_setopt($l_pcurlData, CURLOPT_HEADER, 0);
      curl_setopt($l_pcurlData, CURLOPT_RETURNTRANSFER, 1);

      $l_sOutput = curl_exec($l_pcurlData);
      curl_close($l_pcurlData);
   }

   return $l_sOutput;
}

/**
 * Установка точки перехода
 * @param type $in_sLocation
 */
function SetLocation($in_sLocation)
{
   if(trim($in_sLocation))
   {
      header('Location: ' . $in_sLocation);
      exit;
   }
}

function curPageURL()
{
   $l_sServerPort = "80";
   $l_sPageURL = 'http';
   
   if($_SERVER["HTTPS"] == "on")
   {
      $l_sPageURL .= "s";
      $l_sServerPort = "443";
   }
   
   $l_sPageURL .= "://";
   
   if($_SERVER["SERVER_PORT"] != $l_sServerPort)
      $l_sPageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
   else
    $l_sPageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

   return $l_sPageURL;
}

?>
