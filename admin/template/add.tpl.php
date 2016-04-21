<?php include 'template/header.php';?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<!--content section start-->
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="#">新文章</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-edit"></i> 添加文章</h2>
            </div>
            <div class="box-content">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#article">文章内容</a></li>
                    <li><a href="#setmoney">推广设置</a></li>
                    <li><a href="#setarea">位置设置</a></li>
                    <li><a href="#setbanner">图片设置</a></li>
                    <li><a href="#openvisit">发布文章</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active" id="article">
                            <form role="form" action="add.php" method="post" enctype="multipart/form-data">
                                <br>
                                <div class="form-group">
                                    <label for="title">标题</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                
                                <div class="form-group">
                                    <label for="categoryid">分类</label>
                                    <br>
                                    <select name="categoryid" data-rel="chosen" style="width:120px;">
                                        <?php foreach($allcategory as $cat):?>
                                        <option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="remark">内容</label>
                                    <script id="container" name="content" type="text/plain">
                                    </script>
                                    
                                    <script type="text/javascript" src="ueditor/ueditor.config.js"></script>
                                    
                                    <script type="text/javascript" src="ueditor/ueditor.all.js"></script>
                                    
                                    <script type="text/javascript">
                                        var ue = UE.getEditor('container',{
                                            initialFrameHeight:320,
                                            initialFrameWidth:1000,
                                            
                                        });
                                    </script>
                                </div>
                                
                                
                                
                                <button type="submit" class="btn btn-primary btn-sm" name="addpost">保  存</button>
                            </form>
                    </div>
                    <div class="tab-pane" id="setmoney">
                        <form role="form" action="add.php" method="post" enctype="multipart/form-data">
                            <br>
                            <div class="form-group">
                                    <label for="starttime">推广时间</label>
                                    <br>
                                        <input type="text" class="input-small datepicker" name="starttime" id="date01" style="margin-right:30px;width:260px;">
                                    
                                    ---
                                    <input type="text" class="input-small datepicker" name="endtime" id="date02" style="margin-left:30px;width:260px;">
                            </div>
                            <div class="form-group">
                                    <label for="money">总金额</label>
                                    <input type="text" class="form-control" id="money" name="money">
                            </div>
                            <div class="form-group">
                                    <label for="minprice">最低点击单价</label>
                                    <input type="text" class="form-control" id="minprice" name="minprice">
                            </div>
                            <div class="form-group">
                                    <label for="maxprice">最高点击单价</label>
                                    <input type="text" class="form-control" id="maxprice" name="maxprice">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" name="addpost">保  存</button>
                        </form>
                    </div>
                    <div class="tab-pane" id="setbanner">
                        <form role="form" action="add.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <br>
                                <label for="remark">上传缩略图</label>
                                <input type="file" name="slpic">
                                    
                            </div>

                            <div class="form-group">
                                <br>
                                <label for="city">顶部banner<br>
                                <span style="font-size:12px;color:red;display:none;" id="citytips">
                                        请使用下面编辑器中的多图上传功能，有几个不同的选项，根据需要操作
                                </span></label>
                                    <script id="bannercontent" name="bannercontent" type="text/plain">
                                    </script>
                                    
                                    <script type="text/javascript">
                                        var ue = UE.getEditor('bannercontent',{
                                            initialFrameHeight:320,
                                            initialFrameWidth:1000,
                                            
                                        });
                                    </script>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" name="addpost">保  存</button>
                        </form>
                    </div>
                    <div class="tab-pane" id="setarea">
                        <form role="form" action="add.php" method="post" enctype="multipart/form-data">
                            <br>
                            <div class="form-group">
                                    <label for="storeaddr">商家地址</label>
                                    <div id="storecity">
                                        <select class="prov" name="storeprovince"></select>
                                        <select class="city" disabled="disabled" name="storecity"></select>
                                        <select class="dist" disabled="disabled" name="storedist"></select>
                                    </div>
                                    <input style="margin-top:5px;" type="text" class="form-control" id="storeaddr" name="storeaddr">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="city">有效分钱区域  <br>
                                <span style="font-size:12px;color:red;" id="citytips">
                                        如果需要具体到县级请在输入框中输入，多个城市以竖线（‘|’）分隔，如 涪城区|游仙区|江油市 .  为空默认全市范围
                                </span></label>
                                <br>
                                <div id="city">
                                    <select class="prov" name="province"></select>
                                    <select class="city" disabled="disabled" name="city" onchange="selectcity()"></select>
                                </div>
                                <textarea name="district" id="district" rows="3" cols="89" style="display:none;margin-top:10px;"></textarea> 
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" name="addpost">保  存</button>
                        </form>
                    </div>
                    <div class="tab-pane" id="openvisit">
                        <form role="form" action="add.php" method="post" enctype="multipart/form-data">
                            <br>
                            <div class="form-group">
                                <label for="remark">状态</label>
                                <select name="status">
                                    <option value="0">未发布</option>
                                    <option value="1">发布</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" name="addpost">保  存</button>
                        </form>
                    </div>
                </div>
             
                              
                              
            </div>
        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
$(function() {
    $( "#date01" ).datepicker();
    $( "#date02" ).datepicker();
});
</script>

<script src="js/jquery.cityselect.js"></script>
<script>
$("#city").citySelect({   
    url:"js/city.min.js",   
    prov:"四川省", //省份  
    city:"绵阳市", //城市  
});

$("#storecity").citySelect({   
    url:"js/city.min.js",   
    prov:"四川省", //省份  
    city:"绵阳市", //城市 
    nodata:"none" 
});

$(function(){
    if($(".city").length>0&&$(".city")[0].value!='全省'){
        $("#citytips").show();
        $("#district").show();
    }else{
        $("#citytips").hide();
        $("#district").value='';
        $("#district").hide();
    }
});

function selectcity(){
    var city = $(".city")[0].value;
    if(city=='全省'){
        $("#citytips").hide();
        $("#district").value='';
        $("#district").hide();
    }else{
        $("#citytips").show();
        $("#district").value='';
        $("#district").show();
    }
}
</script>
<?php include 'template/footer.php';?>