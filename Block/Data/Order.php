<?php
/**
 *
 * Copyright (c) 2019. Jamersan, LLC
 * Author: William French
 * https://www.jamersan.com | william.french@jamersan.com
 *
 */

namespace Jamersan\GoogleTagManager\Block\Data;

use Magento\Framework\View\Element\Template\Context;

/**
 * Block : Datalayer for order success page
 *
 * @package Jamersan\GoogleTagManager
 * @class   Order
 * @method Array setOrderIds(Array $orderIds)
 * @method Array getOrderIds()
 */
class Order extends \Magento\Framework\View\Element\Template
{
    /** @var \Jamersan\GoogleTagManager\Model\Order */
    protected $orderDataArray;

    /**
     * @param Context $context
     * @param \Jamersan\GoogleTagManager\Model\Order $orderDataArray
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Jamersan\GoogleTagManager\Model\Order $orderDataArray,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->orderDataArray = $orderDataArray;
    }

    /**
     * Render information about specified orders and their items
     *
     * @return void|string
     */
    public function addOrderLayer()
    {
        $transactions = $this->orderDataArray->setOrderIds($this->getOrderIds())->getOrderLayer();

        if (!empty($transactions)) {
            /** @var $tm \Jamersan\GoogleTagManager\Block\DataLayer */
            $tm = $this->getParentBlock();
            foreach ($transactions as $order) {
                $tm->addAdditionalVariable($order);
            }
        }
    }
}
