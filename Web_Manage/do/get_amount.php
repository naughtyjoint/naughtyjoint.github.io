<?php
include('_config.php');

$_id = (post("_id",1)!="")?post("_id",1):'';
$_val = (post("_val",1)!="")?post("_val",1):'';

$res = false;
$msg = "";
$list = "";
if($_id !== "")
{
	$row = class_agent::getList_admin($_id);
	$db -> close();
    $res = true;
	if($row) {
        $colname = coderDBConf::$col_agent;
        if($row[$colname['pay_type']] == '2'){
            if(($_val+$row[$colname['amount']]) >$row[$colname['quota']]){
                $res = false;
                $msg = "匯入金額大於上限額度!";
            }

        }
    }
}
else
{
	$msg = "資料傳輸錯誤!";
}

$re["res"] = $res;
$re["msg"] = $msg;

echo json_encode($re);