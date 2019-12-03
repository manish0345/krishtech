<?php


namespace SimplifiedMagento\Attribute\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\ResponseInterface;

class Index extends Action
{
    private $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig, Context $context)
    {
        $this->scopeConfig = $scopeConfig;

        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        echo $this->scopeConfig->getValue('Firstsection/FirstGroup/Firstfield');
        echo '<br/>';
        print_r($this->scopeConfig->getValue('Firstsection/FirstGroup/Thirdfield'));
    }
}