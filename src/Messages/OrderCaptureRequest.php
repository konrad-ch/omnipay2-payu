<?php
namespace Omnipay\PayU\Messages;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\ResponseInterface;

class OrderCaptureRequest extends AbstractRequest
{
    public function setAccessToken($accessToken)
    {
        $this->setParameter('accessToken', $accessToken);
    }

    public function setApiUrl($apiUrl)
    {
        $this->setParameter('apiUrl', $apiUrl);
    }

    /**
     * @param  mixed $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        $headers = [
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
            'Authorization' => $data['accessToken']
        ];
        $url = $data['apiUrl'] . '/api/v2_1/orders/' . urlencode($this->getTransactionReference()) . '/status';
        $httpRequest = $this->httpClient->put($url, $headers, json_encode([
            "orderId" => $this->getTransactionReference(),
            "orderStatus" => "COMPLETED"
        ]));
        $httpResponse = $httpRequest->send();

        $response = new OrderCaptureResponse($this, $httpResponse->json());

        var_dump($response->getData());

        return $this->response = $response;
    }

    public function getData()
    {
        return $this->getParameters();
    }
}