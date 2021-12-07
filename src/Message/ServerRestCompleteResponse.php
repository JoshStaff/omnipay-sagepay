<?php

namespace Omnipay\Opayo\Message;

/**
 * Opayo REST Server Complete Response
 */
class ServerRestCompleteResponse extends RestResponse
{
    /**
     *
     * @return bool false
     */
    public function isSuccessful()
    {
        return strtoupper($this->get3DSecureStatus() ?? $this->getStatus()) === static::OPAYO_STATUS_AUTHENTICATED;
    }
}
