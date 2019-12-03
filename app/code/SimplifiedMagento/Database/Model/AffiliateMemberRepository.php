<?php


namespace SimplifiedMagento\Database\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use SimplifiedMagento\Database\Api\AffiliateMemberRepositoryInterface;
use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember\CollectionFactory;
use SimplifiedMagento\Database\Model\AffiliateMemberFactory;
use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMember;
use SimplifiedMagento\Database\Api\Data\AffiliateMemberSearchResultInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;

class AffiliateMemberRepository implements AffiliateMemberRepositoryInterface
{
    private $collectionFactory;
    private $affiliateMemberFactory;
    private $affiliateMember;
    private $collectionProcessor;
    private $resultInterfaceFactory;

    public function __construct(CollectionFactory $collectionFactory, AffiliateMemberFactory $affiliateMemberFactory,
                                AffiliateMember $affiliateMember, CollectionProcessor $collectionProcessor,
                                AffiliateMemberSearchResultInterfaceFactory $resultInterfaceFactory)
    {
        $this->collectionFactory = $collectionFactory;
        $this->affiliateMemberFactory = $affiliateMemberFactory;
        $this->affiliateMember = $affiliateMember;
        $this->collectionProcessor = $collectionProcessor;
        $this->resultInterfaceFactory = $resultInterfaceFactory;
    }

    /**
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface[]
     */
    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }

    /**
     * @param int $id
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function getAffiliateMemeberById($id)
    {
        // TODO: Implement getAffiliateMemeber() method.
        $member = $this->affiliateMemberFactory->create()->load($id);
        return $member;
    }

    /**
     * @param \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface $member
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function saveAffiliateMember(\SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface $member)
    {
        // TODO: Implement saveAffiliateMember() method.
        if($member->getId() == null) {
            $this->affiliateMember->save($member);
            return $member;
        } else {
            $newMember = $this->affiliateMemberFactory->create()->load($member->getId());
            foreach ($member->getData() as $key => $value) {
                $newMember->setData($key, $value);
            }
            $this->affiliateMember->save($newMember);
            return $newMember;
        }
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteAffiliateById($id)
    {
        // TODO: Implement deleteAffiliate() method.
        $member = $this->affiliateMemberFactory->create()->load($id);
        $member->delete();
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberSearchResultInterface
     */
    public function searchAffiliateMember(SearchCriteriaInterface $searchCriteria)
    {
        // TODO: Implement searchAffiliateMember() method.
        $collection = $this->affiliateMemberFactory->create()->getCollection();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->resultInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getData());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}