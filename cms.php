<?php

/**
 *    Точка входа cms.php
 *    
 *    Используется для обычных пользователей
 */

include_once('cms.setup.php');
include_once(CRegistry::GetInstance()->Get('cms_classes_path') . 'crouter.php');

$l_sRoute = '';

if(isset($_GET['route']))
   $l_sRoute = $_GET['route'];

$l_sRoute = trim($l_sRoute, '/\\');
$l_aParts = explode('/', $l_sRoute);

$l_sMainRoute = $l_sRoute;
$l_sSubRoute  = '';

if(isset($l_aParts[0]))
{
   $l_sMainRoute = $l_aParts[0];

   if(isset($l_aParts[1]))
   {
      $l_sSubRoute = $l_aParts[1];
   }
}

CRouter::GetInstance()->Show($l_sMainRoute, $l_sSubRoute);
?>