<?php include 'template/header.php';?>
<!--content section start-->
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="#">banner图列表</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-align-justify"></i> banner列表</h2>
            </div>
            <div style="width:100%;padding:10px 20px;font-weight:Bold;"><a href="banneradd.php">添加Banner图</a></div>
            <div class="box-content row" style="padding:20px;">
                <table id="bannerlist" class="table table-striped table-bordered bootstrap-datatable  responsive order-column" style="font-size:12px;">
				    <thead>
				    <tr>
				        <th width="70">编号</th>
				        <th>标题</th>
                        <th width="70">位置</th>
                        <th width="90">状态</th>
                        <th width="120">图片</th>
                        <th width="120">链接</th>
                        <th width="140">添加时间</th>
				        <th width="140">操作</th>
				    </tr>
				    </thead>
				</table>
				<tbody></tbody>
            </div>
        </div>
    </div>
</div>
<!--content section end-->   
<script>
		$(document).ready(function() {
                $('#bannerlist').dataTable( {
                        "sDom": "<'row-fluid'<'col-md-6'l><'col-md-6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
						"sPaginationType": "bootstrap",
						"oLanguage": {
						"sLengthMenu": "_MENU_ records per page"
						},
                        "bProcessing": true,
                        "bServerSide": true,
                        "bSort":false,
					    "sAjaxSource": "getbanners.php"
                });
        }); 

        function deletearticle(id){
            if(confirm("确定删除？")){
                $.get("bannerdelete.php?id="+id,function(data){
                    console.log(data);
                    if(data=='success'){
                        $('#deleteitem'+id).parent().parent().remove();  
                    }
                })    
            }
        }
</script>
<?php include 'template/footer.php';?>