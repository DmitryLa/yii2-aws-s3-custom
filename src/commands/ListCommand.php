<?php

namespace dmitryla\yii2AwsS3Custom\commands;

use Aws\ResultInterface;
use dmitryla\yii2AwsS3Custom\base\commands\ExecutableCommand;
use dmitryla\yii2AwsS3Custom\base\commands\traits\Async;
use dmitryla\yii2AwsS3Custom\base\commands\traits\Options;
use dmitryla\yii2AwsS3Custom\interfaces\commands\Asynchronous;
use dmitryla\yii2AwsS3Custom\interfaces\commands\HasBucket;
use dmitryla\yii2AwsS3Custom\interfaces\commands\PlainCommand;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Class ListCommand
 *
 * @method ResultInterface|PromiseInterface execute()
 *
 * @package dmitryla\yii2AwsS3Custom\commands
 */
class ListCommand extends ExecutableCommand implements PlainCommand, HasBucket, Asynchronous
{
    use Async;
    use Options;

    /** @var array */
    protected $args = [];

    /**
     * @return string
     */
    public function getBucket(): string
    {
        return $this->args['Bucket'] ?? '';
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function inBucket(string $name)
    {
        $this->args['Bucket'] = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->args['Prefix'] ?? '';
    }

    /**
     * @param string $prefix
     *
     * @return $this
     */
    public function byPrefix(string $prefix)
    {
        $this->args['Prefix'] = $prefix;

        return $this;
    }

    /**
     * @internal used by the handlers
     *
     * @return string
     */
    public function getName(): string
    {
        return 'ListObjects';
    }

    /**
     * @internal used by the handlers
     *
     * @return array
     */
    public function toArgs(): array
    {
        return array_replace($this->options, $this->args);
    }
}
