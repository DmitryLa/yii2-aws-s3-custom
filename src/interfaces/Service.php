<?php

namespace dmitryla\yii2AwsS3Custom\interfaces;

use dmitryla\yii2AwsS3Custom\interfaces\commands\Command;

/**
 * Interface Service
 *
 * @package dmitryla\yii2AwsS3Custom\interfaces
 */
interface Service
{
    /**
     * @param \dmitryla\yii2AwsS3Custom\interfaces\commands\Command $command
     *
     * @return mixed
     */
    public function execute(Command $command);

    /**
     * @param string $commandClass
     *
     * @return \dmitryla\yii2AwsS3Custom\interfaces\commands\Command
     */
    public function create(string $commandClass): Command;
}
