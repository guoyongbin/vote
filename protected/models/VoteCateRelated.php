<?php

class VoteCateRelated extends CMonoActiveRecord {
	
	public $vote_id;
	public $category_id;
	
	public function getCollectionName() {
		return 'vote_cate_related';
	}
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function rules() {
		return array(
	
				array('vote_id', 'length', 'max'=>64),
				array('category_id', 'length', 'max'=>64),
				array('vote_id, category_id', 'safe'),
		);
	}
	
	public function attributeLabels() {
		return array(
				'vote_id' => '投票id',
				'category_id' => '分类id',
		);
	}
}