<?php
namespace Egits\ChatBot\Ui\Component\Listing\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Egits\ChatBot\Block\Adminhtml\Module\Grid\Renderer\Action\UrlBuilder;   
use Magento\Framework\UrlInterface;
class ReplayForm extends Column {
    /** Url path */
    const URL_PATH_RESPONSE = 'thread/chat/replay';
    /** @var UrlBuilder */
    protected $actionUrlBuilder;
    /** @var UrlInterface */
    protected $urlBuilder;
    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlBuilder $actionUrlBuilder
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, UrlBuilder $actionUrlBuilder, UrlInterface $urlBuilder, array $components = [], array $data = []) 
    {
        $this->urlBuilder = $urlBuilder;
        $this->actionUrlBuilder = $actionUrlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource) {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item['id'])) {
                    $item[$name]['edit'] = ['href' => $this->urlBuilder->getUrl(self::URL_PATH_RESPONSE, ['id' => $item['id']]), 'label' => __('Replay') ];
                }
            }
        }
        return $dataSource;
    }
}