<?php

namespace dmitryla\yii2AwsS3Custom\commands;

use dmitryla\yii2AwsS3Custom\base\commands\ExecutableCommand;
use dmitryla\yii2AwsS3Custom\base\commands\traits\Options;
use dmitryla\yii2AwsS3Custom\interfaces\commands\HasBucket;

/**
 * Class ExistCommand
 *
 * @method bool execute()
 *
 * @package dmitryla\yii2AwsS3Custom\commands
 */
class ExistCommand extends ExecutableCommand implements HasBucket
{
    use Options;

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
