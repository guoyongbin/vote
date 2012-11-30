<?php
class VoteItem extends CMonoActiveRecord{
	public $vote_id;
	public $item_title;
	public $item_vote_count;
	public $displayorder;
	
	public static  function model($className = __CLASS__){
		return parent::model($className);
		
	}
	
	public function getCollectionName(){
		return 'vote_item';
	}
	
	public function rules(){
		return array(
					array('item_title','length','min'=>1,'max'=>25,'tooShort'=>'每项限25字','tooLong'=>'每项限25字'),
					array('vote_id,item_title,item_vote_count,displayorder','safe'),
				);
	}
	
	public function attritbuteLabels(){
		return array(
				'vote_id'=>'投票id',
				'item_title'=>'投票答案项',
				'item_vote_count'=>'投票数',
				'displayorder'=>'显示顺序',
				);
		
	}
}

?>