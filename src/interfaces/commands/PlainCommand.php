<?php

namespace dmitryla\yii2AwsS3Custom\interfaces\commands;

/**
 * Interface PlainCommand
 *
 * @package dmitryla\yii2AwsS3Custom\interfaces\commands
 */
interface PlainCommand extends Command
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return array
     */
    public function toArgs(): array;
}
