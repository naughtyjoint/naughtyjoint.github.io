<?php
$fhelp=new coderFormHelp();
$fobj=array();
$fobj[$colname["id"]]=array("type"=>"hidden","name"=>$langary_Web_Manage_all['id'],"column"=>$colname["id"],"sql"=>false);
$fobj[$colname["title"]]=array("type"=>"text","name"=>$langary_Web_Manage_all['name2'],"column"=>$colname["title"],'placeholder'=>$langary_Web_Manage_all['name2_p'],"validate"=>array('required' => 'yes','maxlength' => '255'));
$fobj[$colname["m_id"]]=array("type"=>"select","name"=>$langary_Web_Manage_all['group'],"column"=>$colname["m_id"],'placeholder'=>$langary_Web_Manage_all['name2_p'],"validate"=>array('required' => 'yes','maxlength' => '255'));

$fhelp->Bind($fobj);
