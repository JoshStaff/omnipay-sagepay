<?php

namespace Omnipay\Opayo\Message;

use Omnipay\Opayo\Message\ServerRestRepeatResponse;

/**
 * Opayo REST Server Repeat Request
 */
class ServerRestRepeatRequest extends AbstractRestRequest
{
    public function getService()
    {
        return static::SERVICE_REST_TRANSACTIONS;
    }

    /**
     * @return string the transaction type
     */
    public function getTxType()
    {
        return ucfirst(strtolower(static::TXTYPE_REPEAT));
    }

    /**
     * Add the optional token details to the base data.
     *
     * @return array
     */
    public function getData()
    {
        $data = $this->getBaseData();

        $data['transactionType'] = $this->getTxType();
        $data['vendorTxCode'] = $this->getTransactionId();
        $data['description'] = $this->getDescription();
        $data['amount'] = (int) $this->getAmount();
        $data['currency'] = $this->getCurrency();
        $data['referenceTransactionId'] = $this->getReferenceTransactionId();
        $data['credentialType'] = $this->getCredentialType();

        return $data;
    }

    /**
     * @param array $data
     * @return ServerRestRepeatResponse
     */
    protected function createResponse($data)
    {
        return $this->response = new ServerRestRepeatResponse($this, $data);
    }

    public function getReferenceTransactionId()
    {
        return $this->getParameter('referenceTransactionId');
    }

    public function setReferenceTransactionId($value)
    {
        return $this->setParameter('referenceTransactionId', $value);
    }
}
