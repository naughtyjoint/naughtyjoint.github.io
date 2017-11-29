<?php
class class_games{
    public static function getList(){ //
        global $db;
        $colname = coderDBConf::$col_games;
        $sql = "select {$colname['name']} as name,{$colname['id']} as value
                from ".coderDBConf::$games."
                where `{$colname['is_public']}` = 1
                ORDER BY `{$colname['id']}` DESC";
        return $db->fetch_all_array($sql);
    }

    public static function getName($_val){
        $ary = self::getList();
        return coderHelp::getArrayPropertyVal($ary, 'value', $_val, 'name');
    }

    public static function getList_all($in_id=""){ //全部 or 部分
        global $db;
        $colname = coderDBConf::$col_games;
        $where = "";
        if($in_id!==""){
            $where .= "where `{$colname['id']}` in(".$in_id.")";
        }
        $sql = "select {$colname['name']} as name,{$colname['id']} as value
                from ".coderDBConf::$games."
                $where
                ORDER BY `{$colname['id']}` DESC";
        return $db->fetch_all_array($sql);
    }

    public static function getList_ck($in_id=""){ //檢查遊戲ID
        global $db;
        $colname = coderDBConf::$col_games;
        $where = "";
        if($in_id!==""){
            $where .= "where `{$colname['id']}` in(".$in_id.")";
        }
        $sql = "select {$colname['id']} as id
                from ".coderDBConf::$games."
                $where
                ORDER BY `{$colname['id']}` DESC";
        return $db->fetch_all_array($sql);
    }

    public static function getList_one($id){ //
        global $db;
        $colname = coderDBConf::$col_games;
        $sql = "select {$colname['name']} as name,{$colname['id']} as value
                from ".coderDBConf::$games."
                where `{$colname['id']}` = $id
                ORDER BY `{$colname['id']}` DESC";
        return $db->query_prepare_first($sql);
    }
}