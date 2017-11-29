<?php
/**
 * 這支檔案 是計算期數
 * 並且給所需變數
 */

date_default_timezone_set("PRC");
$now_number = (date("H:i") > "09:07")?time_arraykey():180; //目前期數 180
$all_time = time_range("09:07","23:57"); //所有期數陣列


$now_time = ($now_number <=179)?$all_time[$now_number]:$all_time[179]; //目前期數時間
$next_time = ($now_number <=178)?$all_time[($now_number+1)]:$all_time[1];//下一個期數時間;

$now_date = date("Y-m-d");
$date = date("Y-m-d H:i:s");
//echo strtotime($now_date.' '.$next_time.':00')." strtotimedate:".strtotime($date)." date:".$date;
$stop_time = strtotime($now_date.' '.$next_time.':00')-strtotime($date); //距離下次期數時間

$allgames_id = (get("games_type")!="")?get("games_type"):0;
if($allgames_id <=0){
    echo 'error';
    die();
}
$period_number = class_control_data::getList_period_number($now_number,$now_date,$allgames_id,($adminuser['type'] == '4'?$adminuser['serviceid']:$adminuser['id'])); //[1]期數 [2]SUM輸贏

?>

