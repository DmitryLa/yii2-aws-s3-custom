<?php

namespace dmitryla\yii2AwsS3Custom\handlers;

use dmitryla\yii2AwsS3Custom\base\handlers\Handler;
use dmitryla\yii2AwsS3Custom\commands\ExistCommand;

/**
 * Class ExistCommandHandler
 *
 * @package dmitryla\yii2AwsS3Custom\handlers
 */
final class ExistCommandHandler extends Handler
{
    /**
     * @param \dmitryla\yii2AwsS3Custom\commands\ExistCommand $command
     *
     * @return bool
     */
    public function handle(ExistCommand $command): bool
    {
        return $this->s3Client->doesObjectExist(
            $command->getBucket(),
            $command->getFilename(),
            $command->getOptions()
        );
    }
}
