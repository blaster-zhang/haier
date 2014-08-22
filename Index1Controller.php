<?php
/**
 * 首页控制器
 * @author erbiao.hu
 * @data 2013-8-12
 * @version 1.0
 */
class Index1Controller extends Controller1
{

    /**
     * __construct 控制器
     * @name __construct
     */
    public function __construct($controller,$id)
    {
        parent::__construct($controller,$id);
    }
    
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
	    if (empty($this->userName)){
	        $this->redirect(Yii::app()->params['userCenter']."?fromurl=".Yii::app()->request->hostInfo.Yii::app()->request->baseUrl."/?r=index/index");
	    }

	    $indexScript = Yii::app()->request->baseUrl.'/js/index.js';
	    $indexSyScript = Yii::app()->request->baseUrl.'/js/index/synSouye.js';
	    $indexSyImgScript = Yii::app()->request->baseUrl.'/js/souYueFileUpload/multiUploadByIframe.js';
	    $qAnswerScript = Yii::app()->request->baseUrl.'/js/questionanswer.js';
        $mytipScript = Yii::app()->request->baseUrl.'/js/index/mytip.js';

	    $souyImgCss = Yii::app()->request->baseUrl.'/js/souYueFileUpload/multiUploadByIframe.css';
	    Yii::app()->clientScript->registerScriptFile($indexScript);

