<?php
return array(
	'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Darband',
	'timeZone' => 'Asia/Tehran',
	'theme' => 'abound',
	'sourceLanguage' => '00',
	'language' => 'en',
	// preloading 'log' component
	'preload'=>array('log','userCounter'),

	// autoloading model and component classes
	'import'=>array(
		'application.vendor.*',
		'application.models.*',
		'application.components.*',
		'ext.yiiSortableModel.models.*',
		'ext.dropZoneUploader.*',
		'application.modules.pages.models.*',
		'application.modules.setting.models.*',
		'application.modules.products.models.*',
		'application.modules.slideshow.models.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'admins',
		'users',
		'setting',
		'pages',
		'places',
        'contact',
        'map',
        'products',
        'slideshow',
	),

	// application components
	'components'=>array(
        'ePdf' => array(
            'class' => 'ext.yii-pdf.EYiiPdf',
            'params' => array(
                'mpdf' => array(
                    'librarySourcePath' => 'application.vendor.mpdf.*',
                    'constants'         => array(
                        '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                    ),
                    'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
                    /*'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                        'mode'              => '', //  This parameter specifies the mode of the new document.
                        'format'            => 'A4', // format A4, A5, ...
                        'default_font_size' => 0, // Sets the default document font size in points (pt)
                        'default_font'      => '', // Sets the default font-family for the new document.
                        'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                        'mgr'               => 15, // margin_right
                        'mgt'               => 16, // margin_top
                        'mgb'               => 16, // margin_bottom
                        'mgh'               => 9, // margin_header
                        'mgf'               => 9, // margin_footer
                        'orientation'       => 'P', // landscape or portrait orientation
                    )*/
                ),
                'HTML2PDF' => array(
                    'librarySourcePath' => 'application.vendor.html2pdf.*',
                    'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
//                    'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
//                        'orientation' => 'P', // landscape or portrait orientation
//                        'format'      => 'A4', // format A4, A5, ...
//                        'language'    => 'fa', // language: fr, en, it ...
//                        'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
//                        'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
//                        'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
//                    )
                )
            ),
        ),
		'request'=>array(
			'enableCsrfValidation'=>true,
		),
		'userCounter' => array(
			'class' => 'application.components.UserCounter',
			'tableUsers' => 'ym_counter_users',
			'tableSave' => 'ym_counter_save',
			'autoInstallTables' => true,
			'onlineTime' => 10, // min
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class' => 'WebUser',
			'loginUrl'=>array('/login'),
		),
		'authManager'=>array(
			'class'=>'CDbAuthManager',
			'connectionID'=>'db',
		),
		// uncomment the following to enable URLs in path-format
		// @todo change rules in projects
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'appendParams'=>true,
			'rules'=>array(
				'menu/download'=>'/site/menuPdf',
				'/page/<title:(.*)>'=>'/pages/manage/view',
				'/pages/<id:\d+>'=>'/pages/manage/view',
				'<action:(about|contact|help|terms|search|faq)>' => 'site/<action>',
				'<action:(logout|dashboard|googleLogin|login|register|changePassword|forgetPassword|profile|notifications|recoverPassword|bookmarks)>' => 'users/public/<action>',
				'<module:\w+>/<id:\d+>'=>'<module>/public/view',
				'<module:\w+>/<controller:\w+>'=>'<module>/<controller>/index',
				'<controller:\w+>/<action:\w+>/<id:\d+>/<title:(.*)>'=>'<controller>/<action>',
				'<controller:\w+>/<id:\d+>/<title:(.*)>'=>'<controller>/view',
				'<module:\w+>/<controller:\w+>/<id:\d+>/<title:\w+>'=>'<module>/<controller>/view',
				'<module:\w+>/<action:\w+>/<id:\d+>/<title:(.*)>'=>'<module>/manage/<action>',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<module>/<controller>/<action>/view',
				'<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
				'<module:\w+>/<controller:\w+>/<action:\w+>/<title:\w+>'=>'<module>/<controller>/<action>',
				'<module:\w+>/<controller:\w+>/<id:\d+>'=>'<module>/<controller>/view',
			),
		),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class' => 'CFileLogRoute',
					'levels'=>'error, warning, trace, info',
					'categories'=>'application.*',
				),
				// uncomment the following to show log messages on web pages
				array(
					'class' => 'CWebLogRoute',
					'enabled' => YII_DEBUG,
					'levels'=>'error, warning, trace, info',
					'categories'=>'application.*',
					'showInFireBug' => true,
				),
			),
		),
		'clientScript'=>array(
//			'class'=>'ext.minScript.components.ExtMinScript',
			'coreScriptPosition' => CClientScript::POS_HEAD,
			'defaultScriptFilePosition' => CClientScript::POS_END,
		),
	),
	'controllerMap' => array(
		'min' => array(
			'class' =>'ext.minScript.controllers.ExtMinScriptController',
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// @todo change webmail of emails
		'adminEmail'=>'info@darband.ir',
		'noReplyEmail' => 'noreply@darband.ir',
		'SMTP' => array(
			'Host' => 'mail.darband.ir',
			'Secure' => 'ssl',
			'Port' => '465',
			'Username' => 'noreply@darband.ir',
			'Password' => 'd(&u,zpGBjax',
		)
	),
);