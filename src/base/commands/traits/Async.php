<?php

namespace dmitryla\yii2AwsS3Custom\base\commands\traits;

/**
 * Trait Async
 *
 * @package dmitryla\yii2AwsS3Custom\base\commands\traits
 */
trait Async
{
    /** @var bool */
    private $isAsync = false;

    /**
     * @return $this
     */
    final public function async()
    {
        $this->isAsync = true;

        return $this;
    }

    /**
     * @return bool
     */
    final public function isAsync(): bool
    {
        return $this->isAsync;
    }
}
