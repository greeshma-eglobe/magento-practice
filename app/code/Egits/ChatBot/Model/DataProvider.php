<?php
 namespace Egits\ChatBot\Model;

use Egits\ChatBot\Model\ResourceModel\Thread\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
 
{
 
    protected $loadedData;
 
    public function __construct(
 
        $name,
 
        $primaryFieldName,
 
        $requestFieldName,
 
        CollectionFactory $CollectionFactory,
 
        array $meta = [],
 
        array $data = []
 
    ) {
 
        $this->collection = $CollectionFactory->create();
 
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
 
    }
 
    public function getData()
 
    {
 
        // if (isset($this->loadedData)) {
 
        //     return $this->loadedData;
 
        // }
 
        $items = $this->collection->getItems();
 
        foreach ($items as $item) {
 
            $this->loadedData[$item->getId()] = $item->getData();
 
        }
 
        return $this->loadedData;
 
    }
 
}