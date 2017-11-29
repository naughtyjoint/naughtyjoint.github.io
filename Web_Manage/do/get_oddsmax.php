<?php
include('_config.php');

$_val = (post("_val",1)!="")?post("_val",1):'';
$_id = (post("_id",1)!="")?post("_id",1):'';
$_type = (post("_type",1)!="")?post("_type",1):0; //初始表判斷
$_cd_id = (post("_cd_id",1)!="")?explode(",",post("_cd_id",1)):array();

$res = false;
$msg = "";
$list = "";
if($_val !== "" && $_id !== "")
{
	$row = class_odds::getodds_oddsmaxone($_id,$_type);
    //echo "odds_max:".$row['odds_max'];

    $res = ($_val > $row['odds_max'])?false:true;
    if(!$res){
        $msg = "賠率不可高於最高賠率!";
    }
    else{
        if(count($_cd_id) == 6) {
            $table = coderDBConf::$control_data; //即時控盤
            $colname = coderDBConf::$col_control_data;
            if ($_cd_id[0] != "" && $_cd_id[1] != "" && $_cd_id[2] != "" && $_cd_id[3] != "" && $_cd_id[4] != "" && $_cd_id[5] != "") {
                //更新賠率
                $period_number = $_cd_id[0]; //控盤ID - 總期數
                $daynumber = $_cd_id[1]; //控盤ID - 今天期數
                $day = $_cd_id[2]; //控盤ID - 今天
                $type = $_cd_id[3]; //控盤ID - 類別or項目
                $rule_id = $_cd_id[4]; //玩法ID
                $agent_odds_id = $_cd_id[5]; //控盤ID - 總代&代理人賠率ID


                $dp = array();
                $dp[$colname['odds']] = $_val;

                $db->query_update($table, $dp, " {$colname['period_number']}='{$period_number}' and {$colname['daynumber']}='{$daynumber}' and {$colname['day']}='{$day}' and {$colname['type']}='{$type}' and {$colname['rule_id']}='{$rule_id}' and {$colname['agent_odds_id']}='{$agent_odds_id}'");
            } else {
                $res = false;
                $msg = "錯誤!";
            }
        }
    }
    $db -> close();
}
else
{
	$msg = "資料傳輸錯誤!";
}

$re["res"] = $res;
$re["msg"] = $msg;

echo json_encode($re);