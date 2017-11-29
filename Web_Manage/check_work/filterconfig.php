<?php
$filterhelp = new coderFilterHelp();
$obj[] = array('type' => 'keyword', 'name' => '關鍵字', 'sql' => true, 'ary' => array(
    array('column' => $colname['name'], 'name' => '名稱'),
    array('column' => $colname['corp'], 'name' => '公司')
));
$filterhelp->Bind($obj);
