<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['email']['protocol']  = 'smtp';
	$config['email']['smtp_host'] = 'ssl://smtp.googlemail.com';
//	$config['smtp_timeout'] = '7';
	$config['email']['smtp_user'] = 'sergioarielreynoso@gmail.com';
	$config['email']['smtp_pass'] = 'searre57563210';
	$config['email']['smtp_port'] = '465';
	$config['email']['mailtype']  = 'html';
	$config['email']['charset']   = 'utf-8';
//	$config['newline']="\r\n";
	$config['validation'] = TRUE; // bool whether to validate email or not    
