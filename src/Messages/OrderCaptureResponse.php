<?php

namespace Omnipay\PayU\Messages;

use Omnipay\Common\Message\AbstractResponse;

class OrderCaptureResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data['status']['statusCode']) && $this->data['status']['statusCode'] == 'SUCCESS';
    }

    public function getData()
    {
        return parent::getData();
    }
}