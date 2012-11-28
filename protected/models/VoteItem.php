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
					array('vote_id,item_title,item_vote_count,displayorder','safe'),
				
				);
		
	}
	
	public function attritbuteLabels(){
		return array(
				'vote_id'=>'投票id',
				'item_title'=>'标题',
				'item_vote_count'=>'投票数',
				'displayorder'=>'显示顺序',
				);
		
	}
}

?>