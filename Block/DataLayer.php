<?php

/**
 *
 * Copyright (c) 2019. Jamersan, LLC
 * Author: William French
 * https://www.jamersan.com | william.french@jamersan.com
 *
 */

namespace Jamersan\GoogleTagManager\Block;

/**
 * Google Tag Manager Block
 */
class DataLayer extends DataLayerAbstract
{

    /**
     * Render tag manager script
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->_gtmHelper->isEnabled()) {
            return '';
        }

        /** @var $blockOnepageOrder \Jamersan\GoogleTagManager\Block\Data\Order */
        if ($this->getOrderIds() && $blockOnepageOrder = $this->getChildBlock("jamersan_gtm_block_order")) {
            $blockOnepageOrder->setOrderIds($this->getOrderIds())->addOrderLayer();
        }

        return parent::_toHtml();
    }

    /**
     * Get Account Id
     *
     * @return string
     */
    public function getAccountId()
    {
        return $this->_gtmHelper->getAccountId();
    }
}
