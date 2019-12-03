<?php


namespace SimplifiedMagento\Database\Controller\Page;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use SimplifiedMagento\Database\Model\AffiliateMemberFactory;


class index extends Action
{
    protected $affiliateMemberFactory;

    public function __construct(Context $context, AffiliateMemberFactory $affiliateMemberFactory)
    {
        $this->affiliateMemberFactory = $affiliateMemberFactory;
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
        $affiliateMember = $this->affiliateMemberFactory->create();
        //$member = $affiliateMember->load(1);

        //$member->setAddress('Bapunagar');
        //$member->save();

        //$affiliateMember->addData(['name' => 'Alex', 'address' => 'Bhidbhanjan', 'status' => true]);
        //$affiliateMember->save();
        //var_dump($member->getData());

        //$member->delete();

        $collection = $affiliateMember->getCollection()->addFieldToSelect(['name','status'])
        ->addFieldToFilter('name', array('like' => 'kalpesh'));
        foreach ($collection as $item) {
            print_r($item->getData());
            echo '<br/>';
        }
    }
}