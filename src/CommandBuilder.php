<?php

namespace dmitryla\yii2AwsS3Custom;

use dmitryla\yii2AwsS3Custom\interfaces;

/**
 * Class CommandBuilder
 *
 * @package dmitryla\yii2AwsS3Custom
 */
class CommandBuilder implements interfaces\CommandBuilder
{
    /** @var string default bucket name */
    protected $bucket;

    /** @var string default acl */
    protected $acl;

    /** @var interfaces\Bus */
    protected $bus;

    /**
     * CommandBuilder constructor.
     *
     * @param \dmitryla\yii2AwsS3Custom\interfaces\Bus $bus
     * @param string                                 $bucket
     * @param string                                 $acl
     */
    public function __construct(interfaces\Bus $bus, string $bucket = '', string $acl = '')
    {
        $this->bus = $bus;
        $this->bucket = $bucket;
        $this->acl = $acl;
    }

    /**
     * @param string $className
     *
     * @return \dmitryla\yii2AwsS3Custom\interfaces\commands\Command
     * @throws \yii\base\InvalidConfigException
     */
    public function build(string $className): interfaces\commands\Command
    {
        $params = is_subclass_of($className, interfaces\commands\ExecutableCommand::class) ? [$this->bus] : [];

        /** @var interfaces\commands\Command $command */
        $command = \Yii::createObject($className, $params);

        $this->prepareCommand($command);

        return $command;
    }

    /**
     * @param \dmitryla\yii2AwsS3Custom\interfaces\commands\Command $command
     */
    protected function prepareCommand(interfaces\commands\Command $command)
    {
        if ($command instanceof interfaces\commands\HasBucket) {
            $command->inBucket($this->bucket);
        }

        if ($command instanceof interfaces\commands\HasAcl) {
            $command->withAcl($this->acl);
        }
    }
}
