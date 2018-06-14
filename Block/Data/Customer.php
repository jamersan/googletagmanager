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
use Jamersan\GoogleTagManager\Model\Customer as GtmCustomerModel;

/**
 * Block : Customer Datalayer for un-cached page
 *
 * @package Jamersan\GoogleTagManager
 * @class   Customer
 */
class Customer extends \Magento\Framework\View\Element\Template
{
    /**
     * @var GtmCustomerModel
     */
    protected $gtmCustomer;

    /**
     * @param Context $context
     * @param GtmCustomerModel $gtmCustomer
     */
    public function __construct(
        Context $context,
        GtmCustomerModel $gtmCustomer
    ) {
        $this->gtmCustomer = $gtmCustomer;
    }
    /**
     * Add product data to datalayer
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        /** @var $tm \Jamersan\GoogleTagManager\Block\DataLayer */
        $tm = $this->getParentBlock();
        $tm->addVariable('customer', $this->gtmCustomer->getCustomer());

        return $this;
    }
}
