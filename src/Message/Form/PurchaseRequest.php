<?php

namespace Omnipay\Opayo\Message\Form;

/**
 * Opayo Direct Purchase Request
 */
class PurchaseRequest extends AuthorizeRequest
{
    public function getTxType()
    {
        return static::TXTYPE_PAYMENT;
    }
}