	    Yii::app()->clientScript->registerScriptFile($indexSyImgScript);
	    Yii::app()->clientScript->registerScriptFile($qAnswerScript);
        Yii::app()->clientScript->registerScriptFile($indexSyScript);
        Yii::app()->clientScript->registerScriptFile($mytipScript);
	    Yii::app()->clientScript->registerCssFile($souyImgCss);
	    $this->navType = 'index';
		$this->render('index', array('navType' => 'index'));
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	        $tolError = $error['message'];
	        if(Yii::app()->request->isAjaxRequest){
	            $tolError = 'isAjaxRequest错误消息='.$tolError;
	            Yii::log($tolError);	            
	        }
	        else{
	            $tolError = 'isNotAjaxRequest错误消息='.$tolError;
	            Yii::log($tolError);
	        }
	        $this->redirect(Yii::app()->request->hostInfo.Yii::app()->request->baseUrl."/?r=index/index");    
	    }
	}
	
	/**
	 * left分页控制器
	 * @name actionLeftMenAjax
	 * @author erbiao.hu
	 * @return html
	 */
	public function actionLeftMenAjax()
	{
	    $userName = $this->userName;
	    $cur_page = isset($_REQUEST['p']) ? $_REQUEST['p'] : '1';
	    $leftSearchWord = isset($_REQUEST['leftSearchWord']) ? unescape($_REQUEST['leftSearchWord']) : '';
	    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '';
	    $classifyUrl = Yii::app()->request->baseUrl.'/?r=index/LeftMenAjax/type/classify/leftSearchWord/'.$leftSearchWord.'/';
	    $themeUrl = Yii::app()->request->baseUrl.'/?r=index/LeftMenAjax/type/theme/leftSearchWord/'.$leftSearchWord.'/';
	    $leftMen = new PageService();
	    $leftClassifyService = new SubscribeService();
	    $classifyReq = array(
	            'userName'=>$this->userName,
	            //'userName'=>'zs123',
	            'wordClsName'=>'',
	            'pageNum'=>$cur_page,
	            'itemsPerPage'=>10,
	            'isLikeSearch'=>true,
	            'isSelectAll'=>false
	    );

	    $wordReq = array(
	            'userName'=>$this->userName,
	            //'userName'=>'zs123',
	            'wordName'=>'',
	            'pageNum'=>$cur_page,
	            'itemsPerPage'=>10,
	            'isLikeSearch'=>true,
	            'isSelectAll'=>false
	    );

    
        if ($type == "classify"){
            $classifyReq['wordClsName'] = $leftSearchWord;
            $wordReq['pageNum'] = 1;
            $leftClassifyLimitData = $leftClassifyService->getWordClsByName($classifyReq);
            $leftThemeLimitData = $leftClassifyService->getWordsByName($wordReq);
            $leftClassifydata = $leftMen->getPage("leftClassifyPage", 10, $classifyUrl, $cur_page, $leftClassifyLimitData['count'], $limitListData='');
            $leftThemedata = $leftMen->getPage("leftThemePage",10, $themeUrl, 1, $leftThemeLimitData['count'], $limitListData='');
            $leftClassifydata['data'] = $leftClassifyLimitData;
            $leftThemedata['data'] = $leftThemeLimitData;
        } else if ($type == "theme") {
            $wordReq['wordName'] = $leftSearchWord;
            $classifyReq['pageNum'] = 1;
            $leftClassifyLimitData = $leftClassifyService->getWordClsByName($classifyReq);
            $leftThemeLimitData = $leftClassifyService->getWordsByName($wordReq);
            $leftClassifydata = $leftMen->getPage("leftClassifyPage", 10, $classifyUrl, 1, $leftClassifyLimitData['count'], $limitListData='');
            $leftThemedata = $leftMen->getPage("leftThemePage",10, $themeUrl, $cur_page, $leftThemeLimitData['count'], $limitListData='');
            $leftClassifydata['data'] = $leftClassifyLimitData;
            $leftThemedata['data'] = $leftThemeLimitData;
        } else {
            $leftClassifyLimitData = $leftClassifyService->getWordClsByName($classifyReq);
            $leftThemeLimitData = $leftClassifyService->getWordsByName($wordReq);
            $leftClassifydata = $leftMen->getPage("leftClassifyPage", 10, $classifyUrl, $cur_page, $leftClassifyLimitData['count'], $limitListData='');
            $leftThemedata = $leftMen->getPage("leftThemePage",10, $themeUrl, $cur_page, $leftThemeLimitData['count'], $limitListData='');
            $leftClassifydata['data'] = $leftClassifyLimitData;
            $leftThemedata['data'] = $leftThemeLimitData;
        }

	    $this->renderPartial('leftmen', array('leftClassifydata' =>$leftClassifydata['data']['data'] ,
	            'leftClassifyPage' =>$leftClassifydata['getHtml'] ,
	            'leftThemedata' =>$leftThemedata['data']['data'] ,
	            'leftThemePage' =>$leftThemedata['getHtml'] ,
	            'leftSearchWord' =>$leftSearchWord));
	    Yii::app()->end();	     
	}
	
	/**
	 * MiddleThemeAjax--js请求
	 * @name actionMiddleThemeAjax
	 * @author erbiao.hu
	 * @return html
	 */
	public function actionMiddleThemeAjax()
	{
	    $leftClassiyName = isset($_REQUEST['leftClassiyName']) ? unescape($_REQUEST['leftClassiyName']) : 'null';
	    $leftClassiyId = isset($_REQUEST['leftClassiyId']) ? $_REQUEST['leftClassiyId'] : '';
	    /*返回分组Id*/
	    $feedContent = new FeedContentService();
	    if (empty($leftClassiyId)){
	        $leftClassiyId = $feedContent->returnClassifyId($leftClassiyName, $this->userName);
	    }
        $middleThemeData = Yii::app()->redis->getTheme($leftClassiyId,$this->userName);
        $this->renderPartial('middleThemeAjax', array('middleThemeData'=>$middleThemeData));
        Yii::app()->end();
	}
	
	/**
	 * feed流content控制器
	 * @name actionFeedContentMoreAjax
	 * @author erbiao.hu
	 * @param $table 表名，$filed 字段名称
	 * @return int 总数
	 */
	public function actionFeedContentMoreAjax()
	{
	    $cur_page = isset($_REQUEST['curPage']) ? $_REQUEST['curPage'] : '1';

	    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '000';
	    $offset = 10;
	    $starNumMore = isset($_REQUEST['moreNum']) ? $_REQUEST['moreNum'] : $offset;
	    $leftWord = isset($_REQUEST['leftWord']) ? unescape($_REQUEST['leftWord']) : 'null';
	    $leftWordSrpId = isset($_REQUEST['leftWordSrpId']) ? $_REQUEST['leftWordSrpId'] : '';
	    $leftClassify = isset($_REQUEST['leftClassify']) ? unescape($_REQUEST['leftClassify']) : 'null';
	    $leftClassiyId = isset($_REQUEST['leftClassiyId']) ? $_REQUEST['leftClassiyId'] : '';
	    $startNum = ($cur_page-1) * 30 + $starNumMore;
	    $endNum = $startNum + $offset - 1;
	    $feedContent = new FeedContentService();
	    if ( $leftWord != 'null'){
	        $leftWordService = new WordService();
	        $leftWordData = $leftWordService->getPageDatas($leftWordSrpId, $type, $startNum, $leftWord);
	        $leftWordArray = array();
	        if ( $leftWordData['code'] == 0 ){
    	        $feedContentData['totelSize'] = $leftWordData['data']['count']['0']['num'];
    	        for ($i=0; $i<count($leftWordData['data']['data']); $i++){
    	            if (empty($leftWordData['data']['data'][$i]['data'])){
    	                continue;
    	            }
    	            $feedContentData['msgTableSn'][] = $leftWordData['data']['data'][$i]['table_sn'];
    	            $leftWordArray[] = json_encode_cn($leftWordData['data']['data'][$i]['data']);
    	        }            
	        }else {
	            $leftWordArray = '';
	            $feedContentData['totelSize'] = 0;
	            $feedContentData['msgTableSn'] = array();
	        }
	        
    	   $feedContentData['msgData'] = $leftWordArray;	
	        
	    }else if ( $leftClassify != 'null' && $leftClassify != '全部'){
	        /*返回分组Id*/
	        if (empty($leftClassiyId)){
	            $leftClassiyId = $feedContent->returnClassifyId($leftClassify, $this->userName);
	        }
	        
	        $leftClassifyData = Yii::app()->redis->getTheme($leftClassiyId,$this->userName);
	        if (empty($leftClassifyData)){
	            $leftClassifyData = array();
	        }
	        $feedContentData = $feedContent->feedClassifyContent($this->userName, $leftClassifyData, $startNum, $endNum+1, $type);
	        $url = Yii::app()->request->baseUrl.'/?r=index/FeedPageNextAjax/leftClassify/'.$leftClassify.'/';
	    }else {
	        $feedContentData = $feedContent->totelFeedContent($this->userName, $startNum, $endNum, $type);
	    } 
	    if (empty($feedContentData['msgData'])){
	        echo 0;exit;
	    }else if (is_array($feedContentData['msgData'])){
	        //充用户刷新更新时间
	        $this->actionRenewFeedTime($feedContentData['msgData']);
	    }
	    $this->renderPartial('feedContentMore', array('feedContentData'=>$feedContentData['msgData'], 
	                         'msgTableSn'=>$feedContentData['msgTableSn']));
	    Yii::app()->end();
	}
	
	/**
	 * feed流contentPage控制器
	 * @name actionFeedContentMoreAjax
	 * @author erbiao.hu
	 * @param $table 表名，$filed 字段名称
	 * @return int 总数
	 */
	public function actionFeedPageNextAjax()
	{
	    $cur_page = isset($_REQUEST['p']) ? $_REQUEST['p'] : '1';
	    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '000';
	    $leftWord = isset($_REQUEST['leftWord']) ? unescape($_REQUEST['leftWord']) : 'null';
	    $leftWordSrpId = isset($_REQUEST['leftWordSrpId']) ? $_REQUEST['leftWordSrpId'] : '';
	    $leftClassify = isset($_REQUEST['leftClassify']) ? unescape($_REQUEST['leftClassify']) : 'null';
	    $leftClassiyId = isset($_REQUEST['leftClassiyId']) ? $_REQUEST['leftClassiyId'] : '';
	    $offset = 10;
	    $startNum = ($cur_page-1) * 30;
	    $endNum = $startNum + $offset - 1;
	    $feedContent = new FeedContentService();
	    if ( $leftWord != 'null' ){
	        $leftWordService = new WordService();
	        //获取主词相关信息(更改为传srpId)
	        $leftWordData = $leftWordService->getPageDatas($leftWordSrpId, $type, $startNum, $leftWord);
    	    $leftWordArray = array();
	        if ( $leftWordData['code'] == 0 ){
    	        $feedContentData['totelSize'] = $leftWordData['data']['count']['0']['num'];
    	        for ($i=0; $i<count($leftWordData['data']['data']); $i++){
    	            if (empty($leftWordData['data']['data'][$i]['data'])){
    	                continue;
    	            }
    	            $feedContentData['msgTableSn'][] = $leftWordData['data']['data'][$i]['table_sn'];
    	            $leftWordArray[] = json_encode_cn($leftWordData['data']['data'][$i]['data']);
    
    	        }
       
	        } else {
	            $leftWordArray = '';
	            $feedContentData['totelSize'] = 0;
	            $feedContentData['msgTableSn'] = array();
	        }
	        
	        $feedContentData['msgData'] = $leftWordArray;
	        
	        $url = Yii::app()->request->baseUrl.'/?r=index/FeedPageNextAjax/leftWord/'.$leftWord.'/leftWordSrpId/'.$leftWordSrpId.'/';
	    }else if ( $leftClassify != 'null' && $leftClassify != '全部'){
	        /*返回分组Id*/
	        if (empty($leftClassiyId)){
	            $leftClassiyId = $feedContent->returnClassifyId($leftClassify, $this->userName);	            
	        }
	        $leftClassifyData = Yii::app()->redis->getTheme($leftClassiyId,$this->userName);
            if (empty($leftClassifyData)){
                $leftClassifyData = array();
            }
	        $feedContentData = $feedContent->feedClassifyContent($this->userName, $leftClassifyData, $startNum, $endNum+1, $type);
	        $url = Yii::app()->request->baseUrl.'/?r=index/FeedPageNextAjax/leftClassify/'.$leftClassify.'/';
	    }else {
	        $feedContentData = $feedContent->totelFeedContent($this->userName, $startNum, $endNum, $type);
	        $url = Yii::app()->request->baseUrl.'/?r=index/FeedPageNextAjax/';
	    }
	    $pageService = new PageService();
	    $pageData = $pageService->getContentPage('feedPageNext', 30, $url, $cur_page, $feedContentData['totelSize'], $limitListData='');
	    $feedContentData['pageHtml'] = $pageData['getHtml'];
	    if (empty($feedContentData['msgData'])){
	        echo 0;exit;
	    }else if (is_array($feedContentData['msgData'])){
	        //充用户刷新更新时间
	        $this->actionRenewFeedTime($feedContentData['msgData']);
	    }
	    $this->renderPartial('feedContent', array('feedContentData'=>$feedContentData['msgData'],
	                         'feedPageHtml'=>$feedContentData['pageHtml'],
	                         'msgTableSn'=>$feedContentData['msgTableSn']));
	    Yii::app()->end();
	}
	
	/**
	 * 刷新缓存最新阅读时间
	 * @name actionRenewFeedTime
	 * @author erbiao.hu
	 */
	protected  function actionRenewFeedTime($msgData)
	{
	    //print_r($msgData);exit;
	    //充用户刷新更新时间，编码必须用json_encode	   
	    $leftWordArrayJson = json_encode($msgData);
	    $msgCache = new RedisCache();
	    $msgCache->renewWordTimeRecord($this->userName, $leftWordArrayJson);
	}
	
	/**
	 * actionLeftGroupMore左树更多控制器
	 * @name actionLeftGroupMore
	 * @author erbiao.hu
	 * @return html 总数
	 */
	public function actionLeftGroupMore()
	{
	    $leftGroupPageNum = isset($_REQUEST['leftGroupPageNum']) ? $_REQUEST['leftGroupPageNum'] : 1;
	    $morePage = isset($_REQUEST['morePage']) ? $_REQUEST['morePage'] : false;
	    $offset = 6;
	    if ($morePage){
	        $startNum = ($leftGroupPageNum - 1 ) * 18 + $offset * 2;
	    }else {
	        $startNum = ($leftGroupPageNum - 1 ) * 18 + $offset;
	    }
	    
	    $leftGroupData = Yii::app()->redis->getGroup($this->userName);
	    
	    //var_dump($leftClassifyData);exit;
	    if (!empty($leftGroupData)){
	        $countData = count($leftGroupData);
	    }else {
	        $countData = 0;
	        $leftGroupData = null;
	    }
	    $leftGroupData = array_slice( $leftGroupData, $startNum, $offset);
	    $this->renderPartial('leftGroupMore', array('leftClassifydata' =>$leftGroupData));
	    Yii::app()->end();
	}
	
	/**
	 * actionLeftGroupPage左树翻页控制器
	 * @name actionLeftGroupPage
	 * @author erbiao.hu
	 * @return html 总数
	 */
	public function actionLeftGroupPage()
	{
	    $leftGroupPageNum = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
	    if ($leftGroupPageNum == 1){
	        $offset = 6;
	    }else {
	        $offset = 18;
	    }
	    
	    
	    $startNum = ($leftGroupPageNum-1) * 18;
	    $classifyUrl = Yii::app()->request->baseUrl.'/?r=index/LeftGroupPage/';
	     
	    $leftGroupData = Yii::app()->redis->getGroup($this->userName);
	     
	    //var_dump($leftClassifyData);exit;
        $leftMen = new PageService();
	    if (!empty($leftGroupData)){
	        $countData = count($leftGroupData);
	    }else {
	        $countData = 0;
	        $leftGroupData = null;
	    }
	    $leftGroupData = array_slice( $leftGroupData, $startNum, $offset);
	    $leftClassifydata = $leftMen->getPage("leftGroupPage", 18, $classifyUrl, $leftGroupPageNum, $countData, $leftGroupData);
	    $this->renderPartial('leftGroupPage',array('leftClassifydata' =>$leftClassifydata['data'] ,
                'leftClassifyPage' =>$leftClassifydata['getHtml']));
	    Yii::app()->end();
	}
	
	/**
	 * actionMiddleThemeYello中间未订阅主题黄条提示
	 * @name actionMiddleThemeYello
	 * @author erbiao.hu
	 */
	public function actionMiddleThemeYello()
	{
	    $themeArray = isset($_REQUEST['themeArray']) ? $_REQUEST['themeArray'] : '';

	    $themeData = Yii::app()->redis->getTheme('',$this->userName);
	    $middleTheme = array();
	    if ( !empty($themeData) ){
	        for ($i=0; $i<count($themeArray); $i++){
	            if (!empty($themeData)){
	                $isHave = false;
	                for ($a=0; $a<count($themeData); $a++){
	                    if ($themeData[$a]->srpId == $themeArray[$i]['srpId']){
	                        $isHave = true;
	                        break;
	                    }
	                }
	                if ($isHave == false){
	                    $middleTheme[] = $themeArray[$i];
	                }
	            }
	        }  
	    }
	    if (empty($middleTheme)){
	        $middleTheme = 0;
	    }
	    echo json_encode($middleTheme); exit;	    
	}
	
	/**
	 * actionFeedImgResize挂件加载控制器
	 * @name actionFeedImgResize
	 * @author erbiao.hu
	 */
	public function actionFeedImgResizeAjax()
	{
	    $maxWidth = isset($_REQUEST['maxWidth']) ? $_REQUEST['maxWidth'] : '';
	    $maxHeight = isset($_REQUEST['maxHeight']) ? $_REQUEST['maxHeight'] : '';
	    $imgUrl = isset($_REQUEST['imgUrl']) ? $_REQUEST['imgUrl'] : '';
	    echo getWidthNewSize($maxWidth, $maxHeight, $imgUrl);
	    exit;
	}
		
	/**
	 * leftMen挂件加载控制器
	 * @name actionLeftMen
	 * @author erbiao.hu
	 */
	public function actionLeftMen()
	{
	    return  $this->widget('application.widget.leftMenWidget',array('userName'=>$this->userName));
	}
	
	/**
	 * MiddleTheme挂件加载控制器 2013-11-21
	 * @name actionMiddleTheme
	 * @author erbiao.hu
	 */
	public function actionMiddleTheme()
	{
	    return  $this->widget('application.widget.MiddleThemeWidget',array('userName'=>$this->userName));
	}
	
	/**
	 * leftGroup挂件加载控制器2013-11-21
	 * @name actionLeftGroup
	 * @author erbiao.hu
	 */
	public function actionLeftGroup()
	{
	    return  $this->widget('application.widget.LeftGroupWidget',array('userName'=>$this->userName));
	}
	
	/**
	 * actionFeedContent挂件加载控制器
	 * @name actionFeedContent
	 * @author erbiao.hu
	 */
	public function actionFeedContent()
	{
	    return  $this->widget('application.widget.feedContentWidget',array('userName'=>$this->userName));
	}
	
	/**
	 * shareTheme挂件加载控制器
	 * @name actionShareTheme
	 * @author erbiao.hu
	 */
	public function actionShareTheme()
	{   
	    $userInfoService = UserInfoService::serviceObj();

	    if (empty($this->userName)){
	        $userNewName = '';
	    }else{
	        $userNewName = $this->userName;
	    }
	    $themeList = $userInfoService->themerecommend($userNewName, 1 );
	    if ( $themeList['code'] == -100 || $themeList['code'] == -2){
	        $themeList['data'] = array();
	    }
	    return  $this->widget('application.widget.shareThemeWidget', array('themeList'=>$themeList['data']));
	}
	
	/**
	 * shareThemeIframe挂件加载控制器
	 * @name actionShareThemeIframe
	 * @author erbiao.hu
	 * @forSRP前端iframe调用
	 */
	public function actionShareThemeIframe()
	{   
	    
	    $srpName = isset($_REQUEST['srpname']) ? urldecode($_REQUEST['srpname']) : '';
	    $userInfoService = new UserInfoService();
	    if (empty($this->userName)){
	        $userNewName = '';
	    }else{
	        $userNewName = $this->userName;
	    }
	    $themeList = $userInfoService->themerecommend($userNewName, 1);
	    if ( $themeList['code'] == -100 || $themeList['code'] == -2){
	        $themeList['data'] = array();
	    }
	    $html = $this->widget('application.widget.ShareThemeWidgetIfram', array('themeList'=>$themeList['data'], 'srpName'=>$srpName));
	    return  $html;
	}
	
	/**
	 * shareTheme挂件加载控制器
	 * @name actionUserGrowping
	 * @author erbiao.hu
	 */
	public function actionUserGrowping()
	{
	    return  $this->widget('application.widget.UserGrowpingWidget',array('userName'=>$this->userName));
	}
	
	/**
	 * themeWidget挂件加载控制器(right--右侧订阅部分)
	 * @name actionthemeWidget
	 * @author erbiao.hu
	 */
	public function actionthemeWidget()
	{	    
	    return  $this->widget('application.widget.themeWidget',array('data'=>$this->userName));
	}
	
	/**
	 * uploadImg上传图片
	 * @name actionUploadImg
	 * @author erbiao.hu
	 * @return json data
	 */
	public function actionUploadImg()
	{
	    if(isset($_FILES['Filedata'])){
	        //上传图片
	        $upload = new UploadFile();// 实例化上传类
	        $imgInfo = new ChangeUserInfoPo();
	        $file = $_FILES['Filedata'];
	        $data =  $upload->getUploadImgInfo($file, $imgInfo->imgInfo );
	        echo json_encode($data);exit;
	    }else {
	        echo 0;exit; //图片上传失败
	    }
	}
	
	/**
	 * CatchLink 抓取链接
	 * @name actionCatchLink
	 * @author erbiao.hu
	 * @return json data
	 */
	public function actionCatchLink()
	{
	   Yii::import('application.service.newscapture.*');
	   $catchUrl = isset($_REQUEST['url']) ? $_REQUEST['url'] : '';
	   $catchLink = new NewsCaptureMgr();
	   $catchDataArray = $catchLink->getNewsInfo($catchUrl);
	   $catchData['url'] = $catchUrl;
	   if ( isset($catchDataArray['title']) ){
	       $catchData['title'] = ( $catchDataArray['title'] != false ) ? $catchDataArray['title'] : '';	       
	   }else{
	       $catchData['title'] = '';
	   }
	   
	   if ( isset($catchDataArray['photo']) ){
	       $catchData['img'] = ( $catchDataArray['photo'] != false ) ? $catchDataArray['photo'] : '';
	   }else{
	       $catchData['img'] = '';
	   }
	   if ( isset($catchDataArray['content']) ){
	       $catchData['content'] = ( $catchDataArray['content'] != false ) ? $catchDataArray['content'] : '';
	   }else{
	       $catchData['content'] = '';
	   }
	   echo json_encode($catchData);exit;	   
	}
	
	/**
	 * actionTipsThemeCheck 检测tips主题是否存在
	 * @name TipsThemeCheck
	 * @author erbiao.hu
	 * @return -2 不存在
	 */
	public function actionTipsThemeCheck()
	{
	    $tipsTheme = isset($_REQUEST['tipsTheme']) ? $_REQUEST['tipsTheme'] : '';
	    $keyWordModel = new KeyWordModel(); 
	    $keyWordService = new KeyWordService(); 
	    //检测主题是否存在
	    $keyWordData = $keyWordModel->keyWordInfo($tipsTheme);
	    if($keyWordData['code']== -4 || empty($keyWordData['data'])){
	        $isTipHas = $keyWordService->getWordInfoFromHems($tipsTheme);
	        if ( $isTipHas['status'] != 1 ){
	            $isTipHastwo = $keyWordService->getWordInfoFromHems($tipsTheme);
	            if ( $isTipHastwo['status'] != 1 ){
	                echo '-2';exit;
	            }         
	        }else {
	            echo '1';exit;
	        }	        
	    } 
	}
	
	/**
	 * sendThemeCon发布主题内容
	 * @name sendThemeCon
	 * @author erbiao.hu
	 * @return int -1未选择主题,0未提交消息,1发布成功,-2发布失败
	 */
	public function actionSendThemeCon()
	{
	    $themeArray = isset($_REQUEST['themeArray']) ? $_REQUEST['themeArray'] : '';
	    $sayTheme = isset($_REQUEST['sayTheme']) ? $_REQUEST['sayTheme'] : '';
	    $imgArray = isset($_REQUEST['imgArray']) ? $_REQUEST['imgArray'] : '';
	    $catchLinks = isset($_REQUEST['catchLinks']) ? $_REQUEST['catchLinks'] : '';
	    $userName = $this->userName;
	    //过滤用户说情况
        $sayTheme = str_replace('"', '', $sayTheme) ;
	    $title = '';
	    $content = '';
	    $catchUrl = '';
	    if (empty($themeArray)){
	       echo '-1';exit;//未选择主题
	    }else if (!empty($imgArray)) {
	    }else if ( isset($catchLinks['url']) && ($catchLinks['url'] != 'null')) {
            $title = $catchLinks['title'];
            $content = str_replace('"', '', $catchLinks['content']) ;
            $catchUrl = $catchLinks['url'];
            $imgArray = array(array('big'=>$catchLinks['img'], 'small'=>$catchLinks['img'] ,'desc'=>'' ));
	    }else if (empty($sayTheme)) {
             echo '0';exit;//未提交消息，发布消息为空
	    }
	    $data = $imgArray;//去掉
	    $redis = RedisCache::redisCacheObj()->getRedis();
	    $keyWordString = '';
	    for($i=0 ;$i<count($themeArray) ;$i++){
	        $keyWordArray[] = array('name'=>$themeArray[$i]['srpName'], 
	                    'srpid'=>$themeArray[$i]['srpId'], 
	                    'kid'=>'');
	        $keyWordString .= $themeArray[$i]['srpName'].',';

	    }
	    $keyWordString = trim($keyWordString, ',');
	    //组合数据充搜悦队列
        $srcsys = 'sc';
        $type = '009';
        $opt = '0';
        $msgid = '';
        $pubtime = time();
        $sayTheme = wsubstr($sayTheme, 10000);
	    $sy_ugc = array('username'=>$userName ,'keyword'=>$keyWordArray ,
	            'srcsys'=>$srcsys, 'type'=>$type ,'opt'=>$opt ,'msgid'=>$msgid ,
	            'title'=>$title ,'content'=>$sayTheme , 'capture'=>$content ,
	            'pic'=>$imgArray ,'pubtime'=>$pubtime,'url'=>$catchUrl);
	    
	    $sy_ugc = json_encode_cn($sy_ugc);
	    //验证两次添加信息是否相同
        $preShareTheme = $sy_ugc;
        if( $preShareTheme == $redis->get('preShareTheme')){
	        echo 1;
	        exit;//已经发布
        }
        $redis->set('preShareTheme',$sy_ugc);
	     
	    $data =   $redis->lPush('sy_ugc', $sy_ugc);
	    
	    if ($data){
	        /*发布行为加积分*/
	        $this->actionAddShareThemeScore( '6', $userName, $themeArray);
	        //echo $sy_ugc;
	        echo 1;
	        exit;//发布成功
	    }else {
	        echo '-2';exit; //发布失败
	    }
	}

	/**
	 * AddShareThemeScore 发布行为加积分
     *
     * 2013.12.15 张建华修改加操作日志，加积分统计日志
     *
	 * @name AddShareThemeScore
	 * @param $pointType 积分事件类型( 6 主题分享)
	 * @param $userName 用户名
	 * @param $keyWordString 词条串
	 * @author erbiao.hu
	 * @return json data
	 */
	protected function actionAddShareThemeScore($pointType, $userName,$themeArray)
	{
        Yii::import('application.uscframework.bll.expert.*');
        Yii::import('application.uscframework.dal.expert.*');
/*        Yii::import('application.uscframework.com.entities.expert.*');
        Yii::import('application.uscframework.com.entities.*');
        Yii::import('application.uscframework.dal.mysql.expert.*');
        Yii::import('application.uscframework.dal.redis.expert.*');*/
        $words = array();
        $srpids = array();
        foreach($themeArray as $theme) {
            array_push($words, $theme['srpName']);
            array_push($srpids, $theme['srpId']);
        }
        $keyWordString = implode(',',$words);
        $srpidString = implode(',',$srpids);
	    /*获取用户类型id*/
        $userRoles = $this->getUserRole($userName);
        $userType = 29;
        $expertRole = '';
        if ($userRoles['status'] == 1 ){
            $userRole = $userRoles['roles'][0];
            if(isset($userRoles['data']['31'])) {
                $expertRole = $userRoles['data']['31'];
            }
        }

        $addScore = new PointService();
        $addPointR = $addScore ->addPoint($pointType, $userName, $userType, $keyWordString);
        if ($addPointR['status'] == 0 ){
            /*记录错误日志*/
            $message = "积分事件类型".$pointType." 用户名".$userName." 用户类型id".$userType."词条串为".$keyWordString;
            error_log($message);
        } else {
            if(!empty($expertRole)) {
                ExpertScoreBLL::InsertExpertAwordInc('31',$userName,$srpids[0],$addPointR,Code::WEB_POST,'009');

            }
        }
        if(empty($expertRole)) {
            $expertRole=0;
        } else {
            $expertRole = 1;
        }
        $qservice = new QuestionJoinRedisService();
        $qservice->AddLog($keyWordString, $srpidString, $userName,$expertRole,'101','主题动态');
    }

    private function getUserRole($userName) {
        $rstCenterModel = new CenterSettingModel();
        $userInfo = $rstCenterModel->userTotalInfo($userName);
        if($userInfo['result'] != Code::SUCC) {
            return array('data'=>array(), 'status'=>0);
        } else {
            $userInfo = $userInfo['data'];

            $role = explode(',', $userInfo['user_roleID']);
            $roles = array(4,32,31,29);

            $userRoles = array();
            $userRolesCopy = array();
            foreach($roles as $r) {
                if(in_array($r, $role)) {
                   $userRoles[$r] = $r;
                    array_push($userRolesCopy, $r);
                }
            }
            return array('data'=>$userRoles,'roles'=>$userRolesCopy, 'status'=>1);
        }
    }
	
	/**
	 * leftMenActiveAjax 左侧菜单更新状态提示
	 * @name leftMenActiveAjax
	 * @author erbiao.hu
	 * @return json data
	 */
	public function actionLeftMenActiveAjax()
	{
	    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '';
	    $leftClassifyService = new SubscribeService();
	    $redis = RedisCache::redisCacheObj();
        $classifyReq = array(
                'userName'=>$this->userName,
                //'wordClsName'=>'超级分享',//以后删掉
                //'userName'=>'zs123',
                'pageNum'=>1,
                'itemsPerPage'=>1,
                'isSelectAll'=>true
        );	    
        $wordReq = array(
	            'userName'=>$this->userName,
	            //'userName'=>'zs123',
	            'wordName'=>'',
	            'pageNum'=>1,
	            'itemsPerPage'=>1,
	            'isSelectAll'=>true //查询全部用户订阅词
	    );
	    if ($type == 'classify'){
	        $leftClassifyName = isset($_REQUEST['leftClassifyName']) ? $_REQUEST['leftClassifyName'] : '';
	        //$leftClassifyName = array('超级分享');
	        $leftClassifyNameArray = array();
	        for ($i=0; $i<count($leftClassifyName); $i++){
	            if ( empty($leftClassifyName[$i])){
	                continue;
	            }
	            if ($leftClassifyName[$i] == '全部'){
	                $leftClassifyData = $leftClassifyService->getWordsByName($wordReq);
	                //var_dump($leftClassifyData['data']);exit;	
	            }else {
	                $classifyReq['wordClsName'] = $leftClassifyName[$i];
	                $leftClassifyData = $leftClassifyService->getWordsByClsName($classifyReq);
	                //print_r($leftClassifyData['data']);exit;
	            }
	            //循环处理
	            for ( $a=0; $a<count($leftClassifyData['data']); $a++ ){
	                $userNewWordTime = $redis->getUserNewWordTime($leftClassifyData['data'][$a]->srpId);
	                $userLatestMsgTime = $redis->getUserLatestMsgTime($this->userName);
	                if (!empty($userNewWordTime)){
	                    $userLatestMsgArr = json_decode($userLatestMsgTime);
	                    for ($b=0; $b<count($userLatestMsgArr); $b++){
	                        $userLatestMsgArr[$b]->time;
	                        if (
	                                $leftClassifyData['data'][$a]->srpId ==$userLatestMsgArr[$b]->srpId
	                                &&
	                                $userNewWordTime > $userLatestMsgArr[$b]->time
	                        )
	                        {
	                            $leftClassifyNameArray[] = $leftClassifyName[$i];
	                            break;
	                        }
	                    }
	                }
	            }
	        }
            //$leftClassifyNameArray = array('全部');
            echo json_encode_cn($leftClassifyNameArray);
            exit;
	        
	    }elseif ($type == 'theme'){
	        $leftMen = isset($_REQUEST['leftMen']) ? $_REQUEST['leftMen'] : '';
	        //$leftMen = array('真与假');
	        $leftMenArray = array();
	        for ($i=0; $i<count($leftMen); $i++){
	            if ( empty($leftMen[$i])){
	                continue;
	            }
	            $wordReq['wordName'] = $leftMen[$i];
	            $wordReq['isSelectAll'] = false;
	            $leftMenData = $leftClassifyService->getWordsByName($wordReq);
	            /*判断srpid是否存在*/
	           if ( isset($leftMenData['data']['0']->srpId) ) {
	               $userNewWordTime = $redis->getUserNewWordTime($leftMenData['data']['0']->srpId);
	           } else {
	               $userNewWordTime = '';
	           }
	            $userLatestMsgTime = $redis->getUserLatestMsgTime($this->userName);
	            if (!empty($userNewWordTime)){
	                $userLatestMsgArr = json_decode($userLatestMsgTime);
	                for ($b=0; $b<count($userLatestMsgArr); $b++){
	                    $userLatestMsgArr[$b]->time;
	                    if (
	                            $leftMenData['data']['0']->srpId ==$userLatestMsgArr[$b]->srpId
	                            &&
	                            $userNewWordTime > $userLatestMsgArr[$b]->time
	                    )
	                    {
	                        //返回有更新的词条
	                        $leftMenArray[] = $leftMen[$i];
	                    }
	                }
	            }
	        }
	        //$leftMenArray = array('真与假','人与性','逗');
	        echo json_encode_cn($leftMenArray);
	        exit;	        
	    }
	}
	
   /**
	* actionLeftGroupRenew 左侧分组更新状态提示
	* @name actionLeftGroupRenew
	* @author erbiao.hu
	* @return json data
	*/
	public function actionLeftGroupRenew()
	{
	    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '';
	    $feedContent = new FeedContentService();
	    $redis = RedisCache::redisCacheObj();
	    
	    if ($type == 'classify'){
	        $leftClassifyName = isset($_REQUEST['leftClassifyName']) ? $_REQUEST['leftClassifyName'] : '';
	        $leftClassifyIdArray = isset($_REQUEST['leftClassifyIdArray']) ? $_REQUEST['leftClassifyIdArray'] : '';
	        //$leftClassifyName = array('超级分享');
	        $leftClassifyNameArray = array();
	        for ($i=0; $i<count($leftClassifyName); $i++){
	            if ( empty($leftClassifyName[$i])){
	                continue;
	            }
	            if ($leftClassifyName[$i] == '全部'){
	                $leftClassifyData = Yii::app()->redis->getTheme('',$this->userName);
	            }else {
	                $leftClassify = $leftClassifyName[$i];
	                $leftClassiyId = $leftClassifyIdArray[$i];
	                /*返回分组Id*/
	                if (empty($leftClassiyId)){
	                    $leftClassiyId = $feedContent->returnClassifyId($leftClassify, $this->userName);
	                }
	                $leftClassifyData = Yii::app()->redis->getTheme($leftClassiyId,$this->userName);
	            }
	            //循环处理
	            for ( $a=0; $a<count($leftClassifyData); $a++ ){
	                $userNewWordTime = $redis->getUserNewWordTime($leftClassifyData[$a]->srpId);
	                $userLatestMsgTime = $redis->getUserLatestMsgTime($this->userName);
	                	                        
	                if (!empty($userNewWordTime)){
	                    $userLatestMsgArr = json_decode($userLatestMsgTime);
	                    for ($b=0; $b<count($userLatestMsgArr); $b++){
	                        $userLatestMsgArr[$b]->time;
	                        if (
	                                $leftClassifyData[$a]->srpId ==$userLatestMsgArr[$b]->srpId
	                                &&
	                                $userNewWordTime > $userLatestMsgArr[$b]->time
	                        )
	                        {
	                            $leftClassifyNameArray[] = $leftClassifyName[$i];
	                            break 2;
	                        }
	                    }
	                }
	            }
	        }
	        //$leftClassifyNameArray = array('全部');
	        echo json_encode_cn($leftClassifyNameArray);
	        exit;
	         
	    } 
	}
	
	/**
	 * actionUserMsgIsAlert 设置头部用户访问消息弹窗消息数缓存
	 * @name actionUserMsgIsAlert
	 * @param $userMsgNum 消息数
	 * @author erbiao.hu
	 * @return 
	 */
	public function actionUserMsgIsAlert()
	{
	    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : 'write' ;
    	$msgCache = new RedisCache();
    	$userName = $this->userName;
    	$userMsgNum = $this->userMsgNum;
    	if ($type == 'write'){
    	    $msgCache->setUserMsgIsAlert($userName, $userMsgNum);    	    
    	}else if ($type == 'read'){
    	    $cacheMsgNum = $msgCache->getUserMsgIsAlert($userName);
    	    $resule = false;
    	    if ($cacheMsgNum){
    	        if ($cacheMsgNum < $userMsgNum){
    	            $resule = true;
    	        }else {
    	            $resule = false;
    	        }
    	    }else {
    	        $resule = true;
    	    }
    	    echo $resule;
    	    exit;
    	}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}