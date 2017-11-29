<?php
$fhelp=new coderFormHelp();
$fobj=array();
$fobj[$colname["id"]]=array("type"=>"hidden","name"=>"ID","column"=>$colname["id"],"sql"=>false);
$fobj[$colname["bank_no"]]=array("type"=>"text","name"=>"卡號","column"=>$colname["bank_no"],'placeholder'=>'請輸入卡號',"validate"=>array('required' => 'yes','maxlength' => '50'));
$fobj[$colname["name"]]=array("type"=>"text","name"=>"名稱","column"=>$colname["name"],'placeholder'=>'請輸入名稱',"validate"=>array('required' => 'yes','maxlength' => '60'));
$fobj[$colname["money_min"]]=array("type"=>"text","name"=>"最小出款","column"=>$colname["money_min"],'placeholder'=>'請輸入最小出款',"validate"=>array('required' => 'yes','maxlength' => '50'));
$fobj[$colname["money_max"]]=array("type"=>"text","name"=>"最大出款","column"=>$colname["money_max"],'placeholder'=>'請輸入最大出款',"validate"=>array('required' => 'yes','maxlength' => '50'));
$fobj[$colname["bank_card"]]=array("type"=>"text","name"=>"銀行","column"=>$colname["bank_card"],'placeholder'=>'請輸入銀行',"validate"=>array('required' => 'yes','maxlength' => '50'));
$fobj[$colname["num"]]=array("type"=>"text","name"=>"剩餘次數","column"=>$colname["num"],'placeholder'=>'請輸入剩餘次數',"validate"=>array('required' => 'yes','maxlength' => '11','number' => 'yes'));
$fobj[$colname["money"]]=array("type"=>"text","name"=>"餘額","column"=>$colname["money"],'placeholder'=>'請輸入餘額',"validate"=>array('required' => 'yes','maxlength' => '11','number' => 'yes'));
//$fobj[$colname["create_time"]]=array("type"=>"text","name"=>"申請時間","column"=>$colname["create_time"],'placeholder'=>'請輸入申請時間',"validate"=>array('required' => 'yes','maxlength' => '11','number' => 'yes'));
//$fobj[$colname["update_time"]]=array("type"=>"text","name"=>"審核時間","column"=>$colname["update_time"],'placeholder'=>'請輸入審核時間',"validate"=>array('required' => 'yes','maxlength' => '11','number' => 'yes'));
$fobj[$colname["alert"]]=array("type"=>"text","name"=>"剩餘次數警示","column"=>$colname["alert"],'placeholder'=>'');


$fhelp->Bind($fobj);
