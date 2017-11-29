<?php
$fhelp=new coderFormHelp();
$fobj=array();
$fobj[$colname["id"]]=array("type"=>"hidden","name"=>$langary_Web_Manage_all['id'],"column"=>$colname["id"],"sql"=>false);
$fobj[$colname["title"]]=array("type"=>"text","name"=>$langary_Web_Manage_all['name2'],"column"=>$colname["title"],'placeholder'=>$langary_Web_Manage_all['name2_p'],"validate"=>array('required' => 'yes','maxlength' => '255'));
$fobj[$colname["num_min"]]=array("type"=>"text","name"=>"低標","column"=>$colname["num_min"],'placeholder'=>"請輸入低標","validate"=>array('maxlength' => '11'));
$fobj[$colname["num_max"]]=array("type"=>"text","name"=>"高標","column"=>$colname["num_max"],'placeholder'=>"請輸入高標","validate"=>array('maxlength' => '11'));
$fobj[$colname["contents"]]=array("type"=>"textarea","name"=>"備註","column"=>$colname["contents"],'placeholder'=>"請輸入備註","validate"=>array('maxlength' => '255'));

$fhelp->Bind($fobj);
