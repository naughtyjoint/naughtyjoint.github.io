<?php
$fhelp=new coderFormHelp();
$fobj=array();
$fobj[$colname["id"]]=array("type"=>"hidden","name"=>"ID","column"=>$colname["id"],"sql"=>false);
$fobj[$colname["is_pay"]]=array("type"=>"checkbox","name"=>"是否出款","column"=>$colname["is_pay"],"value"=>"1");
$fobj[$colname["name"]]=array("type"=>"text","name"=>"申請人","column"=>$colname["name"],'placeholder'=>'請輸入申請人名稱',"validate"=>array('required' => 'yes','maxlength' => '60'));

$fobj[$colname["money"]]=array("type"=>"text","name"=>"金額","column"=>$colname["money"],'placeholder'=>'請輸入金額',"validate"=>array('required' => 'yes','maxlength' => '11','number' => 'yes'));
//$fobj[$colname["create_time"]]=array("type"=>"text","name"=>"申請時間","column"=>$colname["create_time"],'placeholder'=>'請輸入申請時間',"validate"=>array('required' => 'yes','maxlength' => '11','number' => 'yes'));
//$fobj[$colname["update_time"]]=array("type"=>"text","name"=>"審核時間","column"=>$colname["update_time"],'placeholder'=>'請輸入審核時間',"validate"=>array('required' => 'yes','maxlength' => '11','number' => 'yes'));


$fhelp->Bind($fobj);
