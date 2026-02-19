<?php

namespace dmitryla\yii2AwsS3Custom\interfaces;

use dmitryla\yii2AwsS3Custom\interfaces\commands\Command;

/**
 * Interface CommandBuilder
 *
 * @package dmitryla\yii2AwsS3Custom\interfaces
 */
interface CommandBuilder
{
    /**
     * @param string $commandClass
     *
     * @return \dmitryla\yii2AwsS3Custom\interfaces\commands\Command
     */
    public function build(string $commandClass): Command;
}
