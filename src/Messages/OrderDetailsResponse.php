<?php

namespace Omnipay\PayU\Messages;

use Omnipay\Common\Message\AbstractResponse;

class OrderDetailsResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return 'COMPLETED' === $this->getStatus();
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->getData('orderId');
    }

    /**
     * @return string
     */
    public function getExtOrderId()
    {
        return $this->getData('extOrderId');
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return new \DateTime($this->getData('orderCreateDate'));
    }

    /**
     * @return string
     */
    public function getNotifyUrl()
    {
        return $this->getData('notifyUrl');
    }

    /**
     * @return string
     */
    public function getCustomerIp()
    {
        return $this->getData('customerIp');
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->getData('currencyCode');
    }

    /**
     * @return string
     */
    public function getTotalAmount()
    {
        return $this->getData('totalAmount');
    }

    /**
     * @return array
     */
    public function getBuyer()
    {
        return $this->getData('buyer');
    }

    /**
     * @return string
     */
    public function getPayMethod()
    {
        return $this->getData('payMethod')['type'] ?? '';
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getData('status');
    }

    /**
     * @return string|array
     */
    public function getProducts()
    {
        return $this->getData('products');
    }

    public function getData(string $key = null){
        $order = $this->data['orders'][0];

        if (!empty($key)){
            return $order[$key] ?? '';
        }

        return $order;
    }
}