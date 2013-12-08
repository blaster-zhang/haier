<div class="hj_yytc_nav">
	<ul>
		<li class="hover"><a href="#">营养套餐系列</a></li>
		<li><a href="#">恒温调奶器</a></li>
		<li><a href="#">多维辅食搅拌机</a></li>
		<li><a href="#">多组合蒸汽消毒机</a></li>
		<li><a href="#">产品试用报告</a></li>
	</ul>
</div>
<div class="hj_yytc_banner">
	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner.png" width="999" height="265"  />
</div>
<div class="hj_yytc_content">
	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/content.png" width="1000" height="400"  />
</div>
<div class="hj_yytc_xq">
	<ul>
		<li>
			<h3>恒温调奶器<a href="#">了解详情>></a></h3>
			<span>40度极速调奶，一键操作，便捷省心</span>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/qx.png" width="299" height="252"  />
			<div class="hj_yytc_xq_dj"><b>单品抢先价</b>￥234元</div>
			<div class="hj_yytc_xq_gm">
				<div class="hj_yytc_xq_gm_left"><a href="#">立即购买</a></div>
				<div class="hj_yytc_xq_gm_right"><a href="#">我想购买</a></div>
				<div class="hj_yytc_xq_gm_right"><a href="#">2341人想买</a></div>
                <div class="clear"></div>
			</div>
		</li>
		<li>
			<h3>恒温调奶器<a href="#">了解详情>></a></h3>
			<span>40度极速调奶，一键操作，便捷省心</span>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/qx.png" width="299" height="252"  />
			<div class="hj_yytc_xq_dj"><b>单品抢先价</b>￥234元</div>
			<div class="hj_yytc_xq_gm">
				<div class="hj_yytc_xq_gm_left"><a href="#">立即购买</a></div>
				<div class="hj_yytc_xq_gm_right"><a href="#">我想购买</a></div>
				<div class="hj_yytc_xq_gm_right"><a href="#">2341人想买</a></div>
                <div class="clear"></div>
			</div>
		</li>
		<li>
			<h3>恒温调奶器<a href="#">了解详情>></a></h3>
			<span>40度极速调奶，一键操作，便捷省心</span>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/qx.png" width="299" height="252"  />
			<div class="hj_yytc_xq_dj"><b>单品抢先价</b>￥234元</div>
			<div class="hj_yytc_xq_gm">
				<div class="hj_yytc_xq_gm_left"><a href="#">立即购买</a></div>
				<div class="hj_yytc_xq_gm_right"><a href="#">我想购买</a></div>
				<div class="hj_yytc_xq_gm_right"><a href="#">2341人想买</a></div>
                <div class="clear"></div>
			</div>
		</li>
	</ul>
</div>
<div class="hj_user_fx">
	<strong>用户体验分享</strong>
</div>
<div class="hj_user_fx_box">
	<ul>
		<li>
			<div class="hj_user_fx_left">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/hj_fx.png" width="180" height="120"  />
			</div>
			<div class="hj_user_fx_right">
				<h3>试用者：乐乐妈</h3>
				<span>很高兴获得海尔家电的试用机会，前天货刚到试用了一下，感觉还不错，很高兴获得海尔家电的试用机会，前天货刚到试用了一下，感觉还不错，分享如下</span>
			</div>
		</li>
		<li>
			<div class="hj_user_fx_left">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/hj_fx.png" width="180" height="120"  />
			</div>
			<div class="hj_user_fx_right">
				<h3>试用者：乐乐妈</h3>
				<span>很高兴获得海尔家电的试用机会，前天货刚到试用了一下，感觉还不错，很高兴获得海尔家电的试用机会，前天货刚到试用了一下，感觉还不错，分享如下</span>
			</div>
		</li>
	</ul>
</div>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/play.min.js"></script> 
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