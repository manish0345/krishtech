<?php


namespace SimplifiedMagento\Attribute\Cron;

use Psr\Log\LoggerInterface;

class AddItem
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute() {
        $this->logger->info('Cron Works');
    }
}