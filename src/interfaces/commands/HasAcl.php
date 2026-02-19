<?php

namespace dmitryla\yii2AwsS3Custom\interfaces\commands;

/**
 * Interface HasAcl
 *
 * @package dmitryla\yii2AwsS3Custom\interfaces\commands
 */
interface HasAcl
{
    /**
     * @param string $acl
     */
    public function withAcl(string $acl);
}
