<?php
/**
 *
 * Copyright (c) 2019. Jamersan, LLC
 * Author: William French
 * https://www.jamersan.com | william.french@jamersan.com
 *
 */

namespace Jamersan\GoogleTagManager\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Jamersan\GoogleTagManager\Model\Cart as GtmCartModel;
use Jamersan\GoogleTagManager\Model\Customer as GtmCustomerModel;

class JsDataLayer implements SectionSourceInterface
{
    /**
     * @var GtmCustomerModel
     */
    protected $gtmCustomer;

    /**
     * @var GtmCartModel
     */
    protected $gtmCart;

    /**
     * @param GtmCustomerModel $gtmCustomer
     * @param GtmCartModel $gtmCart
     */
    public function __construct(
        GtmCustomerModel $gtmCustomer,
        GtmCartModel $gtmCart
    ) {
        $this->gtmCustomer = $gtmCustomer;
        $this->gtmCart = $gtmCart;
    }

    /**
     * {@inheritdoc}
     * @return array
     */
    public function getSectionData()
    {
        return [
            'customer' => $this->gtmCustomer->getCustomer(),
            'cart' => $this->gtmCart->getCart()
        ];
    }
}
