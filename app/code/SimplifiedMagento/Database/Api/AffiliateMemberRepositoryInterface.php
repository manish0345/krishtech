<?php


namespace SimplifiedMagento\Database\Api;


use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

interface AffiliateMemberRepositoryInterface
{
    /**
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface[]
     */
    public function getList();

    /**
     * @param int $id
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function getAffiliateMemeberById($id);

    /**
     * @param \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface $member
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface
     */
    public function saveAffiliateMember(\SimplifiedMagento\Database\Api\Data\AffiliateMemberInterface $member);

    /**
     * @param int $id
     * @return void
     */
    public function deleteAffiliateById($id);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMemberSearchResultInterface
     */
    public function searchAffiliateMember(SearchCriteriaInterface $searchCriteria);
}