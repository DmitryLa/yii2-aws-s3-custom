<?php

namespace dmitryla\yii2AwsS3Custom\commands;

use dmitryla\yii2AwsS3Custom\base\commands\ExecutableCommand;
use dmitryla\yii2AwsS3Custom\interfaces\commands\HasBucket;

/**
 * Class GetPresignedUrlCommand
 *
 * @method string execute()
 *
 * @package dmitryla\yii2AwsS3Custom\commands
 */
class GetPresignedUrlCommand extends ExecutableCommand implements HasBucket
{
    /** @var array */
    protected $args = [];

    /** @var mixed */
    protected $expiration;

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
    public function getFilename(): string
    {
        return $this->args['Key'] ?? '';
    }

    /**
     * @param string $filename
     *
     * @return $this
     */
    public function byFilename(string $filename)
    {
        $this->args['Key'] = $filename;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * @param int|string|\DateTime $expiration
     *
     * @return $this
     */
    public function withExpiration($expiration)
    {
        $this->expiration = $expiration;

        return $this;
    }

    /**
     * @internal used by the handlers
     *
     * @return array
     */
    public function getArgs(): array
    {
        return $this->args;
    }
}
