<?php

namespace dmitryla\yii2AwsS3Custom\handlers;

use dmitryla\yii2AwsS3Custom\base\handlers\Handler;
use dmitryla\yii2AwsS3Custom\commands\GetUrlCommand;

/**
 * Class GetUrlCommandHandler
 *
 * @package dmitryla\yii2AwsS3Custom\handlers
 */
final class GetUrlCommandHandler extends Handler
{
    /**
     * @param \dmitryla\yii2AwsS3Custom\commands\GetUrlCommand $command
     *
     * @return string
     */
    public function handle(GetUrlCommand $command): string
    {
        return $this->s3Client->getObjectUrl($command->getBucket(), $command->getFilename());
    }
}
