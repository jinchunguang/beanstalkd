<?php
/**
 * Created by PhpStorm.
 * User: jinchunguang
 * Date: 20-4-2
 * Time: 下午6:51
 */

require './vendor/autoload.php';

use Pheanstalk\Pheanstalk;

// ----------------------------------------
// Create using autodetection of socket implementation
$pheanstalk = Pheanstalk::create('127.0.0.1');

// ----------------------------------------
// producer (queues jobs)

$tube = 'order_list';
$orderIndex = 'orderIndex::' . time();

$pheanstalk
    ->useTube('order_list',
        23, // 任务的优先级, 默认为 1024
        0, // 不等待直接放到ready队列中.
        60 // 处理任务的时间(单位为秒)
    )
    ->put($orderIndex);

// ----------------------------------------
// worker (performs jobs)

$job = $pheanstalk
    ->watch('order_list')
    ->ignore('default')
    ->reserve();

var_dump($job->getData());

$pheanstalk->delete($job);
