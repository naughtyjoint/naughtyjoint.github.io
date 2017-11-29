<?php
$fhelp=new coderFormHelp();
$fobj=array();
$fobj[$colname["id"]]=array("type"=>"hidden","name"=>"ID","column"=>$colname["id"],"sql"=>false);
$fobj[$colname["name"]]=array("type"=>"text","name"=>"名稱","column"=>$colname["name"],'placeholder'=>'請輸入名稱',"validate"=>array('required' => 'yes','maxlength' => '60'));

$fobj[$colname["corp"]]=array("type"=>"text","name"=>"公司名稱","column"=>$colname["corp"],'placeholder'=>'請輸入公司名稱',"validate"=>array('required' => 'yes','maxlength' => '50'));
$fobj[$colname["title"]]=array("type"=>"text","name"=>"標題","column"=>$colname["title"],'placeholder'=>'請輸入標題',"validate"=>array('required' => 'yes','maxlength' => '50'));




$fhelp->Bind($fobj);
