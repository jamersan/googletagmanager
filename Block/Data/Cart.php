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
use Jamersan\GoogleTagManager\Model\Cart as GtmCartModel;

/**
 * Block : Datalayer for cart view page
 *
 * @package Jamersan\GoogleTagManager
 * @class   Customer
 */
class Cart extends \Magento\Framework\View\Element\Template
{

    /**
     * @var GtmCartModel
     */
    protected $gtmCart;

    /**
     * @param Context $context
     * @param GtmCartModel $gtmCart
     */
    public function __construct(
        Context $context,
        GtmCartModel $gtmCart
    ) {
        $this->gtmCart = $gtmCart;
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

        $tm->addVariable('cart', $this->gtmCart->getCart());

        return $this;
    }
}
