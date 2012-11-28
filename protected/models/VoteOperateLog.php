<?php
class VoteOperateLog extends CMonoActiveRecord{
	public $opt_type;
	public $opt_tim;
	public $opt_name;
	public $opt_content;
	public $vote_id;
	
	public static function modle($className = __CLASS__){
		return parent::model($className);
		
	}
	
	public function getCollectionName(){
		// TODO Auto-generated method stub
		return 'survet_operate_log';
	}
	
	public function rules(){
		return array(
				array('opt_type, opt_time,opt_name, vote_id','safe')，
		);
	}
	
	public function attributeLabels(){
	
		return array(
				'opt_type'=>'类型',
				'opt_time'=>'选择时间',
				'opt_name'=>'选择名称',
				'opt_content'=>'选择内容',
				'vote_id'=>'投票id',
	
		);
	}
	
	
}

?>