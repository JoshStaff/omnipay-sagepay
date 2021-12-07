<?php

namespace Omnipay\Opayo\Message;

/**
 * Opayo Shared Abort Request
 */
class SharedAbortRequest extends SharedVoidRequest
{
    public function getTxType()
    {
        return static::TXTYPE_ABORT;
    }
}
