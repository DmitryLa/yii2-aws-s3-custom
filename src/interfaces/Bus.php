<?php

namespace dmitryla\yii2AwsS3Custom\interfaces;

use dmitryla\yii2AwsS3Custom\interfaces\commands\Command;

/**
 * Interface Bus
 *
 * @package dmitryla\yii2AwsS3Custom\interfaces
 */
interface Bus
{
    /**
     * @param \dmitryla\yii2AwsS3Custom\interfaces\commands\Command $command
     *
     * @return mixed
     */
    public function execute(Command $command);
}
