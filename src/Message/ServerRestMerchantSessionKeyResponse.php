<?php

namespace Omnipay\SagePay\Message;

/**
 * Sage Pay REST Server Merchant Session Key  Response
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

    /**
     * @return string|null Expiry date/time in ISO-8601 format, if present
     */
    public function getExpiry()
    {
        return $this->getDataItem('expiry');
    }
}
