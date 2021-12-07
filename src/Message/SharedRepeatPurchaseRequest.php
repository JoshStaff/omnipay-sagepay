<?php

namespace Omnipay\Opayo\Message;

use Omnipay\Common\Helper;

/**
 * Opayo Direct Repeat Authorize Request
 */
class SharedRepeatPurchaseRequest extends SharedRepeatAuthorizeRequest
{
    public function getTxType()
    {
        return static::TXTYPE_REPEAT;
    }
}
