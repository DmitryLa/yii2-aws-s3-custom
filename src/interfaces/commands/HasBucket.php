<?php

namespace dmitryla\yii2AwsS3Custom\interfaces\commands;

/**
 * Interface HasBucket
 *
 * @package dmitryla\yii2AwsS3Custom\interfaces\commands
 */
interface HasBucket
{
    /**
     * @param string $name
     */
    public function inBucket(string $name);
}
