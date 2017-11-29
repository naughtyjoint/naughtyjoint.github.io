<?php
include_once('_config.php');
include_once('filterconfig.php');
coderAdmin::vaild($auth, 'view');

/* ## coder [listHelp] --> ## */
$listHelp = new coderListHelp('table1', $page_title);
$listHelp->mutileSelect=true;
$listHelp->editLink = "manage.php";
//$listHelp->addLink = "manage.php";
$listHelp->ajaxSrc = "service.php";
$listHelp->delSrc = "delservice.php";
//$listHelp->orderSrc = "orderservice.php";
//$listHelp->ordersortable = "orderservice.php";
$listHelp->orderColumn = $orderColumn;
$listHelp->orderDesc = $orderDesc;

$col = array();
$col[] = array('column' => $colname['id'], 'name' => 'ID', 'order' => true, 'width' => '60','def_desc'=>'desc');
$col[] = array('column' => $colname['name'], 'name' => '申請人', 'order' => true, 'width' => '150');
$col[] = array('column' => $colname['company'], 'name' => '第三方公司', 'order' => true, 'width' => '150');
$col[] = array('column' => $colname['method'], 'name' => '方式', 'order' => true, 'width' => '100');
$col[] = array('column' => $colname['create_time'], 'name' => '申請時間', 'order' => true, 'width' => '150');
$col[] = array('column' => $colname['update_time'], 'name' => '審核時間', 'order' => true, 'width' => '150');
$col[] = array('column' => $colname['manager'], 'name' => '最後管理者', 'order' => true, 'width' => '100');
$listHelp->Bind($col);
$listHelp->bindFilter($filterhelp);

/* ## coder [listHelp] <-- ## */

$db = Database::DB();
coderAdminLog::insert($adminuser['username'], $main_auth_key, $fun_auth_key, 'view', '列表');
$db->close();
?>
<!DOCTYPE html>
<html>
<head>
    <?php include('../head.php'); ?>
    <link rel="stylesheet" type="text/css" href="../assets/jquery-ui/jquery-ui.min.css"/>
    <style>
        .ui-sortable-helper {
            background-color: white !important;
            border: none !important;
        }
    </style>
</head>
<body>
<?php include('../navbar.php'); ?>
<!-- BEGIN Container -->
<div class="container" id="main-container">
    <?php include('../left.php'); ?>
    <!-- BEGIN Content -->
    <div id="main-content">
        <!-- BEGIN Page Title -->
        <div class="page-title">
            <div>
                <h1><i class="<?php echo $mainicon ?>"></i> <?php echo $page_title ?>管理</h1>
                <h4><?php echo $page_desc ?></h4>
            </div>
        </div>
        <!-- END Page Title -->

        <!-- BEGIN Breadcrumb -->
        <div id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="../home/index.php">Home</a>
                    <span class="divider"><i class="icon-angle-right"></i></span>
                </li>
                <?php echo $mtitle ?>

            </ul>
        </div>
        <!-- END Breadcrumb -->

        <!-- BEGIN Main Content -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-title">
                        <h3 style="float:left"><i class="icon-table"></i> <?php echo $page_title ?></h3>
                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="icon-remove"></i></a>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                    <div class="box-content">
                        <?php echo $listHelp->drawTable() ?>
                    </div>
                </div>
            </div>
        </div>


        <?php include('../footer.php'); ?>

        <a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="icon-chevron-up"></i></a>
    </div>
    <!-- END Content -->
</div>
<!-- END Container -->
<?php include('../js.php'); ?>

<script type="text/javascript" src="../js/coderlisthelp.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        /* ## coder [listRow] --> ## */
        $('#table1').coderlisthelp({
            debug: true, callback: function (obj, rows) {
                obj.html('');
                var count = rows.length;
                for (var i = 0; i < count; i++) {
                    var row = rows[i];
                    var $tr = $('<tr></tr>');
                    $tr.attr("orderlink", "order_id=" + row["<?php echo $colname['id'];?>"] + "&order_key=<?php echo $colname['id'];?>");
                    $tr.attr("editlink", "id=" + row["<?php echo $colname['id'];?>"]);
                    $tr.attr("delkey", row["<?php echo $colname['id'];?>"]);
                    $tr.attr("title", row["<?php echo $colname['name'];?>"]);
                    $tr.append('<td>' + row["<?php echo $colname['id'];?>"] + '</td>');
                    $tr.append('<td>' + row["<?php echo $colname['name'];?>"] + '</td>');
                    $tr.append('<td>' + row["<?php echo $colname['company'];?>"] + '</td>');
                    $tr.append('<td>' + row["<?php echo $colname['method'];?>"] + '</td>');
                    $tr.append('<td>' + row["<?php echo $colname['create_time'];?>"] + '</td>');
                    $tr.append('<td>' + row["<?php echo $colname['update_time'];?>"] + '</td>');
                    $tr.append('<td>' + row["<?php echo $colname['manager'];?>"] + '</td>');
                   
                    obj.append($tr);
                }
            }, listComplete: function () {
                //$("#sidebar").load("../do/leftuldo.php?path=<?php //echo $manage_path?>&ck=<?php //echo (isset($fun_auth_key))?$fun_auth_key:''?>");
            }
        });
        /* ## coder [listRow] <-- ## */
    });
</script>
</body>
</html>
