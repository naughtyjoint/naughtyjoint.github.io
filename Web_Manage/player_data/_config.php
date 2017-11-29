<?php
$inc_path="../../inc/";
$manage_path="../";
$main_auth_key='deposit';
$fun_auth_key='player';
include('../_config.php');

$auth=coderAdmin::Auth($fun_auth_key);

$table=coderDBConf::$player;
$colname=coderDBConf::$col_player;

$table_m=coderDBConf::$player_group;
$colname_m=coderDBConf::$col_player_group;

$orderColumn=$colname["ind"];
$orderDesc='desc';
$page_title=$auth['name'];
$page=request_pag("page");
$page_desc="{$page_title}-".$langary_config['page_desc3'];
$mtitle='<li class="active">'.$page_title.'</li>';
$mainicon=$auth['icon'];
