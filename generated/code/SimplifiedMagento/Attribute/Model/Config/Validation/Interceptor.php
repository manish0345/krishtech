<?php
namespace SimplifiedMagento\Attribute\Model\Config\Validation;

/**
 * Interceptor class for @see \SimplifiedMagento\Attribute\Model\Config\Validation
 */
class Interceptor extends \SimplifiedMagento\Attribute\Model\Config\Validation implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct()
    {
        $this->___init();
    }

    /**
     * {@inheritdoc}
     */
    public function validate($object)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'validate');
        if (!$pluginInfo) {
            return parent::validate($object);
        } else {
            return $this->___callPlugins('validate', func_get_args(), $pluginInfo);
        }
    }
}
