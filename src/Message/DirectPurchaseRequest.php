<?php

namespace Omnipay\Opayo\Message;

/**
 * Opayo Direct Purchase Request
 */
class DirectPurchaseRequest extends DirectAuthorizeRequest
{
    public function getTxType()
    {
        return static::TXTYPE_PAYMENT;
    }
}
