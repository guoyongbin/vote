<?php

class VoteController extends Controller {
	
	public function actions()
	{
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
						'class'=>'CCaptchaAction',
						'backColor'=>0xFFFFFF,
						'foreColor'=>0x2040A0,  //字体颜色
						'offset'=>2,            //字符间偏移量
						'padding'=>2,         //文本周围的间距. 默认是 2
						'height'=>28,         //验证码图片的高度. 默认是 50
						'width'=>85,          //验证码图片宽度. 默认是 120
						'minLength'=>4,     //设置最短为4位
						'maxLength'=>4,       //设置最长为4位,生成的code在4直接rand了
				),
				// page action renders "static" pages stored under 'protectediews/site/pages'
				// They can be accessed via: index.php?r=site/page&view=FileName
				'page'=>array(
						'class'=>'CViewAction',
				),
		);
	}
	
	public function actionTime() {
		
		$this->render('time',array());
		
	}
	
	public function actionShowCreateVote() {
		
		$this->showCreateVote();
	}
	
	public function showCreateVote() {
		$this->render('createVote', array(
				'vote' => new Vote(),
				'voteItem' => new VoteItem(),
				'voteCateRelated' => new VoteCateRelated(),
				'voteCategory' => new VoteCategory(),
		));
	}
	
	public function actionCreateVote() {
		
		$vote = new Vote();
		if(isset($_POST['Vote'])) {
			$vote->attributes = $_POST['Vote'];
			$file = CUploadedFile::getInstance($vote, 'picpath');
			
			if($file->getSize() < 1024*1024*2) {
				$randName=date('Ymdhis').rand(100,999).'.'.$file->getExtensionName();
				$result = $file->saveAs(Yii::app()->basePath.'/../upload/'.$randName);
				$vote->picpath = '/upload/'.$randName;
				$vote->create_time = date('Y-m-d H:i:s',time());
				$result = $vote->save();
				if($result) {
					$voteItemFrom = new VoteItem();
					if(isset($_POST['VoteItem'])) {
						$voteItemFrom->attributes = $_POST['VoteItem'];
						if($voteItemFrom->attributes['item_title'] != '') {
							foreach ($voteItemFrom->attributes['item_title'] as $key=>$itemTitle) {
								$voteItem = new VoteItem();
								$voteItem->vote_id = $vote->_id;
								$voteItem->item_title = $itemTitle;
								$voteItem->item_vote_count = '0';
								$voteItem->displayorder = 1;
								$result = $voteItem->save();
							}
						}
					}
					if($result) {
						$voteCategoryFrom = new VoteCategory();
						if(isset($_POST['VoteCategory'])) {
							
							$voteCategoryFrom->attributes = $_POST['VoteCategory'];
							if($voteCategoryFrom->attributes['category_name'] != '') {
								foreach ($voteCategoryFrom->attributes['category_name'] as $key=>$categoryName) {
									$voteCategory = new VoteCategory();
									$voteCategory->category_name = $categoryName;
									$voteCategory->parent_id = '0';
									$result = $voteCategory->save();
									if($result) {
										$voteCateRelated = new VoteCateRelated();
										$voteCateRelated->vote_id = $vote->_id;
										$criteria = new EMongoCriteria();
										$criteria->addCond('category_name', '==', $categoryName);
										$vc = $voteCategory->find($criteria);
										$voteCateRelated->category_id = $vc->_id;
										$result = $voteCateRelated->save();
										if(!$result) {
											$this->render('createVote', array(
												'vote' => $vote,
												'voteItem' => $voteItem(),
												'voteCategory' => $voteCategory(),
												'voteCateRelated' => $voteCateRelated(),
											));
										}
									} else {
										$this->render('createVote', array(
												'vote' => $vote,
												'voteItem' => $voteItem(),
												'voteCategory' => $voteCategory(),
												'voteCateRelated' => new VoteCateRelated(),
										));
									}
								}
							}
						}
					} else {
						
						$this->render('createVote', array(
							'vote' => $vote,
							'voteItem' => $voteItem(),
							'voteCategory' => new VoteCategory(),
							'voteCateRelated' => new VoteCateRelated(),
					));
					}
				} else {
					$this->render('createVote', array(
							'vote' => $vote,
							'voteItem' => new VoteItem(),
							'voteCategory' => new VoteCategory(),
							'voteCateRelated' => new VoteCateRelated(),
					));
				}
				
			} 
		}
	}
	
}