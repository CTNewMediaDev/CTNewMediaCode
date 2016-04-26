<?php include 'template/header.php';?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<!--content section start-->
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="#">添加banner</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-edit"></i> 编辑banner图</h2>
            </div>
            <div style="width:100%;padding:10px 20px;font-weight:Bold;"><a href="banner.php">返回列表</a></div>
            <div class="box-content">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#article">编辑banner图</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <?php if(!empty($msg)):?>
                        <div style="width:100%;height:30px;font-size:12px;color:green;">
                            <?php echo $msg;?>
                        </div>
                    <?php endif;?>
                    <div class="tab-pane active" id="article">
                            <form role="form" id="bannerform" action="banneredit.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                <br>
                                <div class="form-group">
                                    <label for="title">标题</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $data['title'];?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="position">显示位置</label>
                                    <br>
                                    <select id="position" name="position" data-rel="chosen" style="width:140px;">
                                        <option value="首页" <?php if($data['position']=='首页'):?>selected<?php endif;?>>首页</option>
                                        <?php foreach($allcategory as $cat):?>
                                        <option value="<?php echo $cat['name'];?>" <?php if($data['position']==$cat['name']):?>selected<?php endif;?>><?php echo $cat['name'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <br>
                                    <label for="slpic">上传banner图</label>
                                    <input type="file" name="slpic"> 
                                    <?php if(!empty($data['imgurl'])):?>
                                        <br>
                                        <img src="<?php echo $data['imgurl'];?>" style="height:80px;width:auto;" />
                                    <?php else:?>
                                        No Image Yet
                                    <?php endif;?>
                                </div>
                                
                                <br>
                                <div class="form-group">
                                    <label for="title">链接地址</label>
                                    <input type="text" class="form-control" id="linkto" name="linkto" value="<?php echo $data['linkto'];?>">
                                </div>
                                
                                <br>
                                <div class="form-group">
                                    <label for="status">状态</label>
                                    <select name="status" id="status">
                                        <option value="0" <?php if($data['status']==0):?> selected<?php endif;?>>未发布</option>
                                        <option value="1" <?php if($data['status']==1):?> selected<?php endif;?>>发布</option>
                                    </select>
                                </div>
                                
                                <input type="hidden" name="addpost">
                                <button type="button" onclick="submitform('bannerform')" class="btn btn-primary btn-sm">保  存</button>
                            </form>
                    </div>
                    
                </div>
             
                              
                              
            </div>
        </div>
    </div>
</div>

<script>
function submitform(formid){
    document.getElementById(formid).submit();
}
</script>
<?php include 'template/footer.php';?>