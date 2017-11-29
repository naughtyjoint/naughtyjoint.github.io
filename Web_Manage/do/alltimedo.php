<?php
include('_config.php');
include('alltimedata.php');

?>
<div class="panel-heading">
    <h4 class="panel-title"><?php echo class_game_rules::getName($allgames_id)?>操盤     第 <span class="label label-info label-xlarge"><?php echo $period_number[1]?></span> 期</h4>
</div>

<div class="panel-body">

	<div class="col-md-3 col-sm-3">
        <div class="tile tile-light-blue">
            <div class="img">
                <i class="icon-time"></i>
            </div>
            <div class="content">
                <p class="big" id="stop_time"><?php echo $stop_time?></p>
                <p class="title" id="stop_time_title">距離截止下注時間</p>
            </div>
        </div>
    </div>
<div class="col-md-3 col-sm-3">
    <div class="tile tile-red">
            <div class="img">
                    <i class="icon-usd"></i>
            </div>
    <div class="content">
    <p class="big" id="winlose_show"><?php echo $period_number[2]?></p>
    <p class="title">當日輸贏</p>
    </div>
    </div>
</div> 
<div class="col-md-3 col-sm-3">
    <div class="tile tile-light-blue">
            <div class="img">
                    <i class="icon-refresh"></i>
            </div>
    <div class="content">
    <p class="big" ><span id="refresh_time">10</span>秒</p>
    <p class="title">更新頻率</p>
    </div>
    </div>
</div>

	<div class="col-md-3 col-sm-3">
    	<p><span ><?php echo date('Y-m-d')?></span>         <a class="btn btn-primary" href="javascript:void(0)" id="mybtn" style="float:right;">刷新</a></p>
    	<p> 北京時間 : <span id="nowtime"></span></p>
        <p>*注單有黃色代表近30秒有新注單</p>
        <p><span class="glyphicon glyphicon-user"></span> <?php echo $langary_actype[$adminuser['type']];?></p>
    </div>    
</div>

