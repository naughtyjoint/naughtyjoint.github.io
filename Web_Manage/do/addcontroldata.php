<?php
/**
 * 這支檔案 是測試檔 目前沒有其他檔案引用這支
 * 作用：1.預先新增即時控盤 control_data 資料
 *      2.測試閃爍
 */
include ("_config.php");
set_time_limit(0);
$table=coderDBConf::$control_data; //即時控盤
$colname=coderDBConf::$col_control_data;

$table_ao=coderDBConf::$agent_odds; //代理 - 初始設定
$colname_ao=coderDBConf::$col_agent_odds;

$db = Database::DB();


/* 設定 ↓ */
//$day = date('Y-m-d',strtotime("+1 day"));
$day = date('Y-m-d');
$allgames_id = (get("allgames_id")!="")?get("allgames_id"):0; //玩法id
/* 設定 ↑*/
$rows = class_odds::getodds_control($allgames_id);
$nowtime = datetime();


$getup = (get("getup",1)!="")?get("getup",1):0; //閃爍 玩法ID
$num = (get("num",1)!="")?get("num",1):0; //期數
if($getup > 0 && $num >0) { //測試閃爍 6398,41
    /* 修改部分欄位 ↓ */
    //6031,32,2017-08-24,1,2
    for($t=1;$t<=4;$t++) {
        //$num = "6398,41";
        switch ($getup) {
            case 1: //双面盘
                $data_ary = explode(",", $num.",".$day.",".rand(1,10).",".$getup.",".rand(1,4)); //控盤ID
                break;
            case 2: //定位胆
                $data_ary = explode(",", $num.",".$day.",".rand(1,10).",".$getup.",5"); //控盤ID
                break;
            case 3: //猜色区
                $data_ary = explode(",", $num.",".$day.",".rand(6,9).",".$getup.",".rand(6,9)); //控盤ID
                break;
            case 4: //新庄闲
                $data_ary = explode(",", $num.",".$day.",10,".$getup.",10"); //控盤ID
                break;
            default:
                die();
        }
        $period_number = $data_ary[0];
        $daynumber = $data_ary[1];
        $day = $data_ary[2];
        $type = $data_ary[3];
        $rule_id = $data_ary[4];
        $agent_odds_id = $data_ary[5];
        print_r($data_ary);
        $dp = array();
        $dp[$colname['winlose']] = rand(-1000,1000);

        $db->query_update($table, $dp, " {$colname['period_number']}='{$period_number}' and {$colname['daynumber']}='{$daynumber}' and {$colname['day']}='{$day}' and {$colname['type']}='{$type}' and {$colname['rule_id']}='{$rule_id}' and {$colname['agent_odds_id']}='{$agent_odds_id}'");
    }
    /* 修改部分欄位 ↑*/




}
else if($getup == 0 && $num==0 && $allgames_id>0) { //新增控盤資料

    switch ($allgames_id) {
        case 1: //双面盘
            for ($i = 1; $i <= 179; $i++) {
                $period_number = class_control_data::getList_sno($allgames_id); //期數 SNO
                foreach ($langary_control_ranking as $key => $val) {
                    foreach ($rows as $row) {
                        $data = array();
                        $data[$colname['period_number']] = $period_number;
                        $data[$colname['daynumber']] = $i; //今天第幾期
                        $data[$colname['day']] = $day;
                        $data[$colname['agent_odds_id']] = $row[$colname_ao['id']]; //代理人初始設定ID
                        $data[$colname['odds']] = $row[$colname_ao['odds']]; //賠率
                        $data[$colname['type']] = $key;
                        $data[$colname['rule_id']] = $allgames_id; //玩法ID
                        $data[$colname['agent_id']] = $adminuser['id']; //代理人ID



                        $data[$colname['update_time']] = $nowtime;
                        $data[$colname['create_time']] = $nowtime;
                        $db->query_insert($table,$data);

                    }

                }
                $period_number++;
            }
            break;
        case 2: //定位胆
            $odd = $rows[0][$colname_ao['odds']]; //賠率
            $id = $rows[0][$colname_ao['id']]; //id
            for ($i = 1; $i <= 179; $i++) {
                $period_number = class_control_data::getList_sno($allgames_id); //期數 SNO
                foreach ($langary_control_ranking as $key => $val) {
                    $data = array();
                    $data[$colname['period_number']] = $period_number;
                    $data[$colname['daynumber']] = $i; //今天第幾期
                    $data[$colname['day']] = $day;
                    $data[$colname['agent_odds_id']] = $id; //代理人初始設定ID
                    $data[$colname['odds']] = $odd; //賠率
                    $data[$colname['type']] = $key;
                    $data[$colname['rule_id']] = $allgames_id; //玩法ID
                    $data[$colname['agent_id']] = $adminuser['id']; //代理人ID

                    $data[$colname['update_time']] = $nowtime;
                    $data[$colname['create_time']] = $nowtime;
                    $db->query_insert($table,$data);

                }
                $period_number++;
            }
            break;
        case 3: //猜色区
            for ($i = 1; $i <= 179; $i++) {
                $period_number = class_control_data::getList_sno($allgames_id); //期數 SNO
                foreach ($rows as $row) {
                    $data = array();
                    $data[$colname['period_number']] = $period_number;
                    $data[$colname['daynumber']] = $i; //今天第幾期
                    $data[$colname['day']] = $day;
                    $data[$colname['agent_odds_id']] = $row[$colname_ao['id']]; //代理人初始設定ID
                    $data[$colname['odds']] = $row[$colname_ao['odds']]; //賠率
                    $data[$colname['type']] = $row[$colname_ao['odds_id']];
                    $data[$colname['rule_id']] = $allgames_id; //玩法ID
                    $data[$colname['agent_id']] = $adminuser['id']; //代理人ID

                    $data[$colname['update_time']] = $nowtime;
                    $data[$colname['create_time']] = $nowtime;
                    $db->query_insert($table,$data);

                }
                $period_number++;
            }
            break;
        case 4: //新庄闲
            for ($i = 1; $i <= 179; $i++) {
                $period_number = class_control_data::getList_sno($allgames_id); //期數 SNO
                foreach ($rows as $row) {
                    $data = array();
                    $data[$colname['period_number']] = $period_number;
                    $data[$colname['daynumber']] = $i; //今天第幾期
                    $data[$colname['day']] = $day;
                    $data[$colname['agent_odds_id']] = $row[$colname_ao['id']]; //代理人初始設定ID
                    $data[$colname['odds']] = $row[$colname_ao['odds']]; //賠率
                    $data[$colname['type']] = $row[$colname_ao['odds_id']];
                    $data[$colname['rule_id']] = $allgames_id; //玩法ID
                    $data[$colname['agent_id']] = $adminuser['id']; //代理人ID

                    $data[$colname['update_time']] = $nowtime;
                    $data[$colname['create_time']] = $nowtime;
                    $db->query_insert($table,$data);

                }
                $period_number++;
            }
            break;
    }
}
$db->close();
?>
