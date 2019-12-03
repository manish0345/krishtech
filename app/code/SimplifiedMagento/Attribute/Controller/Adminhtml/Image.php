<?php


namespace SimplifiedMagento\Attribute\Controller\Adminhtml;


use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use Magento\Framework\Stdlib\DateTime\Filter\Date;
use Magento\Framework\View\Result\PageFactory;
use SimplifiedMagento\Database\Api\AffiliateMemberRepositoryInterface;

abstract class Image extends Action
{
    const ACTION_RESOURCE = 'SimplifiedMagento_Attribute::parent';

    protected $registry;
    protected $pageFactory;
    protected $dateFilter;
    protected $affiliateMemberRepository;

    public function __construct(
        Registry $registry,
        PageFactory $pageFactory,
        Date $dateFilter,
        AffiliateMemberRepositoryInterface $affiliateMemberRepository,
        Action\Context $context
    )
    {
        $this->registry = $registry;
        $this->pageFactory = $pageFactory;
        $this->dateFilter = $dateFilter;
        $this->affiliateMemberRepository = $affiliateMemberRepository;

        parent::__construct($context);
    }
}