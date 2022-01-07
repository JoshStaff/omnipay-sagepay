<?php

namespace Omnipay\Opayo\Message;

/**
 * Opayo REST Server Complete Response
 */
class ServerRestCompleteResponse extends RestResponse
{
    /**
     *
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->get3DSecureStatus() === static::REST_3DSECURE_STATUS_AUTHENTICATED
            || $this->getStatus() === static::OPAYO_STATUS_AUTHENTICATED;
    }
}
