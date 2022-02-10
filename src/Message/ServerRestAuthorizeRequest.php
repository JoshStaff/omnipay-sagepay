<?php

namespace Omnipay\SagePay\Message;

/**
 * Opayo REST Server Purchase Request
 */
class ServerRestAuthorizeRequest extends ServerRestPurchaseRequest
{
    public function getTxType()
    {
        return ucfirst(strtolower(static::TXTYPE_DEFERRED));
    }

    /**
     * @param array $data
     * @return ServerRestAuthorizeResponse
     */
    protected function createResponse($data)
    {
        return $this->response = new ServerRestAuthorizeResponse($this, $data);
    }
}
