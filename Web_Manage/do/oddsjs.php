<!-- ## coder [includeScript] <- ## -->
<script type="text/javascript">
    $(document).ready(function () {
        function oddsmax(_this,val,id,_oldval) {
            var now_val = val;
            $.ajax({
                url: "../do/get_oddsmax.php",
                type: "POST",
                dataType: "json",
                async: true,
                data: {
                    _val: now_val,
                    _id: id,
                    _type: 2,
                    _cd_id:_this.attr("cd_id")
                },
                success: function (data) {
                    if (!data.res) {
                        _this.val(_oldval);
                        $.alert({
                            type: 'red',
                            buttons:{
                                alphabet: {
                                    text: langary_jsall['confirm_ok']
                                }
                            },
                            title: data.msg,
                            content: ''
                        });
                        //alert(data.msg);
                    }
                    else{
                        //my_data(1);
                        $.alert({
                            type: 'blue',
                            buttons:{
                                alphabet: {
                                    text: langary_jsall['confirm_ok']
                                }
                            },
                            title: '已更新!',
                            content: ''
                        });
                        //alert("已更新!");
                    }
                },
                error: function () {
                    //alert('資料傳輸錯誤，請在試一次!');
                    $.alert({
                        type: 'red',
                        buttons:{
                            alphabet: {
                                text: langary_jsall['confirm_ok']
                            }
                        },
                        title: '資料傳輸錯誤，請在試一次!',
                        content: ''
                    });
                }
            });
        }

        $(document)
            .on('focus',".num_text",function(){
                //舊得值
                $(this).data('oldval', this.value);
            })
            .on('keypress',".num_text",function(e){
                if(e.which == 13) {
                    //舊得值
                    var _this = $(this);
                    var oldval = $(this).data('oldval');
                    if (oldval !== this.value) {
                        oddsmax(_this,this.value,_this.attr("oddsid"),oldval);
                    }
                }
            });


        function calculate (_this,type) {
            var _div = _this.parents("div.odd_num");
            var num_text_val = (_div.find(".num_text").val() === ""?0:_div.find(".num_text").val());
            if(type == "subtraction" && num_text_val>0){ //減
                num_text_val = accSub(num_text_val,0.01);
            }
            else if(type == "addition"){ //加
                num_text_val = accAdd(num_text_val,0.01);
            }
            _div.find(".num_text").val(num_text_val);
        }

        $(document)
            .on('focus',".subtraction",function(){
                var _div = $(this).parents("div.odd_num");
                var num_text_val = (_div.find(".num_text").val() === ""?0:_div.find(".num_text").val());
                //舊得值
                $(this).data('oldval', num_text_val);
            })
            .on('click',".subtraction",function(){//減
                //舊得值
                var _this = $(this);
                var oldval = $(this).data('oldval');
                var odds_id = _this.parents("div.odd_num").find(".num_text").attr("oddsid"); //id
                calculate(_this,'subtraction');
                var _div = _this.parents("div.odd_num");
                var num_text_val = (_div.find(".num_text").val() === ""?0:_div.find(".num_text").val());
                if (oldval !== num_text_val) {
                    oddsmax(_div.find(".num_text"),num_text_val,odds_id,oldval);
                }

            });

        $(document)
            .on('focus',".addition",function(){
                var _div = $(this).parents("div.odd_num");
                var num_text_val = (_div.find(".num_text").val() === ""?0:_div.find(".num_text").val());
                //舊得值
                $(this).data('oldval', num_text_val);
            })
            .on('click',".addition",function(){//減
                //舊得值
                var _this = $(this);
                var oldval = $(this).data('oldval');
                var odds_id = _this.parents("div.odd_num").find(".num_text").attr("oddsid"); //id
                calculate(_this,'addition');
                var _div = _this.parents("div.odd_num");
                var num_text_val = (_div.find(".num_text").val() === ""?0:_div.find(".num_text").val());
                if (oldval !== num_text_val) {
                    oddsmax(_div.find(".num_text"),num_text_val,odds_id,oldval);
                }

            });


        $(document).ready(function(){

            function ShowTime(){
                var NowDate=new Date();
                var h=NowDate.getHours();
                var m=NowDate.getMinutes();
                var s=NowDate.getSeconds();
                document.getElementById('nowtime').innerHTML = h+'時'+m+'分'+s+'秒';

            }

            function showRefreshTime(){
                var remine_time=parseInt($('#refresh_time').html());
                remine_time--;
                if(remine_time<1){
                    remine_time=10;
                    my_data(1);
                }
                $('#refresh_time').html(remine_time);
            }
            function showStopTime(){
                var s_time=parseInt($('#stop_time').html());
                s_time--;
                if(s_time<11){
                    $('#stop_time').addClass('red');
                }
                if(s_time>=0){
                    $('#stop_time').html(s_time);
                }
                else{
                    $('#stop_time_title').html('停止下注');
                    //$("div#alltime").load("../do/alltimedo.php");
                    alltime();
                    flashing_change = "";
                    flashing_change_total = ""; //合計
                    flashing_ary = "";
                    my_data(2);
                }

            }
            setInterval(function(){
                showRefreshTime();
                showStopTime();
                ShowTime();
            }, 1000);
        });
    })
    function color(divclass,type) { //更動總注單金額時，會閃爍黃色 [1]啟用閃爍 [2]停用閃爍
        clearInterval(timer); //停止
        clearInterval(interval); //停止
        $(flashing_ary).removeClass("backgroundyellow");
        if(divclass != "") {
            var timer = setInterval(function () {
                $(divclass).toggleClass("backgroundyellow");
            }, 500);
            var ends_time = 3;
            var interval = setInterval(function () {
                ends_time--;
                if (ends_time <= 0) {
                    clearInterval(timer); //停止
                    clearInterval(interval); //停止
                    $(divclass).removeClass("backgroundyellow");
                }
            }, 1000);

            if(type == 2){
                clearInterval(timer); //停止
                clearInterval(interval); //停止
                $(divclass).removeClass("backgroundyellow");
            }
        }
    }
    flashing_change = "";
    flashing_change_total = ""; //合計
    flashing_ary = "";
    function alltime() {
        $("div#alltime").load("../do/alltimedo.php?games_type=<?php echo $allgames_id;?>", function(response, status, xhr) {
            $('#refreshBtn').click();
            flashing_change = "";
            flashing_change_total = ""; //合計
        });
    }

    alltime();
    my_data(2);
    $(document).on('click','a#mybtn',function() {
        my_data(1);
    });
    function my_data(type) { //[1]啟用閃爍 [2]停用閃爍
//        $("div#mytable").load("datado.php?games_type=<?php //echo $allgames_id;?>//&flashing_change="+flashing_change, function(response, status, xhr) {
//            color(flashing_ary);
//        });
        var ck_type = type;
        $.ajax({
            url: 'datado.php?games_type=<?php echo $allgames_id;?>',
            //async: false,
            type: 'POST',
            data: {
                flashing_change: flashing_change,
                flashing_change_total : flashing_change_total
            },
            error: function () {
                //alert('資料傳輸發生錯誤!');
                $.alert({
                    type: 'red',
                    buttons:{
                        alphabet: {
                            text: langary_jsall['confirm_ok']
                        }
                    },
                    title: '資料傳輸發生錯誤!',
                    content: ''
                });
            },
            success: function (response) {
                if (response) {
                    $("div#mytable").html(response);
                    color(flashing_ary,ck_type);

                } else {
                    //alert("資料傳送錯誤!");
                    $.alert({
                        type: 'red',
                        buttons:{
                            alphabet: {
                                text: langary_jsall['confirm_ok']
                            }
                        },
                        title: '資料傳送錯誤!',
                        content: ''
                    });
                }
            }
        });

    }
</script>