<?php
class Vote extends CMonoActiveRecord{
	public $title;
	public $picpath;
	public $vote_type;
	public $creater_id;
	public $creater_nickname;
	public $creater_email;
	public $keyword;
	public $create_time;
	public $vote_end_time;
	public $audit_type;
	public $audit_name;
	public $audit_date;
	public $audit_state;
	public $md5;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return VideoKeywords the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated collection name
	 */
	public function getCollectionName()
	{
		return 'vote';
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('title,vote_end_time', 'required'),
			array('title','length','min'=>1,'max'=>14,'tooShort'=>'限14字 不得为空','tooLong'=>'限14字 不得为空'),
			
			array('picpath', 'authenticate'),
				
			array('creater_email','length','min'=>1,'max'=>100,'tooShort'=>'限100个字符','tooLong'=>'限100个字符'),
			array('creater_email','email','message'=>'邮箱输入有误.'),
				
			array('md5,picpath','length','max'=>125),
			array('creater_id,audit_type,audit_state','numerical'),
			array('keyword','length','max'=>64),
			array('audit_name','length','max'=>255),
				
			array('md5, audit_state, audit_date, audit_name, audit_type, vote_end_time, create_time, keyword, creater_email	, creater_nickname, creater_id, vote_type, picpath, title', 'safe'),
		);
	}
	
	public function authenticate($attribute,$params) {
		if(!$this->hasErrors())
		{
			$postfix = strstr($this->picpath, '.');
			$arr = array( '.jpg','.jpeg','.gif','.png' );
			if( !in_array($postfix, $arr) ) {
				$this->addError('picpath','仅支持.jpg /.jpeg /.gif /.png格式');
			} 
			
			$content = file_get_contents(dirname(__FILE__)."/../../upload/".substr($this->picpath, 8));
			$strlength = strlen($content);
			if($strlength > 2000000) {
				$this->addError('picpath','图片大小不超过2M');
			}
		}
	}
	
	/**
	 * (non-PHPdoc)
	 * @see CModel::attributeLabels()
	 * 
	 */
	public function attributeLabels() {
		return array(
			'title' => '标题',
			'picpath' => '图片地址',
			'vote_type' => '投票类型',
			'creater_id' => '发起人id',
			'creater_nickname' => '发起人昵称',
			'creater_email' => '发起人email',
			'keyword' => '关键词',
			'create_time' => '投票开始时间',
			'vote_end_time' => '投票结束时间',
			'audit_type' => '审核类型',
			'audit_name' => '审核人员名字',
			'audit_date' => '审核日期',
			'audit_state' => '审核状态',
			'md5' => 'md5',
		);
	}
	
}