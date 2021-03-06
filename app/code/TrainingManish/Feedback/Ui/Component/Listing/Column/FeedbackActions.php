<?php


namespace TrainingManish\Feedback\Ui\Component\Listing\Column;


use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class FeedbackActions extends Column
{
    /**
     * @var UrlInterface
     */
    private $url;

    public function __construct(UrlInterface $url, ContextInterface $context, UiComponentFactory $uiComponentFactory, array $components = [], array $data = [])
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->url = $url;
    }

    public function prepareDataSource(array $dataSource)
    {
        if(isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')]['edit'] = [
                    'href' => $this->url->getUrl('custom/feedback/edit', ['id' => $item['entity_id']]),
                    'label' => __('Edit'),
                    'hidden' => false
                ];

                $item[$this->getData('name')]['delete'] = [
                    'href' => $this->url->getUrl('custom/feedback/delete', ['id' => $item['entity_id']]),
                    'label' => __('Delete'),
                    'hidden' => false
                ];

                $item[$this->getData('name')]['view'] = [
                    'href' => $this->url->getUrl('custom/feedback/view', ['id' => $item['entity_id']]),
                    'label' => __('View'),
                    'hidden' => false
                ];

            }
        }
        return parent::prepareDataSource($dataSource); // TODO: Change the autogenerated stub
    }
}