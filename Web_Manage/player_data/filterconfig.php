<?php
$filterhelp = new coderFilterHelp();
$obj[] = array('type' => 'keyword', 'name' => $langary_Web_Manage_all['keyword'], 'sql' => true, 'ary' => array(
    array('column' => $colname['title'], 'name' => $langary_Web_Manage_all['name2']),
    array('column' => $colname['manager'], 'name' => $langary_Web_Manage_all['manager'])
));

$obj[] = array('type' => 'dategroup', 'column' => 'dategroup', 'sql' => true, 'ary' => array(array('column' => $colname['create_time'], 'name' => $langary_Web_Manage_all['create_time']), array('column' => $colname['update_time'], 'name' => $langary_Web_Manage_all['update_time'])));
$filterhelp->Bind($obj);
