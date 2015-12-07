<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } 
/*
Plugin Name: alien静态资源CDN插件
Version: 1.1
Plugin URL: http://www.superxzr.net
Description: 使用新浪的静态资源进行CDN处理，对SAE特别优化
Author:alien
Author URL: http://www.superxzr.net
For: V3.1+
*/

function alien_cdn() {
    ob_start('alien_static_cdn_processor'); //打开缓冲区，设置回调函数alien_static_cdn_processor
}

function alien_static_cdn_processor($str) {
	//替换，然后返回结果作为修改好的缓冲区
	return str_replace(
		array(
			'source/js/jquery.min.js',
			'source/css/bootstrap.min.css',
			'source/js/bootstrap.min.js',
			SYSTEM_URL . 'plugins/wmzz_todcui/css/todc-bootstrap.min.css'
		), 
		array(
			'http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js',
			'http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css',
			'http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js',
			'http://apps.bdimg.com/libs/todc-bootstrap/3.1.1-3.2.1/todc-bootstrap.min.css'
		), $str);
}

addAction('top','alien_cdn'); //挂载alien_cdn

?>
