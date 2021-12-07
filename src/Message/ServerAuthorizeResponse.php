<?php

namespace Omnipay\Opayo\Message;

/**
 * Opayo Server Authorize Response
 */
class ServerAuthorizeResponse extends Response
{
    /**
     * The initial Server response is never complete without
     * redirecting the user.
     *
     * @return bool false
     */
    public function isSuccessful()
    {
        return false;
    }

    /**
     * Only redirect if the status indicates the pre-auth details are acceptable.
     *
     * @return bool
     */
    public function isRedirect()
    {
        return in_array(
            $this->getStatus(),
            [static::OPAYO_STATUS_OK, static::OPAYO_STATUS_OK_REPEATED]
        );
    }

    /**
     * @return string|null URL if present
     */
    public function getRedirectUrl()
    {
        return $this->getDataItem('NextURL');
    }

    /**
     * @return string Always GET
     */
    public function getRedirectMethod()
    {
        return 'GET';
    }

    /**
     * @return array empy array; all the data is in the GET URL
     */
    public function getRedirectData()
    {
        return [];
    }
}
