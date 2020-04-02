<?php
/**
 * Created by PhpStorm.
 * User: jinchunguang
 * Date: 20-4-2
 * Time: 下午5:59
 */

require './vendor/autoload.php';

use Pheanstalk\Pheanstalk;

$pheanstalk = Pheanstalk::create('127.0.0.1');
# 查看 beanstalkd 当前的状态信息
var_dump($pheanstalk->stats());

