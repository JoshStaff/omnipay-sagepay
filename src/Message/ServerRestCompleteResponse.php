<?php

namespace Omnipay\SagePay\Message;

/**
 * Sage Pay REST Server Complete Response
 */
class ServerRestCompleteResponse extends RestResponse
{
    /**
     * For 3DSv2, this returns true if the transaction has been authorised by the card issuer, which will only happen if
     * either the cardholder successfully authenticated or Opayo has processed the transaction through the 3DS rules on
     * your account and determined that it could be submitted for authorisation. The actual 3DSecure status is not taken
     * into account here as the Opayo rules engine should handle each status appropriately, but you if you wish to check
     * the status and implement your own rules around it, you can call get3DSecureStatus() on the response.
     *
     * For the 3DSv1 fallback, a true result here only means that the cardholder successfully authenticated. You will
     * need to perform a separate request to retrieve the transaction and confirm that it was actually authorised by the
     * card issuer. It is advisable to make this second request even if this method returns false, because the rules on
     * your Opayo account may have caused the transaction to be submitted for authorisation even if the authentication
     * was not successful.
     *
     * @return bool
     */
    public function isSuccessful()
    {
        return parent::isSuccessful();
    }
}
