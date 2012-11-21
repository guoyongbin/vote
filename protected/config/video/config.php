<?php
return array(
	# 新浪
	'sina' => array(
		'id' => 'c4ca4238a0b923820dcc509a6f75849b',
		# 电影
		'film' => array(
			'all_url' => 'http://sitemap.video.sina.com.cn/baidu_movie_resources.xml',
			'increment_url' => 'http://sitemap.video.sina.com.cn/baidu_movie_resources_increment.xml',
			'attributes' => array(
				'keyword' => 'data.display.workName',
				'video_date'=> 'data.display.showTime',
			)
		),
		#电视剧
		'television' => array(
			'all_url' => 'http://sitemap.video.sina.com.cn/baidu_teleplay_resources.xml',
			'increment_url' => 'http://sitemap.video.sina.com.cn/baidu_teleplay_resources_increment.xml',
			'attributes' => array(
				'keyword' => 'data.display.serialinfo.workName',
				'video_date'=> 'data.display.serialinfo.showTime',
			)
		),
		#动漫
		'theanimation' => array(
			'all_url' => 'http://sitemap.video.sina.com.cn/baidu_cartoon_resources.xml',
			'increment_url' => 'http://sitemap.video.sina.com.cn/baidu_cartoon_resources_increment.xml',
			'attributes' => array(
				'keyword' => 'data.display.serialinfo.workName',
				'video_date'=> 'data.display.serialinfo.showTime',
			)
		),
		#综艺节目
		'varietyshow' => array(
			'all_url' => 'http://sitemap.video.sina.com.cn/baidu_yingshi_resources.xml',
			'increment_url' => 'http://sitemap.video.sina.com.cn/baidu_yingshi_resources_increment.xml',
			'attributes' => array(
				'keyword' => 'data.display.serialinfo.workName',
				'video_date'=> 'data.display.serialinfo.showTime',
			)
		),
		
	),
);