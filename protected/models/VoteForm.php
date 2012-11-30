<?php

class VoteForm extends CFormModel {
	public $title;
	public $picpath;
	public $vote_type;
	public $vote_category;
	public $creater_id;
	public $creater_nickname;
	public $creater_email;
	public $keyword;
	public $vote_end_time;
// 	public $create_time;
// 	public $vote_start_time;
// 	public $vote_count;
	
	public function rules() {
		return array(
			array('title,vote_type,vote_category,creater_id,keyword,vote_end_time', 'required'),
			array('creater_email', 'email'),
			array('title,picpath,vote_type,vote_category,creater_id,creater_nickname,creater_email,keyword,vote_end_time', 'safe'),
		);
	}
	
	public function attributeLabels() {
		return array(
				'title'=>'投票标题',
				'picpath'=>'图片',
				'vote_type'=>'投票类型',
				'creater_id'=>'创建者ID',
				'creater_nickname'=>'创建者昵称',
				'creater_email'=>'创建者邮箱',
				'keyword'=>'关键词',
				'$vote_end_time'=>'截止时间',
		);
	}
	
}