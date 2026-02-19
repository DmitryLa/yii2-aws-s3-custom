<?php

namespace dmitryla\yii2AwsS3Custom\interfaces\commands;

/**
 * Interface Asynchronous
 *
 * @package dmitryla\yii2AwsS3Custom\interfaces\commands
 */
interface Asynchronous
{
    /**
     * @return mixed
     */
    public function async();

    /**
     * @return bool
     */
    public function isAsync(): bool;
}
