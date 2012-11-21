<?php
$dirname = dirname(__FILE__);
include $dirname.'/alias.php';
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
	'language' => 'zh_cn',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.xml.*',
		'ext.YiiMongoDbSuite.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
				'ext.YiiMongoDbSuite.gii'
			),
		),
		'admin'
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),*/
		'enum' => array(
			'class' => 'lib.components.CEnumer',
			'lang' => 'zh_cn',
		),
		'db'=>array(
			'connectionString' => 'mysql:host=192.168.1.116;dbname=video',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'mongodb' => array(
	        'class'            => 'EMongoDB',
//	        'connectionString' => 'mongodb://root:123456@103.29.135.92',
//	        'dbName'           => 'hems',
			'connectionString' => 'mongodb://localhost',
	        'dbName'           => 'vote',
	        'fsyncFlag'        => true,
	        'safeFlag'         => true,
	        'useCursor'        => false
	   ),
	
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
				array(
					'class'=>'PHPMailerLogRoute',
					'categories' => 'videoSync.*',
					//邮件服务主机名称
					'host' => 'smtp.ym.163.com',
					//收件人邮箱
					'emails'=>array(
						'nijianan@hayzone.com'
					),
					//是否打开SMTP身份验证
					'SMTPAuth' =>'true',
					//发件人邮箱账户名
					'username' => 'ouyong@hayzone.com',
					//发件人邮箱密码
					'password' => '8420424',
					//发件人邮箱
					'from' => 'ouyong@hayzone.com',
					//发件人姓名
					'fromName' => '欧勇'
					
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);