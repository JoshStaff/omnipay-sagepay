<?php

namespace Omnipay\Opayo;

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
    public function createMerchantSessionKey(array $parameters = array())
    {
        return $this->createRequest(ServerRestMerchantSessionKeyRequest::class, $parameters);
    }

    /**
     * Purchase and handling of return from 3D Secure redirection.
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest(ServerRestPurchaseRequest::class, $parameters);
    }

    /**
     * Handle purchase notifcation callback.
     */
    public function complete(array $parameters = array())
    {
        return $this->createRequest(ServerRestCompletePurchaseRequest::class, $parameters);
    }

    /**
     * Get transaction information from Opayo.
     */
    public function getTransaction(array $parameters = array())
    {
        return $this->createRequest(ServerRestRetrieveTransactionRequest::class, $parameters);
    }

    /**
     * Refund request.
     */
    public function refund(array $parameters = array())
    {
        return $this->createRequest(ServerRestRefundRequest::class, $parameters);
    }

    /**
     * Repeat request.
     */
    public function repeat(array $parameters = array())
    {
        return $this->createRequest(ServerRestRepeatRequest::class, $parameters);
    }

    /**
     * Void request.
     */
    public function void(array $parameters = array())
    {
        return $this->createRequest(ServerRestVoidRequest::class, $parameters);
    }
}
