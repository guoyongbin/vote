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
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('md5, title,picpath','length,creater_email','max'=>125),
			array('vote_type, creater_id, creater_nickname, audit_type, audit_state','type','int'),
			array('keyword','length','max'=>64),
			array('audit_name','length','max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('md5, audit_state, audit_date, audit_name, audit_type, vote_end_time, create_time, keyword, creater_email	, creater_nickname, creater_id, vote_type, picpath, title', 'safe'),
		);
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