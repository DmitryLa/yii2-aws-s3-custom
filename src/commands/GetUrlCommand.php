<?php

namespace dmitryla\yii2AwsS3Custom\commands;

use dmitryla\yii2AwsS3Custom\base\commands\ExecutableCommand;
use dmitryla\yii2AwsS3Custom\interfaces\commands\HasBucket;

/**
 * Class GetUrlCommand
 *
 * @method string execute()
 *
 * @package dmitryla\yii2AwsS3Custom\commands
 */
class GetUrlCommand extends ExecutableCommand implements HasBucket
{
    /** @var string */
    protected $bucket;

    /** @var string */
    protected $filename;

    /**
     * @return string
     */
    public function getBucket(): string
    {
        return (string)$this->bucket;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function inBucket(string $name)
    {
        $this->bucket = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return (string)$this->filename;
    }

    /**
     * @param string $filename
     *
     * @return $this
     */
    public function byFilename(string $filename)
    {
        $this->filename = $filename;

        return $this;
    }
}
