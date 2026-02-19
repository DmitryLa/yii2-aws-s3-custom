<?php

namespace dmitryla\yii2AwsS3Custom\interfaces\commands;

/**
 * Interface ExecutableCommand
 *
 * @package dmitryla\yii2AwsS3Custom\interfaces\commands
 */
interface ExecutableCommand extends Command
{
    /**
     * @return mixed
     */
    public function execute();
}
