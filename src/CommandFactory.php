<?php

namespace dmitryla\yii2AwsS3Custom;

use dmitryla\yii2AwsS3Custom\commands\DeleteCommand;
use dmitryla\yii2AwsS3Custom\commands\ExistCommand;
use dmitryla\yii2AwsS3Custom\commands\GetCommand;
use dmitryla\yii2AwsS3Custom\commands\GetPresignedUrlCommand;
use dmitryla\yii2AwsS3Custom\commands\GetUrlCommand;
use dmitryla\yii2AwsS3Custom\commands\PutCommand;
use dmitryla\yii2AwsS3Custom\commands\RestoreCommand;
use dmitryla\yii2AwsS3Custom\commands\UploadCommand;
use dmitryla\yii2AwsS3Custom\commands\ListCommand;
use dmitryla\yii2AwsS3Custom\interfaces;

/**
 * Class CommandFactory
 *
 * @package dmitryla\yii2AwsS3Custom
 */
class CommandFactory
{
    /** @var \dmitryla\yii2AwsS3Custom\interfaces\CommandBuilder */
    protected $builder;

    /**
     * CommandFactory constructor.
     *
     * @param \dmitryla\yii2AwsS3Custom\interfaces\CommandBuilder $builder
     */
    public function __construct(interfaces\CommandBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @param string $filename
     *
     * @return \dmitryla\yii2AwsS3Custom\commands\GetCommand
     */
    public function get(string $filename): GetCommand
    {
        /** @var GetCommand $command */
        $command = $this->builder->build(GetCommand::class);
        $command->byFilename($filename);

        return $command;
    }

    /**
     * @param string $filename
     * @param mixed  $body
     *
     * @return \dmitryla\yii2AwsS3Custom\commands\PutCommand
     */
    public function put(string $filename, $body): PutCommand
    {
        /** @var PutCommand $command */
        $command = $this->builder->build(PutCommand::class);
        $command->withFilename($filename)->withBody($body);

        return $command;
    }

    /**
     * @param string $filename
     *
     * @return \dmitryla\yii2AwsS3Custom\commands\DeleteCommand
     */
    public function delete(string $filename): DeleteCommand
    {
        /** @var DeleteCommand $command */
        $command = $this->builder->build(DeleteCommand::class);
        $command->byFilename($filename);

        return $command;
    }

    /**
     * @param string $filename
     * @param mixed  $source
     *
     * @return \dmitryla\yii2AwsS3Custom\commands\UploadCommand
     */
    public function upload(string $filename, $source): UploadCommand
    {
        /** @var UploadCommand $command */
        $command = $this->builder->build(UploadCommand::class);
        $command->withFilename($filename)->withSource($source);

        return $command;
    }

    /**
     * @param string $filename
     * @param int    $days      lifetime of the active copy in days
     *
     * @return \dmitryla\yii2AwsS3Custom\commands\RestoreCommand
     */
    public function restore(string $filename, int $days): RestoreCommand
    {
        /** @var RestoreCommand $command */
        $command = $this->builder->build(RestoreCommand::class);
        $command->byFilename($filename)->withLifetime($days);

        return $command;
    }

    /**
     * @param string $filename
     *
     * @return \dmitryla\yii2AwsS3Custom\commands\ExistCommand
     */
    public function exist(string $filename): ExistCommand
    {
        /** @var ExistCommand $command */
        $command = $this->builder->build(ExistCommand::class);
        $command->byFilename($filename);

        return $command;
    }

    /**
     * @param string $prefix
     *
     * @return \dmitryla\yii2AwsS3Custom\commands\ListCommand
     */
    public function list(string $prefix): ListCommand
    {
        /** @var ListCommand $command */
        $command = $this->builder->build(ListCommand::class);
        $command->byPrefix($prefix);

        return $command;
    }

    /**
     * @param string $filename
     *
     * @return \dmitryla\yii2AwsS3Custom\commands\GetUrlCommand
     */
    public function getUrl(string $filename): GetUrlCommand
    {
        /** @var GetUrlCommand $command */
        $command = $this->builder->build(GetUrlCommand::class);
        $command->byFilename($filename);

        return $command;
    }

    /**
     * @param string $filename
     * @param mixed  $expires
     *
     * @return \dmitryla\yii2AwsS3Custom\commands\GetPresignedUrlCommand
     */
    public function getPresignedUrl(string $filename, $expires): GetPresignedUrlCommand
    {
        /** @var GetPresignedUrlCommand $command */
        $command = $this->builder->build(GetPresignedUrlCommand::class);
        $command->byFilename($filename)->withExpiration($expires);

        return $command;
    }
}
