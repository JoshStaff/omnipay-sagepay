<?php

namespace Omnipay\Opayo\Message;

/**
 * Opayo REST Server Complete Response
 */
class ServerRestCompleteResponse extends RestResponse
{
    /**
     * For 3DSv2, this returns true only if the transaction was authorised by the card issuer and the 3DSecure status is
     * one that could generally be considered safe to proceed. Depending on how much liability you wish to accept, you
     * might prefer to explicitly check the 3DSecure status and handle some of them differently.
     *
     * For the 3DSv1 fallback, a true result here only means that the cardholder successfully authenticated. You will
     * need to perform a separate request to retrieve the transaction and confirm that it was actually authorised by the
     * card issuer.
     *
     * @return bool
     */
    public function isSuccessful()
    {
        return parent::isSuccessful() && in_array($this->get3DSecureStatus(), [
            null,
            static::REST_3DSECURE_STATUS_AUTHENTICATED,
            static::REST_3DSECURE_STATUS_NOT_CHECKED,
            static::REST_3DSECURE_STATUS_CARD_NOT_ENROLLED,
            static::REST_3DSECURE_STATUS_ISSUER_NOT_ENROLLED,
        ]);
    }
}
