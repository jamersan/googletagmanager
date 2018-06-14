<?php
/**
 *
 * Copyright (c) 2019. Jamersan, LLC
 * Author: William French
 * https://www.jamersan.com | william.french@jamersan.com
 *
 */

namespace Jamersan\GoogleTagManager\Block\Data;

use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Helper\Data;
use Magento\Catalog\Model\Product\Type;

/**
 * Block : Product for catalog product view page
 *
 * @package Jamersan\GoogleTagManager
 * @class   Product
 */
class Product extends \Magento\Catalog\Block\Product\AbstractProduct
{
    /**
     * Catalog data
     *
     * @var Data
     */
    protected $catalogHelper = null;

    /**
     * @param Context|Context $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        array $data = []
    ) {
        $this->catalogHelper = $context->getCatalogHelper();
        parent::__construct($context, $data);
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

        $tm->addVariable(
            'list',
            'detail'
        );

        /** @var $product \Magento\Catalog\Api\Data\ProductInterface */
        $product = $this->getProduct();

        if ($product) {
            $tm->addVariable(
                'product',
                [
                    'id' => $product->getId(),
                    'sku' => $product->getSku(),
                    'name' => $product->getName(),
                    'price' => $product->getTypeId() == Type::TYPE_SIMPLE ? $tm->formatPrice($product->getPrice()) : $tm->formatPrice($product->getFinalPrice()),
                    'attribute_set_id' => $product->getAttributeSetId(),
                    'path' => implode(" > ", $this->getBreadCrumbPath())
                ]
            );
        }

        return $this;
    }

    /**
     * Get bread crumb path
     *
     * @return array
     */
    protected function getBreadCrumbPath()
    {
        $titleArray = [];
        $breadCrumbs = $this->catalogHelper->getBreadcrumbPath();

        foreach ($breadCrumbs as $breadCrumb) {
            $titleArray[] = $breadCrumb['label'];
        }

        return $titleArray;
    }
}
