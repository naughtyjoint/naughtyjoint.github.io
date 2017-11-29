<?php
$filterhelp = new coderFilterHelp();
$obj[] = array('type' => 'keyword', 'name' => '關鍵字', 'sql' => true, 'ary' => array(
    array('column' => $colname['name'], 'name' => '名稱'),
    array('column' => $colname['manager'], 'name' => '方式')
));
$filterhelp->Bind($obj);
