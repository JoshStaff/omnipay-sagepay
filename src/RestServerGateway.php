<?php

namespace Omnipay\Opayo;

use Omnipay\Opayo\Message\ServerRestAuthorizeRequest;
use Omnipay\Opayo\Message\ServerRestCaptureRequest;
use Omnipay\Opayo\Message\ServerRestCompletePurchaseRequest;
use Omnipay\Opayo\Message\ServerRestMerchantSessionKeyRequest;
use Omnipay\Opayo\Message\ServerRestPurchaseRequest;
use Omnipay\Opayo\Message\ServerRestRefundRequest;
use Omnipay\Opayo\Message\ServerRestRepeatRequest;
use Omnipay\Opayo\Message\ServerRestRetrieveTransactionRequest;
use Omnipay\Opayo\Message\ServerRestVoidRequest;

/**
 * Opayo Rest Server Gateway
 */
class RestServerGateway extends ServerGateway
{
    public function getName()
    {
        return 'Opayo REST Server';
    }

    public function getUsername()
    {
        return $this->getParameter('username');
    }

    public function setUsername($value)
    {
        return $this->setParameter('username', $value);
    }

    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    /**
     * Create merchant session key (MSK).
     */
    public function createMerchantSessionKey(array $parameters = [])
    {
        return $this->createRequest(ServerRestMerchantSessionKeyRequest::class, $parameters);
    }

    /**
     * Authorize is similar to purchase except that the transaction is deferred - a "shadow" transaction is placed on
     * the customer's card to reserve the funds needed to make payment, but the money is not actually transferred. The
     * transaction must then be captured ("released" in Opayo terminology) to actually take the money.
     *
     * Opayo will automatically abort any deferred transactions that have not been released after 30 days. However, some
     * card providers may remove the shadow after 6 days so that the customer can spend those funds elsewhere. You can
     * also manually abort a deferred transaction if you are unable to fulfil the purchase.
     */
    public function authorize(array $parameters = [])
    {
        return $this->createRequest(ServerRestAuthorizeRequest::class, $parameters);
    }

    /**
     * Take payment for ("release") a previously deferred transaction. You can specify an amount to capture up to and
     * including the original amount of the deferred transaction, but no more. Whether the full amount is captured or
     * not, only a single release can occur against each deferred transaction, after which the transaction is closed.
     * You may not perform a partial capture and then come back and attempt to take the rest of the money.
     */
    public function capture(array $parameters = [])
    {
        return $this->createRequest(ServerRestCaptureRequest::class, $parameters);
    }

    /**
     * Purchase and handling of return from 3D Secure redirection.
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest(ServerRestPurchaseRequest::class, $parameters);
    }

    /**
     * Handle purchase notification callback.
     */
    public function complete(array $parameters = [])
    {
        return $this->createRequest(ServerRestCompletePurchaseRequest::class, $parameters);
    }

    /**
     * Get transaction information from Opayo.
     */
    public function getTransaction(array $parameters = [])
    {
        return $this->createRequest(ServerRestRetrieveTransactionRequest::class, $parameters);
    }

    /**
     * Refund request.
     */
    public function refund(array $parameters = [])
    {
        return $this->createRequest(ServerRestRefundRequest::class, $parameters);
    }

    /**
     * Repeat request.
     */
    public function repeat(array $parameters = [])
    {
        return $this->createRequest(ServerRestRepeatRequest::class, $parameters);
    }

    /**
     * Void request.
     */
    public function void(array $parameters = [])
    {
        return $this->createRequest(ServerRestVoidRequest::class, $parameters);
    }
}
