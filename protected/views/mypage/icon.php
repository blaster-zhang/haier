<div class="usercenter-box">
  <div class="usercenter-left">
   	<dl class="usercenter-photo">
        	<dt><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/usercenter-photo.png"></dt>
            <dd>乐乐妈OSNGW</dd>
      <dd>
      	<div class="module_lv">
                        <span class="module_lv_l"></span>
                        <span class="module_lv_v"></span>
                        <span class="module_lv_1"></span>
                        <span class="module_lv_2"></span>
                        <span class="module_lv_3"></span>
                        <span class="module_lv_4"></span>
                        <span class="module_lv_5"></span>
                        <span class="module_lv_6"></span>
                        <span class="module_lv_7"></span>
                        <span class="module_lv_8"></span>
                        <span class="module_lv_9"></span>
                        <span class="module_lv_0"></span>
         </div></dd>	
        </dl>
        
        <div class="my-medal">
        	 <h4>我的勋章</h4>
        	 <div class="medal-content">
             	<div class="dal-left"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/dal-left.png"></a></div>
                <ul>
                	<li><a  href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/medal1.png"></a></li>
                    <li><a  href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/medal2.png"></a></li>
                    <li><a  href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/medal3.png"></a></li>
                </ul>
                <div class="dal-right"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/dal-right.png"></a></div>
             </div>
        </div>
        <div class="clear"></div>
        
        <div class="my-fuwu">
   		  <h4>优知服务</h4>
            <ul>            	
            	<li><span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-story.png"></span><a href="#">新鲜事</a></li>
                <li><span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-bbs.png"></span><a href="#">论坛</a></li>
                <li><span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-photo.png"></span><a href="#">相册</a></li>
                <li><span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-table.png"></span><a href="#">试用报告</a></li>
                <li><span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-eat.png"></span><a href="#">宝宝食谱</a></li>
                <li><span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-task.png"></span><a href="#">有知任务</a></li>
                <li><span><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icon-wen.png"></span><a href="#">我要提问</a></li>
            </ul>
    </div>
    <div class="my-add"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/my-add.png"></a></div>
  </div>
  <!------------------------right-------------->
  <div class="usercenter-right">
    <div class="report">
  		
  	 	<div class="report-com-box">
        	<div class="report-com">
        		<h3>乐乐妈的资料</h3>
                <ul class="r-ulstyle">
                	<li><a href="<?php echo Yii::app()->createUrl("/mypage/info"); ?>" >基本信息</a></li>
                    <li><a href="#"  class="fans-huia">头像信息</a></li>
                    <li class="r-no-com"></li>
                    <div class="clear"></div>
                </ul>
                <div class="rep-up-photo">
                	<div class="up-photo-left">
                    	<h3 class="title-notborder">当前头像</h3>
                        <div class="photo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/usercenter-photo.png"></div>
                    </div>
                    <div class="up-photo-right">
                    	<h3>当前头像</h3>
                        <p>支持JPG,GIF,BMP,和PNG文件，最大4M</p>
                        <form>
                        	<input type="button" class="up-photo-btn" value="上传头像">
                        </form>
                    </div>
                    <div class="clear"></div>
                </div> 
        	</div>
        </div>
    </div>
  	 
  </div>
  <!------------------------right-------------->  
    
<div class="clear"></div>    
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