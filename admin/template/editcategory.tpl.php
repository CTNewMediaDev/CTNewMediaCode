<?php include 'template/header.php';?>
<link href='../res/css/font-awesome.css' rel='stylesheet'>
<style>
.fa{font-size:30px;}
</style>
<!--content section start-->
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php">Home</a>
        </li>
        <li>
            <a href="#">修改分类</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-edit"></i> 修改分类</h2>
            </div>
            <div class="box-content row" style="padding:20px;">
                <?php if(!empty($msg)):?>
                    <div style="width:100%;height:30px;font-size:12px;color:green;">
                        <?php echo $msg;?>
                    </div>
                <?php endif;?>
                <form role="form" action="category.php?action=editcategory" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="catname">分类名</label>
                        <input type="text" class="form-control" id="catname" name="catname" value="<?php echo $categoryinfo['name'];?>">
                        <input type="hidden" class="form-control" id="catid" name="catid" value="<?php echo $categoryinfo['id'];?>">
                    </div>
                    <div class="form-group">
                        <label for="ordernum">显示顺序</label>
                        <input type="text" class="form-control" id="ordernum" name="ordernum" value="<?php echo $categoryinfo['ordernum'];?>">
                    </div>

                    <div class="form-group">
                        <label for="iconclass">小图标</label>&nbsp;&nbsp;
                        <i class="fa fa-<?php echo $categoryinfo['iconclass'];?>" ></i>
                        <input type="text" class="form-control" id="iconclass" name="iconclass" value="<?php echo $categoryinfo['iconclass'];?>">
                    </div>

                    <div class="form-group">
                        <label for="iconclass">状态</label>
                        <select name="status">
                            <option value="0" <?php if($categoryinfo['status']==0):?>selected<?php endif;?>>未发布</option>
                            <option value="1" <?php if($categoryinfo['status']==1):?>selected<?php endif;?>>发布</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm" name="savedata">Click to Submit</button>
                </form>    
            </div>
            <div class="box-content row" style="padding:20px;">
                <div class="box-content row" style="padding:20px;">

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-adjust"></i> adjust</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-anchor"></i> anchor</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-archive"></i> archive</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-area-chart"></i> area-chart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-arrows"></i> arrows</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-arrows-h"></i> arrows-h</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-arrows-v"></i> arrows-v</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-asterisk"></i> asterisk</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-at"></i> at</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-automobile"></i> automobile <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-balance-scale"></i> balance-scale</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-ban"></i> ban</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bank"></i> bank <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bar-chart"></i> bar-chart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bar-chart-o"></i> bar-chart-o <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-barcode"></i> barcode</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bars"></i> bars</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-battery-0"></i> battery-0 <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-battery-1"></i> battery-1 <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-battery-2"></i> battery-2 <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-battery-3"></i> battery-3 <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-battery-4"></i> battery-4 <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-battery-empty"></i> battery-empty</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-battery-full"></i> battery-full</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-battery-half"></i> battery-half</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-battery-quarter"></i> battery-quarter</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-battery-three-quarters"></i> battery-three-quarters</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bed"></i> bed</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-beer"></i> beer</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bell"></i> bell</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bell-o"></i> bell-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bell-slash"></i> bell-slash</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bell-slash-o"></i> bell-slash-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bicycle"></i> bicycle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-binoculars"></i> binoculars</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-birthday-cake"></i> birthday-cake</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bluetooth"></i> bluetooth</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bluetooth-b"></i> bluetooth-b</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bolt"></i> bolt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bomb"></i> bomb</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-book"></i> book</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bookmark"></i> bookmark</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bookmark-o"></i> bookmark-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-briefcase"></i> briefcase</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bug"></i> bug</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-building"></i> building</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-building-o"></i> building-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bullhorn"></i> bullhorn</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bullseye"></i> bullseye</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-bus"></i> bus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-cab"></i> cab <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-calculator"></i> calculator</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-calendar"></i> calendar</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-calendar-check-o"></i> calendar-check-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-calendar-minus-o"></i> calendar-minus-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-calendar-o"></i> calendar-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-calendar-plus-o"></i> calendar-plus-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-calendar-times-o"></i> calendar-times-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-camera"></i> camera</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-camera-retro"></i> camera-retro</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-car"></i> car</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-caret-square-o-down"></i> caret-square-o-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-caret-square-o-left"></i> caret-square-o-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-caret-square-o-right"></i> caret-square-o-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-caret-square-o-up"></i> caret-square-o-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-cart-arrow-down"></i> cart-arrow-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-cart-plus"></i> cart-plus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-cc"></i> cc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-certificate"></i> certificate</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-check"></i> check</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-check-circle"></i> check-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-check-circle-o"></i> check-circle-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-check-square"></i> check-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-check-square-o"></i> check-square-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-child"></i> child</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-circle"></i> circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-circle-o"></i> circle-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-circle-o-notch"></i> circle-o-notch</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-circle-thin"></i> circle-thin</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-clock-o"></i> clock-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-clone"></i> clone</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-close"></i> close <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-cloud"></i> cloud</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-cloud-download"></i> cloud-download</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-cloud-upload"></i> cloud-upload</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-code"></i> code</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-code-fork"></i> code-fork</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-coffee"></i> coffee</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-cog"></i> cog</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-cogs"></i> cogs</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-comment"></i> comment</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-comment-o"></i> comment-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-commenting"></i> commenting</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-commenting-o"></i> commenting-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-comments"></i> comments</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-comments-o"></i> comments-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-compass"></i> compass</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-copyright"></i> copyright</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-creative-commons"></i> creative-commons</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-credit-card"></i> credit-card</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-credit-card-alt"></i> credit-card-alt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-crop"></i> crop</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-crosshairs"></i> crosshairs</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-cube"></i> cube</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-cubes"></i> cubes</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-cutlery"></i> cutlery</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-dashboard"></i> dashboard <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-database"></i> database</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-desktop"></i> desktop</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-diamond"></i> diamond</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-dot-circle-o"></i> dot-circle-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-download"></i> download</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-edit"></i> edit <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-ellipsis-h"></i> ellipsis-h</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-ellipsis-v"></i> ellipsis-v</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-envelope"></i> envelope</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-envelope-o"></i> envelope-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-envelope-square"></i> envelope-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-eraser"></i> eraser</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-exchange"></i> exchange</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-exclamation"></i> exclamation</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-exclamation-circle"></i> exclamation-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-exclamation-triangle"></i> exclamation-triangle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-external-link"></i> external-link</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-external-link-square"></i> external-link-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-eye"></i> eye</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-eye-slash"></i> eye-slash</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-eyedropper"></i> eyedropper</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-fax"></i> fax</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-feed"></i> feed <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-female"></i> female</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-fighter-jet"></i> fighter-jet</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-file-archive-o"></i> file-archive-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-file-audio-o"></i> file-audio-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-file-code-o"></i> file-code-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-file-excel-o"></i> file-excel-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-file-image-o"></i> file-image-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-file-movie-o"></i> file-movie-o <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-file-pdf-o"></i> file-pdf-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-file-photo-o"></i> file-photo-o <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-file-picture-o"></i> file-picture-o <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-file-powerpoint-o"></i> file-powerpoint-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-file-sound-o"></i> file-sound-o <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-file-video-o"></i> file-video-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-file-word-o"></i> file-word-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-file-zip-o"></i> file-zip-o <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-film"></i> film</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-filter"></i> filter</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-fire"></i> fire</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-fire-extinguisher"></i> fire-extinguisher</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-flag"></i> flag</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-flag-checkered"></i> flag-checkered</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-flag-o"></i> flag-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-flash"></i> flash <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-flask"></i> flask</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-folder"></i> folder</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-folder-o"></i> folder-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-folder-open"></i> folder-open</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-folder-open-o"></i> folder-open-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-frown-o"></i> frown-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-futbol-o"></i> futbol-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-gamepad"></i> gamepad</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-gavel"></i> gavel</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-gear"></i> gear <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-gears"></i> gears <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-gift"></i> gift</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-glass"></i> glass</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-globe"></i> globe</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-graduation-cap"></i> graduation-cap</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-group"></i> group <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hand-grab-o"></i> hand-grab-o <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hand-lizard-o"></i> hand-lizard-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hand-paper-o"></i> hand-paper-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hand-peace-o"></i> hand-peace-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hand-pointer-o"></i> hand-pointer-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hand-rock-o"></i> hand-rock-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hand-scissors-o"></i> hand-scissors-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hand-spock-o"></i> hand-spock-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hand-stop-o"></i> hand-stop-o <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hashtag"></i> hashtag</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hdd-o"></i> hdd-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-headphones"></i> headphones</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-heart"></i> heart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-heart-o"></i> heart-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-heartbeat"></i> heartbeat</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-history"></i> history</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-home"></i> home</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hotel"></i> hotel <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hourglass"></i> hourglass</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hourglass-1"></i> hourglass-1 <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hourglass-2"></i> hourglass-2 <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hourglass-3"></i> hourglass-3 <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hourglass-end"></i> hourglass-end</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hourglass-half"></i> hourglass-half</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hourglass-o"></i> hourglass-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-hourglass-start"></i> hourglass-start</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-i-cursor"></i> i-cursor</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-image"></i> image <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-inbox"></i> inbox</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-industry"></i> industry</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-info"></i> info</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-info-circle"></i> info-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-institution"></i> institution <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-key"></i> key</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-keyboard-o"></i> keyboard-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-language"></i> language</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-laptop"></i> laptop</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-leaf"></i> leaf</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-legal"></i> legal <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-lemon-o"></i> lemon-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-level-down"></i> level-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-level-up"></i> level-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-life-bouy"></i> life-bouy <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-life-buoy"></i> life-buoy <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-life-ring"></i> life-ring</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-life-saver"></i> life-saver <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-lightbulb-o"></i> lightbulb-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-line-chart"></i> line-chart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-location-arrow"></i> location-arrow</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-lock"></i> lock</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-magic"></i> magic</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-magnet"></i> magnet</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-mail-forward"></i> mail-forward <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-mail-reply"></i> mail-reply <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-mail-reply-all"></i> mail-reply-all <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-male"></i> male</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-map"></i> map</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-map-marker"></i> map-marker</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-map-o"></i> map-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-map-pin"></i> map-pin</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-map-signs"></i> map-signs</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-meh-o"></i> meh-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-microphone"></i> microphone</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-microphone-slash"></i> microphone-slash</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-minus"></i> minus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-minus-circle"></i> minus-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-minus-square"></i> minus-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-minus-square-o"></i> minus-square-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-mobile"></i> mobile</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-mobile-phone"></i> mobile-phone <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-money"></i> money</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-moon-o"></i> moon-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-mortar-board"></i> mortar-board <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-motorcycle"></i> motorcycle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-mouse-pointer"></i> mouse-pointer</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-music"></i> music</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-navicon"></i> navicon <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-newspaper-o"></i> newspaper-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-object-group"></i> object-group</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-object-ungroup"></i> object-ungroup</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-paint-brush"></i> paint-brush</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-paper-plane"></i> paper-plane</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-paper-plane-o"></i> paper-plane-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-paw"></i> paw</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-pencil"></i> pencil</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-pencil-square"></i> pencil-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-pencil-square-o"></i> pencil-square-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-percent"></i> percent</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-phone"></i> phone</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-phone-square"></i> phone-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-photo"></i> photo <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-picture-o"></i> picture-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-pie-chart"></i> pie-chart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-plane"></i> plane</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-plug"></i> plug</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-plus"></i> plus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-plus-circle"></i> plus-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-plus-square"></i> plus-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-plus-square-o"></i> plus-square-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-power-off"></i> power-off</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-print"></i> print</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-puzzle-piece"></i> puzzle-piece</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-qrcode"></i> qrcode</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-question"></i> question</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-question-circle"></i> question-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-quote-left"></i> quote-left</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-quote-right"></i> quote-right</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-random"></i> random</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-recycle"></i> recycle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-refresh"></i> refresh</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-registered"></i> registered</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-remove"></i> remove <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-reorder"></i> reorder <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-reply"></i> reply</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-reply-all"></i> reply-all</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-retweet"></i> retweet</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-road"></i> road</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-rocket"></i> rocket</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-rss"></i> rss</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-rss-square"></i> rss-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-search"></i> search</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-search-minus"></i> search-minus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-search-plus"></i> search-plus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-send"></i> send <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-send-o"></i> send-o <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-server"></i> server</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-share"></i> share</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-share-alt"></i> share-alt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-share-alt-square"></i> share-alt-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-share-square"></i> share-square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-share-square-o"></i> share-square-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-shield"></i> shield</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-ship"></i> ship</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-shopping-bag"></i> shopping-bag</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-shopping-basket"></i> shopping-basket</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i> shopping-cart</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sign-in"></i> sign-in</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sign-out"></i> sign-out</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-signal"></i> signal</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sitemap"></i> sitemap</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sliders"></i> sliders</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-smile-o"></i> smile-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-soccer-ball-o"></i> soccer-ball-o <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sort"></i> sort</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sort-alpha-asc"></i> sort-alpha-asc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sort-alpha-desc"></i> sort-alpha-desc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sort-amount-asc"></i> sort-amount-asc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sort-amount-desc"></i> sort-amount-desc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sort-asc"></i> sort-asc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sort-desc"></i> sort-desc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sort-down"></i> sort-down <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sort-numeric-asc"></i> sort-numeric-asc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sort-numeric-desc"></i> sort-numeric-desc</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sort-up"></i> sort-up <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-space-shuttle"></i> space-shuttle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-spinner"></i> spinner</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-spoon"></i> spoon</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-square"></i> square</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-square-o"></i> square-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-star"></i> star</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-star-half"></i> star-half</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-star-half-empty"></i> star-half-empty <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-star-half-full"></i> star-half-full <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-star-half-o"></i> star-half-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-star-o"></i> star-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sticky-note"></i> sticky-note</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sticky-note-o"></i> sticky-note-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-street-view"></i> street-view</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-suitcase"></i> suitcase</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-sun-o"></i> sun-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-support"></i> support <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-tablet"></i> tablet</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-tachometer"></i> tachometer</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-tag"></i> tag</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-tags"></i> tags</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-tasks"></i> tasks</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-taxi"></i> taxi</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-television"></i> television</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-terminal"></i> terminal</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-thumb-tack"></i> thumb-tack</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-thumbs-down"></i> thumbs-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-thumbs-o-down"></i> thumbs-o-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-thumbs-o-up"></i> thumbs-o-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-thumbs-up"></i> thumbs-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-ticket"></i> ticket</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-times"></i> times</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-times-circle"></i> times-circle</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-times-circle-o"></i> times-circle-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-tint"></i> tint</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-toggle-down"></i> toggle-down <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-toggle-left"></i> toggle-left <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-toggle-off"></i> toggle-off</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-toggle-on"></i> toggle-on</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-toggle-right"></i> toggle-right <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-toggle-up"></i> toggle-up <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-trademark"></i> trademark</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-trash"></i> trash</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-trash-o"></i> trash-o</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-tree"></i> tree</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-trophy"></i> trophy</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-truck"></i> truck</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-tty"></i> tty</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-tv"></i> tv <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-umbrella"></i> umbrella</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-university"></i> university</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-unlock"></i> unlock</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-unlock-alt"></i> unlock-alt</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-unsorted"></i> unsorted <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-upload"></i> upload</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-user"></i> user</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-user-plus"></i> user-plus</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-user-secret"></i> user-secret</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-user-times"></i> user-times</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-users"></i> users</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-video-camera"></i> video-camera</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-volume-down"></i> volume-down</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-volume-off"></i> volume-off</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-volume-up"></i> volume-up</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-warning"></i> warning <span class="text-muted">(别名)</span></a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-wheelchair"></i> wheelchair</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-wifi"></i> wifi</a></div>

                <div class="fa-hover col-md-3 col-sm-4"><a href="javascript:void(0)"><i class="fa fa-wrench"></i> wrench</a></div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php';?>