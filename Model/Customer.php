<?php
/**
 *
 * Copyright (c) 2019. Jamersan, LLC
 * Author: William French
 * https://www.jamersan.com | william.french@jamersan.com
 *
 */

namespace Jamersan\GoogleTagManager\Model;

use Magento\Framework\DataObject;

class Customer extends DataObject
{

    /**
     * Customer session
     *
     * @var \Magento\Customer\Model\Session
     */
    protected $_customerSession;

    /**
     * Customer constructor.
     * @param \Magento\Customer\Model\Session $customerSession
     * @param array $data
     */
    public function __construct(
        \Magento\Customer\Model\Session $customerSession,
        array $data = []
    ) {
        $this->_customerSession = $customerSession;
        parent::__construct($data);
    }

    /**
     * Get Customer array
     *
     * @return array
     */
    public function getCustomer()
    {
        if ($this->_customerSession->isLoggedIn()) {
            return [
                'isLoggedIn' => $this->_customerSession->isLoggedIn(),
                'id' => $this->_customerSession->getCustomerId(),
                'groupId' => $this->_customerSession->getCustomerGroupId(),
            ];
        } else {
            return [
                'isLoggedIn' => $this->_customerSession->isLoggedIn(),
            ];
        }
    }
}
