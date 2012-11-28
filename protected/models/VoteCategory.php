<?php

class VoteCate1gory extends CMonoActiveRecord {
	
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
				array('category_name', 'length', 'max'=>50),
				array('parent_id', 'length', 'max'=>50),
				array('category_name, parent_id', 'safe'),
		);
	}
	
	public function attributeLabels() {
		return array(
				'category_name' => 'categoryName',
				'parent_id' => 'parentId',
		);
	}
}