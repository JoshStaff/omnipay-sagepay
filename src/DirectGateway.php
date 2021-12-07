<?php

namespace Omnipay\Opayo;

use Omnipay\Opayo\Message\DirectAuthorizeRequest;
use Omnipay\Opayo\Message\DirectCompleteAuthorizeRequest;
use Omnipay\Opayo\Message\DirectPurchaseRequest;
use Omnipay\Opayo\Message\SharedCaptureRequest;
use Omnipay\Opayo\Message\SharedVoidRequest;
use Omnipay\Opayo\Message\SharedAbortRequest;
use Omnipay\Opayo\Message\SharedRefundRequest;
use Omnipay\Opayo\Message\SharedRepeatAuthorizeRequest;
use Omnipay\Opayo\Message\SharedRepeatPurchaseRequest;
use Omnipay\Opayo\Message\DirectTokenRegistrationRequest;
use Omnipay\Opayo\Message\SharedTokenRemovalRequest;

/**
 * Opayo Direct Gateway
 */

class DirectGateway extends AbstractGateway
{
    // Gateway identification.

    public function getName()
    {
        return 'Opayo Direct';
    }

    /**
     * Direct methods.
     */

    /**
     * Authorize and handling of return from 3D Secure or PayPal redirection.
     */
    public function authorize(array $parameters = [])
    {
        return $this->createRequest(DirectAuthorizeRequest::class, $parameters);
    }

    public function completeAuthorize(array $parameters = [])
    {
        return $this->createRequest(DirectCompleteAuthorizeRequest::class, $parameters);
    }

    /**
     * Purchase and handling of return from 3D Secure or PayPal redirection.
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest(DirectPurchaseRequest::class, $parameters);
    }

    public function completePurchase(array $parameters = [])
    {
        return $this->completeAuthorize($parameters);
    }

    /**
     * Shared methods (identical for Direct and Server).
     */

    /**
     * Capture an authorization.
     */
    public function capture(array $parameters = [])
    {
        return $this->createRequest(SharedCaptureRequest::class, $parameters);
    }

    /**
     * Void a paid transaction.
     */
    public function void(array $parameters = [])
    {
        return $this->createRequest(SharedVoidRequest::class, $parameters);
    }

    /**
     * Abort an authorization.
     */
    public function abort(array $parameters = [])
    {
        return $this->createRequest(SharedAbortRequest::class, $parameters);
    }

    /**
     * Void a completed (captured) transation.
     */
    public function refund(array $parameters = [])
    {
        return $this->createRequest(SharedRefundRequest::class, $parameters);
    }

    /**
     * Create a new authorization against a previous payment.
     */
    public function repeatAuthorize(array $parameters = [])
    {
        return $this->createRequest(SharedRepeatAuthorizeRequest::class, $parameters);
    }

    /**
     * Create a new purchase against a previous payment.
     */
    public function repeatPurchase(array $parameters = [])
    {
        return $this->createRequest(SharedRepeatPurchaseRequest::class, $parameters);
    }

    /**
     * Accept card details from a user and return a token, without any
     * authorization against that card.
     * i.e. standalone token creation.
     * Standard Omnipay function.
     */
    public function createCard(array $parameters = [])
    {
        return $this->registerToken($parameters);
    }

    /**
     * Accept card details from a user and return a token, without any
     * authorization against that card.
     * i.e. standalone token creation.
     */
    public function registerToken(array $parameters = [])
    {
        return $this->createRequest(DirectTokenRegistrationRequest::class, $parameters);
    }

    /**
     * Remove a card token from the account.
     * Standard Omnipay function.
     */
    public function deleteCard(array $parameters = [])
    {
        return $this->removeToken($parameters);
    }

    /**
     * Remove a card token from the account.
     */
    public function removeToken(array $parameters = [])
    {
        return $this->createRequest(SharedTokenRemovalRequest::class, $parameters);
    }

    /**
     * @deprecated use repeatAuthorize() or repeatPurchase()
     */
    public function repeatPayment(array $parameters = [])
    {
        return $this->createRequest(SharedRepeatPurchaseRequest::class, $parameters);
    }
}
