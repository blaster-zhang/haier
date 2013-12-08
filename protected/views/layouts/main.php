<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" type="text/css" rel="stylesheet" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/module.css" type="text/css" rel="stylesheet" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/page.css" type="text/css" rel="stylesheet" />
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.1.8.2.min.js"></script> 
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="module_top_box">
  <div class="module_top">
    <div class="left"> <a href="#">海尔官网</a><span>|</span><a href="#">海尔商城</a><span>|</span><a href="#">日日顺家居网</a> </div>
    <div class="right"> 您当前是第<span>82139230</span>位访客 </div>
  </div>
</div>
<!--<div class="module_logo_box">
  <div class="module_logo"><a href="#"><img src="images/logo.png" width="377" height="46" /></a></div>
  <ul class="module_log_info">
    <li><a href="#">退出</a></li>
    <li><a href="#">个人资料</a></li>
    <li class="m_my_home"><a href="#"><i></i>我的主页</a></li>
    <li class="user_name"><a href="#">乐乐妈OWENWR</a></li>
  </ul>
  <div class="module_search">
    <div class="search_check" id="search_check"><span>谣言</span><i></i></div>
    <div class="search_text" id="search_text">
      <input type="text" value="默认新一期谣言标题" />
    </div>
    <div class="search_sub">
      <input type="submit" value="" />
    </div>
    <ul class="search_check_list" id="search_check_list">
      <li><a href="#">谣言</a></li>
      <li><a href="#">新闻</a></li>
      <li><a href="#">动态</a></li>
      <li><a href="#">食谱</a></li>
    </ul>
  </div>
</div>-->
<div class="module_logo_box">
  <div class="module_logo"><a href="#"><img src="images/logo.png" width="377" height="46" /></a></div>
  <div class="module_not_login">
      <ul>
        <li><a href="#">注册</a></li>
        <li id="module_login"><a href="#">登录</a></li>
      </ul>
      <div class="module_i_login_box" id="module_i_login_box">
        <dl><dt>用户名</dt><dd class="i_text"><input type="text" value="" /></dd><dd></dd></dl>
        <dl><dt>密码</dt><dd class="i_text"><input type="password" value="" /></dd><dd class="sub"><input type="submit" value="" /></dd></dl>
        <dl><dt></dt><dd class="text"><input type="checkbox" />记住我<a href="#">忘记密码？</a></dd><dd></dd></dl>
      </div>
  </div>
  <div class="module_search">
    <div class="search_check" id="search_check"><span>谣言</span><i></i></div>
    <div class="search_text" id="search_text">
      <input type="text" value="默认新一期谣言标题" />
    </div>
    <div class="search_sub">
      <input type="submit" value="" />
    </div>
    <ul class="search_check_list" id="search_check_list">
      <li><a href="#">谣言</a></li>
      <li><a href="#">新闻</a></li>
      <li><a href="#">动态</a></li>
      <li><a href="#">食谱</a></li>
    </ul>
  </div>
</div>
<div class="module_nav_box">
  <ul class="module_nav">
    <li><a href="<?php echo Yii::app()->createUrl("/"); ?>"><b>首页</b><i>Home</i></a></li>
    <li><a href="<?php echo Yii::app()->createUrl("/knowledge"); ?>"><b>妈咪课堂</b> <i>Knowledge</i></a></li>
    <li><a href="<?php echo Yii::app()->createUrl("/conversation"); ?>"><b>妈咪聊</b> <i>Conversations</i></a></li>
    <li><a href="<?php echo Yii::app()->createUrl("/diet"); ?>"><b>宝宝食谱</b> <i>Baby's Diet</i></a></li>
    <li><a href="<?php echo Yii::app()->createUrl("/mypage"); ?>"><b>我的主页</b> <i>My Page</i></a></li>
    <li><a href="<?php echo Yii::app()->createUrl("/rewards"); ?>"><b>积分兑奖</b> <i>Rewards</i></a></li>
    <li><a href="<?php echo Yii::app()->createUrl("/product"); ?>"><b>育儿好帮手</b> <i>Haier Products</i></a></li>
    <li><a href="<?php echo Yii::app()->createUrl("/firsttime"); ?>"><b>新手上路</b> <i>First-time</i></a></li>
  </ul>
</div>

<?php echo $content;?>

<div class="copyright">
	<div class="copy1"><span>友情链接：</span><a href="#">宝宝树</a><a href="#">摇篮网</a><a href="#">太平洋亲子网</a><a href="#">55BBS</a></div>
    <div class="copy2"><a href="#">关于海尔</a><span>|</span><a href="#">新闻中心</a><span>|</span><a href="#">联系我们</a><span>|</span><a href="#">法律声明</a><span>|</span><a href="#">网站地图</a></div>
    <div class="copy3">鲁ICP备09096283 Copyright &copy;2013 海尔集团 版权所有</div>
</div>
</body>
</html>
