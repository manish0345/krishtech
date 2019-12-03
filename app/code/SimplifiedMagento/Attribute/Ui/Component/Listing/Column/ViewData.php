<?php


namespace SimplifiedMagento\Attribute\Ui\Component\Listing\Column;


use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class ViewData extends Column
{
    private $url;

    public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, UrlInterface $url, array $components = [], array $data = [])
    {
        $this->url = $url;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $name = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
                $item[$name]['view'] = [
                    'href' => '#',
                    'label' => __('View'),
                    'class' => $item['entity_id'],
                    'hidden' => false
                ];
            }
        }

        return parent::prepareDataSource($dataSource);
    }
}