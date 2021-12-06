<?php

namespace Omnipay\Opayo;

use Omnipay\Opayo\Message\Form\AuthorizeRequest;
use Omnipay\Opayo\Message\Form\CompleteAuthorizeRequest;
use Omnipay\Opayo\Message\Form\CompletePurchaseRequest;
use Omnipay\Opayo\Message\Form\PurchaseRequest;

/**
 * Opayo Server Gateway
 */
class FormGateway extends AbstractGateway
{
    public function getName()
    {
        return 'Opayo Form';
    }

    /**
     * Authorize a payment.
     */
    public function authorize(array $parameters = array())
    {
        return $this->createRequest(AuthorizeRequest::class, $parameters);
    }

    /**
     * Authorize and capture a payment.
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    /**
     *
     */
    public function completeAuthorize(array $parameters = array())
    {
        return $this->createRequest(CompleteAuthorizeRequest::class, $parameters);
    }

    /**
     *
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest(CompletePurchaseRequest::class, $parameters);
    }
}
