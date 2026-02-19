<?php

namespace dmitryla\yii2AwsS3Custom\handlers;

use dmitryla\yii2AwsS3Custom\base\handlers\Handler;
use dmitryla\yii2AwsS3Custom\commands\GetPresignedUrlCommand;

/**
 * Class GetPresignedUrlCommandHandler
 *
 * @package dmitryla\yii2AwsS3Custom\handlers
 */
final class GetPresignedUrlCommandHandler extends Handler
{
    /**
     * @param \dmitryla\yii2AwsS3Custom\commands\GetPresignedUrlCommand $command
     *
     * @return string
     */
    public function handle(GetPresignedUrlCommand $command): string
    {
        $awsCommand = $this->s3Client->getCommand('GetObject', $command->getArgs());
        $request = $this->s3Client->createPresignedRequest($awsCommand, $command->getExpiration());

        return (string)$request->getUri();
    }
}
