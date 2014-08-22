<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller1 extends CController
{
    /**
     * 用户名
     * @var string
     */
    public $userName='';
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//usclayouts/column2';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	/**
	 * 导航菜单设定，继承控制器方法需要显示对应栏目导航，需要用$this->navType='';方式在对应方法中赋值
	 * 赋值要求如下：index--我的订阅，active--我的动态，create--我的制作，correct--我的纠错，setting--设置
	 */
	public $navType = '';
	public $userMsgList;
	public $userMsgNum;

    public $userdetialInfo;
    #热词搜索
	public $hotSecrch;
    public function __construct($id,$module=null)
    {
        parent::__construct($id, $module);
        echo "ssss";exit;
        $userInfo = new UserService();
        $userInfoTotal = $userInfo->getUserInfoTotal();

        if ( $userInfoTotal == false ){
            //$this->userName = 'huangtest';
            $this->userName = '';
            $this->userMsgNum = '';
            $this->userMsgList = array();
            $this->userdetialInfo='';
        }else{
            $userMsg = $userInfo->getUserMsgCount($userInfoTotal['user_id']);
            $this->userName = $userInfoTotal['user_name'];
            $this->userMsgNum = $userMsg['count'];
            $this->userMsgList = $userMsg['info'];
            $this->userdetialInfo=$userInfoTotal;

            $ps = new PointService();
            $ps->addPoint(3, $this->userName, 29);
        }
    }
}