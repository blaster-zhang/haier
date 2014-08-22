<div class="usercenter-box">
	<div class="bread-list"><a href="#">我的相册名</a>&gt;<a href="#">相册名</a></div>
    <div class="photo-edit">
    	<div class="photo-h">相册</div>
        <div class="photo-com">
        	<ul>
            	<li><form><input type="button" value="上传相册" class="photo-up-btn"></form></li>
                <li><a href="#">编辑</a></li>
                <li><a href="#">删除相册</a></li>
                <div class="clear"></div>
            </ul>
            <div class="clear"></div>
         <div class="photo-m-com">
         	<div class="photo-m-com-left"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-my.png"/></a></div>
            <div class="photo-m-com-right">
            	<h3>[2013夏天]北京公园</h3>
                <div class="p-xin">相册简介<span>(共15张)</span></div>
                <p>北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完北京出完</p>
            </div>
            <div class="clear"></div>
            <div class="p-xin-com">
            	<dl>
                	<dt><a href="<?php echo Yii::app()->createUrl("/mypage/albumphoto"); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl>
                <dl>
                	<dt><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl><dl>
                	<dt><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl>
                <dl>
                	<dt><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl>
                <dl>
                	<dt><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl>
                <dl>
                	<dt><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl><dl>
                	<dt><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl>
                <dl>
                	<dt><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl>
                <dl>
                	<dt><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl>
                <dl>
                	<dt><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl><dl>
                	<dt><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl>
                <dl>
                	<dt><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl>
                <dl>
                	<dt><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl>
                <dl>
                	<dt><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl><dl>
                	<dt><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl>
                <dl>
                	<dt><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/photo-1.png"  height="180" width="210" /></a></dt>
                    <dd>妞妞</dd>
                </dl>
                <div class="clear"></div>
            </div>
             <div class="next back">
    	<a href="#" class="up"><b><</b>上一页</a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#" class="now">3</a>
        <a href="#">4</a>
        <a href="#" class="last">下一页<b>></b></a>
        <div class="clear"></div>
    </div>
         </div>
        </div>
    </div>
     
  
</div>
 
<script type="text/javascript">
$(function(){
	$("#search_check").click(function(){
		$("#search_check_list").slideToggle();
	})
	$("#search_check_list a").click(function(){
		$("#search_check span").html($(this).html());
		$("#search_check_list").slideToggle();
	})
	$("#search_text input").focus(function(){$(this).addClass("on")})
	$("#search_text input").blur(function(){$(this).removeClass("on")})
	$("#module_i_login_box,#module_login").hover(function(){
		$("#module_i_login_box").show();
	},function(){$("#module_i_login_box").hide();})
})
</script>