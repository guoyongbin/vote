<?php
$dirname = dirname(__FILE__);

Yii::setPathOfAlias('lib', 
					$dirname
					.DIRECTORY_SEPARATOR.'..'
					.DIRECTORY_SEPARATOR.'..'
					.DIRECTORY_SEPARATOR.'..'
					.DIRECTORY_SEPARATOR.'syslib');

// application
Yii::setPathOfAlias('app', 
					$dirname
					.DIRECTORY_SEPARATOR.'..');

// application.config
Yii::setPathOfAlias('config', $dirname);

// application.components
Yii::setPathOfAlias('coms', 
					$dirname
					.DIRECTORY_SEPARATOR.'..'
					.DIRECTORY_SEPARATOR.'components');
					
// application.conf.datacfg
Yii::setPathOfAlias('datacfg', 
					$dirname
					.DIRECTORY_SEPARATOR.'datacfg');

