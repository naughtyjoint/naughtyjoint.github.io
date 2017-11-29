<?php
$fhelp=new coderFormHelp();
$fobj=array();
$fobj[$colname["id"]]=array("type"=>"hidden","name"=>"ID","column"=>$colname["id"],"sql"=>false);
$fobj[$colname["name"]]=array("type"=>"text","name"=>"申請人","column"=>$colname["name"],'placeholder'=>'請輸入申請人名稱',"validate"=>array('required' => 'yes','maxlength' => '60'));

$fobj[$colname["company"]]=array("type"=>"text","name"=>"第三方公司","column"=>$colname["company"],'placeholder'=>'請輸入第三方公司',"validate"=>array('required' => 'yes','maxlength' => '50'));
$fobj[$colname["method"]]=array("type"=>"text","name"=>"方式","column"=>$colname["method"],'placeholder'=>'請輸入方式',"validate"=>array('required' => 'yes','maxlength' => '11','number' => 'yes'));
$fobj[$colname["money"]]=array("type"=>"text","name"=>"金額","column"=>$colname["money"],'placeholder'=>'請輸入金額',"validate"=>array('required' => 'yes','maxlength' => '11','number' => 'yes'));
$fobj[$colname["create_time"]]=array("type"=>"text","name"=>"申請時間","column"=>$colname["create_time"],'placeholder'=>'請輸入申請時間',"validate"=>array('maxlength' => '11','number' => 'yes'));
$fobj[$colname["update_time"]]=array("type"=>"text","name"=>"審核時間","column"=>$colname["update_time"],'placeholder'=>'請輸入審核時間',"validate"=>array('maxlength' => '11','number' => 'yes'));
$fobj[$colname["contents"]]=array("type"=>"textarea","name"=>"意見","column"=>$colname["contents"],'placeholder'=>'',"validate"=>array('maxlength' => '50'));


$fhelp->Bind($fobj);
