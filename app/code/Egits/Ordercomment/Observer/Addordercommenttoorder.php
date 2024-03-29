<?php
namespace Egits\Ordercomment\Observer;

use Egits\Ordercomment\Helper\Data\Ordercomment;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class Addordercommenttoorder implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();
        $order->setData(Ordercomment::COMMENT_FIELD_NAME, $quote->getData(Ordercomment::COMMENT_FIELD_NAME));
        // $order->setData('egits_order_comment', $quote->getEgitsOrderComment());
    }
}