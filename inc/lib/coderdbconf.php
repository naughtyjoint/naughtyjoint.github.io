<?php

class coderDBConf
{
    /*↓↓必須↓↓*/
    public static $admin = 'admin';//後台管理者
    public static $admin_log = 'admin_log';//後台管理者操作紀錄
    public static $rules = 'rules';         //角色
    public static $rules_auth = 'rules_auth';    //角色權限

    public static $col_admin = array('id' => 'a_id','games_id'=>'a_games_id','all_upid'=>'a_all_upid','add_adminid'=>'a_add_adminid','first_upid'=>'a_first_upid','level' => 'a_level','service'=>'a_service', 'mid' => 'a_mid', 'username' => 'a_username', 'password' => 'a_password', 'name' => 'a_name', 'email' => 'a_email', 'pic' => 'a_pic', 'r_id' => 'r_id', 'forgetcode' => 'a_forgetcode', 'forgetcode_time' => 'a_forgetcode_time', 'ip' => 'a_ip', 'logintime' => 'a_logintime', 'ispublic' => 'a_ispublic', 'admin' => 'a_admin', 'updatetime' => 'a_updatetime', 'createtime' => 'a_createtime');
    public static $col_admin_log = array('id' => 'al_id', 'username' => 'a_username', 'main_key' => 'al_main_key', 'fun_key' => 'al_fun_key', 'descript' => 'al_descript', 'action' => 'al_action', 'ip' => 'al_ip', 'createtime' => 'al_createtime');
    public static $col_rules = array('id' => 'r_id', 'name' => 'r_name', 'depiction' => 'r_depiction','agents'=>'r_agents','service'=>'r_service', 'superadmin' => 'r_superadmin', 'system' => 'r_system', 'admin' => 'r_admin', 'updatetime' => 'r_updatetime', 'createtime' => 'r_createtime');
    public static $col_rules_auth = array('r_id' => 'r_id', 'main_key' => 'ra_main_key', 'fun_key' => 'ra_fun_key', 'auth' => 'ra_auth', 'admin' => 'ra_admin', 'updatetime' => 'ra_updatetime', 'createtime' => 'ra_createtime');
    /*↑↑必須↑↑*/
    public static $dispensing = 'dispensing'; //出款工作
    public static $col_dispensing = array('id'=>'id','name'=>'name','bank'=>'bank','num'=>'num','money'=>'money','contents'=>'contents','manager'=>'manager','create_time'=>'create_time','update_time'=>'update_time','is_pay'=>'is_pay');
    public static $bank= 'bank'; //銀行
    public static $col_bank = array('id'=>'id','name'=>'name','bank_no'=>'bank_no','manager'=>'manager','create_time'=>'create_time');
    public static $bank_card = 'bank_card'; //銀行卡
    public static $col_bank_card = array('id'=>'id','name'=>'name','bank_name'=>'bank_name','bank_no'=>'bank_no','money'=>'money','manager'=>'manager','money_min'=>'money_min','money_max'=>'money_max','num'=>'num','alert'=>'alert','create_time'=>'create_time','update_time'=>'update_time');
    public static $dispensing_check = 'dispensing_check'; //出款稽核
    public static $col_dispensing_check = array('id'=>'id','name'=>'name','money'=>'money','manager'=>'manager','create_time'=>'create_time','update_time'=>'update_time','is_pay'=>'is_pay');
    public static $deposit_pay = 'deposit_pay'; //第三方支付
    public static $col_deposit_pay = array('id'=>'id','name'=>'name','company'=>'company','method'=>'method','company_id'=>'company_id','money'=>'money','manager'=>'manager');
    public static $player_group = 'player_group'; //玩家群組
    public static $col_player_group = array('id'=>'id','ind'=>'ind','title'=>'title','num_max'=>'num_max','num_min'=>'num_min','contents'=>'contents','manager'=>'manager','create_time'=>'create_time','update_time'=>'update_time');
    public static $player = 'player'; //玩家群組
    public static $col_player = array('id'=>'id','m_id'=>'m_id','ind'=>'ind','title'=>'title','manager'=>'manager','create_time'=>'create_time','update_time'=>'update_time');
    public static $deposit_check = 'deposit_check'; //入款稽核
    public static $col_deposit_check = array('id'=>'id','name'=>'name','company'=>'company','method'=>'method','money'=>'money','manager'=>'manager','create_time'=>'create_time','update_time'=>'update_time','contents'=>'contents');
    public static $check_work = 'check_work'; //結帳工作
    public static $col_check_work = array('id'=>'id','name'=>'name','corp'=>'corp','title'=>'title','manager'=>'manager');
    //public static $management = 'management'; //結帳清單
    //public static $col_management = array('id'=>'id','name'=>'name','company'=>'company','method'=>'method','money'=>'money','manager'=>'manager','create_time'=>'create_time','update_time'=>'update_time','contents'=>'contents');

}