﻿<?php 
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited https://o2o.sctsck.com/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
global $_W, $_GPC;
error_reporting(0);
load()->classs('captcha');
session_start();
$captcha = new Captcha();
$captcha->build(150, 40);
$hash = md5(strtolower($captcha->phrase) . $_W['config']['setting']['authkey']);
isetcookie('__code', $hash);
$_SESSION['__code'] = $hash;
$captcha->output();