<?php
$fhelp=new coderFormHelp();
$fobj=array();
$fobj[$colname["id"]]=array("type"=>"hidden","name"=>"ID","column"=>$colname["id"],"sql"=>false);
$fobj[$colname["name"]]=array("type"=>"text","name"=>"名稱","column"=>$colname["name"],'placeholder'=>'請輸入名稱',"validate"=>array('required' => 'yes','maxlength' => '60'));

$fobj[$colname["company"]]=array("type"=>"text","name"=>"第三方公司","column"=>$colname["company"],'placeholder'=>'請輸入第三方公司',"validate"=>array('required' => 'yes','maxlength' => '50'));
$fobj[$colname["method"]]=array("type"=>"text","name"=>"方式","column"=>$colname["method"],'placeholder'=>'請輸入方式',"validate"=>array('required' => 'yes','maxlength' => '50'));
$fobj[$colname["company_id"]]=array("type"=>"text","name"=>"商戶","column"=>$colname["company_id"],'placeholder'=>'請輸入商戶');
$fobj[$colname["money"]]=array("type"=>"text","name"=>"金額","column"=>$colname["money"],'placeholder'=>'請輸入金額',"validate"=>array('required' => 'yes','maxlength' => '11','number' => 'yes'));


$fhelp->Bind($fobj);
