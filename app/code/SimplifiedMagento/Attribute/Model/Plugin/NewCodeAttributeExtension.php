<?php


namespace SimplifiedMagento\Attribute\Model\Plugin;

use Magento\Catalog\Api\Data\ProductExtensionFactory;

class NewCodeAttributeExtension
{
    private $extensionFactory;

    public function __construct(ProductExtensionFactory $extensionFactory)
    {
        $this->extensionFactory = $extensionFactory;
    }

    public function afterGet
    (
        \Magento\Catalog\Api\ProductRepositoryInterface $subject,
        \Magento\Catalog\Api\Data\ProductInterface $entity
    ) {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('Plugin Product Code Added Successfully.');

        $extensionAttributes = $entity->getExtensionAttributes(); /** get current extension attributes from entity **/
        $extensionAttributes->setManish("Code # Manish");
        $entity->setExtensionAttributes($extensionAttributes);

        return $entity;
    }
}