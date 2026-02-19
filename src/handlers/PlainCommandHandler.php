<?php

namespace dmitryla\yii2AwsS3Custom\handlers;

use Aws\CommandInterface as AwsCommand;
use dmitryla\yii2AwsS3Custom\base\handlers\Handler;
use dmitryla\yii2AwsS3Custom\interfaces\commands\Asynchronous;
use dmitryla\yii2AwsS3Custom\interfaces\commands\PlainCommand;

/**
 * Class PlainCommandHandler
 *
 * @package chemezov\yii2\yandex\cloud\handlers
 */
final class PlainCommandHandler extends Handler
{
    /**
     * @param \chemezov\yii2\yandex\cloud\interfaces\commands\PlainCommand $command
     *
     * @return \Aws\ResultInterface|\GuzzleHttp\Promise\PromiseInterface
     */
    public function handle(PlainCommand $command)
    {
        $awsCommand = $this->transformToAwsCommand($command);

        /** @var \GuzzleHttp\Promise\PromiseInterface $promise */
        $promise = $this->s3Client->executeAsync($awsCommand);

        return $this->commandIsAsync($command) ? $promise : $promise->wait();
    }

    /**
     * @param \chemezov\yii2\yandex\cloud\interfaces\commands\PlainCommand $command
     *
     * @return bool
     */
    protected function commandIsAsync(PlainCommand $command): bool
    {
        return $command instanceof Asynchronous && $command->isAsync();
    }

    /**
     * @param \chemezov\yii2\yandex\cloud\interfaces\commands\PlainCommand $command
     *
     * @return \Aws\CommandInterface
     */
    protected function transformToAwsCommand(PlainCommand $command): AwsCommand
    {
        $args = array_filter($command->toArgs());

        return $this->s3Client->getCommand($command->getName(), $args);
    }
}
