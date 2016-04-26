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
            <div style="width:100%;padding:10px 20px;font-weight:Bold;"><a href="index.php">返回列表</a></div>
            <div class="box-content">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#article">文章内容</a></li>
                    
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active" id="article">
                            <form role="form" id="articleform" action="add.php?formid=articleform" method="post" enctype="multipart/form-data">
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
                                
                                
                                <input type="hidden" name="addpost">
                                <button type="button" onclick="submitform('articleform')" class="btn btn-primary btn-sm">保  存</button>
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

function submitform(formid){
    document.getElementById(formid).submit();
}
</script>
<?php include 'template/footer.php';?>