<?php

namespace dmitryla\yii2AwsS3Custom\base\commands;

use dmitryla\yii2AwsS3Custom\interfaces\Bus;
use dmitryla\yii2AwsS3Custom\interfaces\commands\ExecutableCommand as ExecutableCommandInterface;

/**
 * Class ExecutableCommand
 *
 * @package dmitryla\yii2AwsS3Custom\base\commands
 */
abstract class ExecutableCommand implements ExecutableCommandInterface
{
    /** @var \dmitryla\yii2AwsS3Custom\interfaces\Bus */
    private $bus;

    /**
     * ExecutableCommand constructor.
     *
     * @param \dmitryla\yii2AwsS3Custom\interfaces\Bus $bus
     */
    public function __construct(Bus $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        return $this->bus->execute($this);
    }
}
