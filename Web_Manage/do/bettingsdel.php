<?php
include_once('_config.php');

$sResult = 1;
$sMsg = "";
$list = "";
 
$_id = (post('id')!="")?post('id'):0;
$_type = (post('type')!="")?post('type'):0; //[1]下注主單 [2]下注明細
$_id2 = 0;
if($_id > 0 && ($_type=='1' || $_type=='2')) {
    $table=coderDBConf::$bettingsOrig;
    $colname=coderDBConf::$col_bettingsOrig;

    $table_b=coderDBConf::$bettings; //下注紀錄 - 明細
    $colname_b=coderDBConf::$col_bettings;


	try{
        $db = Database::DB();
        $nowtime = datetime();
        function delbettingsOrig($_id,$type){ //取消下注 - 主單 $type [1]取消主單 + 明細全部取消 [2]只取消 主單
            global $db,$table,$colname,$table_b,$colname_b,$nowtime,$adminuser;
            $data = array();
            $row = class_bettingsorig::getList_one($_id); //下注 - 主單 查詢
            if(!$row){
                throw new Exception("查無資料!");
            }
            else {
                $data[$colname['status']] = 1;
                $data[$colname['manager']]=$adminuser['username'];
                $data[$colname['update_time']]= $nowtime;
                $db->query_update($table, $data, " {$colname['id']}=".$row[$colname['id']]);
                if($type == '1'){
                    delbettings_all($_id);
                }
            }
        }

        function delbettings_all($_id){ //取消下注 - 明細 取消全筆
            global $db,$table_b,$colname_b,$nowtime,$adminuser;
            $rows_b = class_bettings::getList_orig($_id); //下注 - 明細 查詢
            if(count($rows_b) <= 0){
                throw new Exception("查無資料!");
            }
            else {
                foreach ($rows_b as $row_b) {
                    if($row_b[$colname_b['status']] != '1') {
                        $data_b = array();
                        $data_b[$colname_b['status']] = 1;
                        $data_b[$colname_b['manager']] = $adminuser['username'];
                        $data_b[$colname_b['update_time']] = $nowtime;
                        $db->query_update($table_b, $data_b, " {$colname_b['id']}=" . $row_b[$colname_b['id']]);
                    }
                }
            }
        }

        function delbettings($_id){ //取消下注 - 明細 只取消單筆
            global $db,$table_b,$colname_b,$nowtime,$adminuser;
            $data_b = array();
            $row_b = class_bettings::getList_one($_id); //下注 - 明細 查詢
            if(!$row_b){
                throw new Exception("查無資料!");
            }
            else {
                $data_b[$colname_b['status']] = 1;
                $data_b[$colname_b['manager']] = $adminuser['username'];
                $data_b[$colname_b['update_time']] = $nowtime;
                $db->query_update($table_b, $data_b, " {$colname_b['id']}=" . $row_b[$colname_b['id']]);

            }
            return $row_b[$colname_b['origId']];
        }

        if($_type=='1'){
            delbettingsOrig($_id,'1');
        }
        else if($_type=='2'){
            $_id2 = delbettings($_id);

            $rows_os = class_bettings::getList_origstatus($_id2);
            if(count($rows_os) <=0){
                delbettingsOrig($_id2,2);
            }
        }


	}catch(Exception $e){

        $db -> close();
		$sMsg = $e -> getMessage();
		$sResult = 0;
	}
	$db -> close();
}
else {
	$sMsg = "數據傳輸錯誤，請再試一次!!";
	$sResult = 0;
}





$re["id"] = $_id;
$re["result"] = $sResult==1 ? true : false;
$re["msg"] = $sMsg;
echo json_encode($re);
?>