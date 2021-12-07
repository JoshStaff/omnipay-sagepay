<?php

namespace Omnipay\Opayo\Message;

/**
 * Opayo REST Server Purchase Request
 */
class ServerRestAuthorizeRequest extends ServerRestPurchaseRequest
{
    public function getTxType()
    {
        return ucfirst(strtolower(static::TXTYPE_DEFERRED));
    }
}
