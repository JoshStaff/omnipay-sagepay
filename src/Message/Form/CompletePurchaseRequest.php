<?php

namespace Omnipay\Opayo\Message\Form;

/**
 * Opayo Form Complete Purchase Response.
 */

class CompletePurchaseRequest extends CompleteAuthorizeRequest
{
    /**
     * @return string the transaction type
     */
    public function getTxType()
    {
        return static::TXTYPE_PAYMENT;
    }
}
