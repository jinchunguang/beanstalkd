<?php
/**
 * Created by PhpStorm.
 * User: jinchunguang
 * Date: 20-4-2
 * Time: 下午6:43
 */
require './vendor/autoload.php';

use Pheanstalk\Pheanstalk;

$pheanstalk = Pheanstalk::create('127.0.0.1');
