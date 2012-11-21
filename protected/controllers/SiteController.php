<?php

class SiteController extends Controller
{
	public $layout = '//layouts/column2';
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layo uts/main.php'
		$this->render('index');
	}
	
	public function actionUpdate(){
		$this->render('partials/update');
	}

	public function actionManualUpdate(){
		$this->render('partials/manualUpdate');
	}
	
	public function actionTrace() {
		Yii::trace('的数据卡德加萨克', 'videoSync.xsjakdsa');
	}
	
	public function actionSet() {
		$criteria = new EMongoCriteria();
		$criteria->kid = '33682';
		$criteria->typeid = '60';
		$model = HemsBasic::model()->find($criteria);
		HemsBasic::model()->deleteAll($criteria);
		$model->igid = '我是';
		$model->save();
		
		var_dump($model);die;
	}
	
	public function actionTest2() {
		$model = VideoXmlFactory::getInstance()->createClass('television','sina');
//		$data = $model->getData('e4da3b7fbbce2345d7772b0674a318d5');
		//CVarDumper::dump($data['data']['display']['serialinfo']['detail'], 2, true);die;
//		$data = ConvertArrayToXml::toXML2($data['data']['display']['serialinfo']['detail']);
//		header('content-type:text/xml');
//		echo $data;die;
		$xml = $model->returnXml('e4da3b7fbbce2345d7772b0674a318d5');
		header('content-type:text/xml');
		echo $xml;die;
//		$model = VideoKeywords::model()->findByAttributes(array('video_type'=>'firm'));
//		$model = HemsBasic::model()->findByPk(new MongoID('50a3d947b7a535ac05000000'));
//		$criteria = new EMongoCriteria();
//		$criteria->kid = '1';
		$model = HemsBasic::model()->findByAttributes(array(
			'kid' => '1',
		));
		//$model = HemsBasic::model()->find($criteria);
		var_dump($model);die;
	}
	
	public function actionTest() {
//		$model = SinaTelevision::model()->findByPk(new MongoID('50a6e7f874a3eee016000027'));
//		var_dump($model->content);die;
//		$model = new VideoSource();
//		$model->source = 'sina';
//		$model->name = '新浪';
//		$model->save();die;
//		$model = new VideoSearch();
//		$model->soruce = 'sina';
//		$model->type = 'theanimation';
//		$model->keyword = '家有浆糊';
//		$r = $model->run();
//		var_dump($r);die;
		$video = new VideoSync();
		$video->sync();
	}
	
	public function actionCeshi(){
		$model = new SinaFirm();
		$model->content = '<url><loc>http://video.sina.com.cn/m/hbqb_61088501.html</loc><lastmod>2011-05-25</lastmod><changefreq/><priority>1.0</priority><data><display><workName>护宝奇兵</workName><version/><seasonId/><director>皮特·温瑟</director><editer/><starring>诺亚-怀勒</starring><region>美国</region><showTime>2006-00-00</showTime><length>6167</length><type>动作$$战争</type><poster>http://cache.mars.sina.com.cn/nd/movievideo/thumb/50/150_weibo.jpg</poster><introduction>　　1944年九月，英国试图在圣诞节前结束二战。于是最高指挥官一达了一项史无前例的特殊任务——这就是在二占勤勉上规模最大的一次空降突袭行动。三万五千名盟军士兵将要被空降到德国已占领的荷兰敌后。在这次空降任务中，代号“火柴盒”的部队有着自己的任务。当“火柴盒”被击落在着陆区域以外时，他们发现自己已经与盟军的突袭部队分离，而他们的对手个个都是枪法精准、冷血无情、杀人不眨眼的刽子手，他们的成功机会似乎已经变的渺茫。他们能否在德国军和风暴突击小分队的鼻子底下顺利的执行这项任务？能否从战火中幸存下来？恶战不可避免。</introduction><playLink>http://video.sina.com.cn/m/hbqb_61088501.html</playLink><webLogo>http://simg1.sinajs.cn/video/images/common/sinavideo.gif</webLogo><horizontalPoster>16:9</horizontalPoster><swfUrl>http://video.sina.com.cn/m/hbqb_61088501.html</swfUrl><isMadeByOwn>0</isMadeByOwn><language></language><sizeOfPlayer/><videoAspectRatio>16:9</videoAspectRatio><resourceTime>2008-02-26 08:10:50</resourceTime><accumulatedPlayedNumber>1467</accumulatedPlayedNumber><oneDayPlayedNumber/><accumulatedComments/><oneDayComments/><accumulatedTopOrStep/><oneDayTopOrStep/><accumulatedReferenceNumber/><oneDayReferenceNumber/><accumulatedCollectionNumber/><oneDayCollectionNumber/><officialTrailer/><otherName/><englishName/><label>护宝奇兵$$凯勒·罗登</label><isExclusive>0</isExclusive><isOriginal>1</isOriginal><is3D>0</is3D><oneSentenceDescription></oneSentenceDescription><definition>高清</definition><rating>8.0</rating><imdb/><onlinetime/><classicLines/><is_delete>0</is_delete><flag_dead>0</flag_dead></display></data></url>';
		$model->save();
	}
	
	public function actionCeshi1(){
		$model = new SinaFirm();
		$a = $model->findByPk(15);
		var_dump($a->content);
	}
	public function actionCeshi2(){
		$r = '1';
		$md5 = '7e1d6cb14b86ec961273df6343988291';
		$typeId = '2';
		$ar = new HemsDataOperate;
		 $ar->setDefault($r,$md5,$typeId);
		//var_dump($a);
	}
	
}