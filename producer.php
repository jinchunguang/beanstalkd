<?php
/**
 * Created by PhpStorm.
 * User: jinchunguang
 * Date: 20-4-2
 * Time: 下午6:37
 */
require './vendor/autoload.php';

use Pheanstalk\Pheanstalk;

$pheanstalk = Pheanstalk::create('127.0.0.1');

// put 任务 方式一; 返回新 job 的任务标识，整型值；
$task1=$pheanstalk->useTube('test')->put(
    'hello, beanstalk, i am job 1', // 任务内容
    23, // 任务的优先级, 默认为 1024
    0, // 不等待直接放到ready队列中.
    60 // 处理任务的时间(单位为秒)
);
print_r($task1);


// 给管道里所有新任务设置延迟
$pheanstalk->pauseTube('test', 30);

// 取消管道延迟
$pheanstalk->resumeTube('test');

