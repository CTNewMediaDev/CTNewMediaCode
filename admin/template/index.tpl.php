<?php include 'template/header.php';?>
<!--content section start-->
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="#">文章列表</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-align-justify"></i> 文章列表</h2>
            </div>
            <div style="width:100%;padding:10px 20px;font-weight:Bold;"><a href="add.php">添加文章</a></div>
            <div class="box-content row" style="padding:20px;">
                <table id="articlelist" class="table table-striped table-bordered bootstrap-datatable  responsive order-column" style="font-size:12px;">
				    <thead>
				    <tr>
				        <th width="50">编号</th>
				        <th>标题</th>
                        <th width="100">分类</th>
                        <th width="100">状态</th>
                        <th width="80">总金额</th>
                        <th width="80">剩余</th>
                        <th width="100">点击</th>
                        <th width="120">发布时间</th>
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
                $('#articlelist').dataTable( {
                        "sDom": "<'row-fluid'<'col-md-6'l><'col-md-6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
						"sPaginationType": "bootstrap",
						"oLanguage": {
						"sLengthMenu": "_MENU_ records per page"
						},
                        "bProcessing": true,
                        "bServerSide": true,
                        "bSort":false,
					    "sAjaxSource": "getList.php"
                });
        }); 

        function deletearticle(id){
            if(confirm("确定删除？")){
                $.get("delete.php?id="+id,function(data){
                    console.log(data);
                    if(data=='success'){
                        $('#deleteitem'+id).parent().parent().remove();  
                    }
                })    
            }
        }
</script>
<?php include 'template/footer.php';?>