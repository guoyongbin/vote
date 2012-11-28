<?php

class VoteCategory extends CMonoActiveRecord {
	
	public $category_name;
	public $parent_id;
	
	public function getCollectionName() {
		return 'vote_category';
	}

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function rules() {
	
		return array(
				array('category_name', 'length', 'max'=>255),
				array('parent_id', 'length', 'max'=>11),
				array('category_name, parent_id', 'safe'),
		);
	}
	
	public function attributeLabels() {
		return array(
				'category_name' => '分类名称',
				'parent_id' => '父id',
		);
	}
}