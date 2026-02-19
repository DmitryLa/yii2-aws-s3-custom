<?php

namespace dmitryla\yii2AwsS3Custom;

use dmitryla\yii2AwsS3Custom\interfaces;

/**
 * Class Bus
 *
 * @package dmitryla\yii2AwsS3Custom
 */
class Bus implements interfaces\Bus
{
    /** @var interfaces\HandlerResolver */
    protected $resolver;

    /**
     * Bus constructor.
     *
     * @param \dmitryla\yii2AwsS3Custom\interfaces\HandlerResolver $inflector
     */
    public function __construct(interfaces\HandlerResolver $inflector)
    {
        $this->resolver = $inflector;
    }

    /**
     * @param \dmitryla\yii2AwsS3Custom\interfaces\commands\Command $command
     *
     * @return mixed
     */
    public function execute(interfaces\commands\Command $command)
    {
        $handler = $this->resolver->resolve($command);

        return call_user_func([$handler, 'handle'], $command);
    }
}
