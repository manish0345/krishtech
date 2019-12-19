<?php


namespace TrainingManish\Feedback\Model\Ui;


use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use TrainingManish\Feedback\Model\ResourceModel\Feedback\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
    private $loadedData;
    /**
     * @var DataPersistor
     */
    private $dataPersistor;

    public function __construct(
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        $name,
        $primaryFieldName,
        $requestFieldName,
        array $meta = [],
        array $data = [])
    {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        foreach ($items as $item) {
            $this->loadedData[$item->getId()] = $item->getData();
        }

        $data = $this->dataPersistor->get('feedback');
        if (!empty($data)) {
            $custom_admin = $this->collection->getNewEmptyItem();
            $custom_admin->setData($data);
            $this->loadedData[$custom_admin->getId()] = $custom_admin->getData();
            $this->dataPersistor->clear('feedback');
        }
        return $this->loadedData;
    }

}