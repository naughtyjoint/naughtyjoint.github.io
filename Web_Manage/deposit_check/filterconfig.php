<?php
$filterhelp = new coderFilterHelp();
$obj[] = array('type' => 'keyword', 'name' => '關鍵字', 'sql' => true, 'ary' => array(
    array('column' => $colname['name'], 'name' => '申請人'),
    array('column' => $colname['manager'], 'name' => '最後管理者')
));
$obj[] = array('type' => 'dategroup', 'column' => 'dategroup', 'sql' => true, 'ary' => array(array('column' => $colname['create_time'], 'name' => '申請時間'), array('column' => $colname['update_time'], 'name' => '審核時間')));
$filterhelp->Bind($obj);
