<?php

namespace dmitryla\yii2AwsS3Custom\handlers;

use dmitryla\yii2AwsS3Custom\base\handlers\Handler;
use dmitryla\yii2AwsS3Custom\commands\GetUrlCommand;

/**
 * Class GetUrlCommandHandler
 *
 * @package chemezov\yii2\yandex\cloud\handlers
 */
final class GetUrlCommandHandler extends Handler
{
    /**
     * @param \chemezov\yii2\yandex\cloud\commands\GetUrlCommand $command
     *
     * @return string
     */
    public function handle(GetUrlCommand $command): string
    {
        return $this->s3Client->getObjectUrl($command->getBucket(), $command->getFilename());
    }
}
