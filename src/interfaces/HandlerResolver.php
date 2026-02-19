<?php

namespace dmitryla\yii2AwsS3Custom\interfaces;

use dmitryla\yii2AwsS3Custom\interfaces\commands\Command;
use dmitryla\yii2AwsS3Custom\interfaces\handlers\Handler;

/**
 * Interface HandlerResolver
 *
 * @package dmitryla\yii2AwsS3Custom\interfaces
 */
interface HandlerResolver
{
    /**
     * @param \dmitryla\yii2AwsS3Custom\interfaces\commands\Command $command
     *
     * @return \dmitryla\yii2AwsS3Custom\interfaces\handlers\Handler
     */
    public function resolve(Command $command): Handler;

    /**
     * @param string $commandClass
     * @param mixed  $handler
     */
    public function bindHandler(string $commandClass, $handler);
}
