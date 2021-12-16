<?php

namespace Omnipay\Opayo\Message;

/**
 * Opayo REST Server Merchant Session Key Response
 */
class ServerRestMerchantSessionKeyResponse extends RestResponse
{
    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->getMerchantSessionKey() ?? false;
    }

    /**
     * @return string|null MSK if present
     */
    public function getMerchantSessionKey()
    {
        return $this->getDataItem('merchantSessionKey');
    }
}
