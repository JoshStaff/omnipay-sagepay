<?php

namespace Omnipay\Opayo\Message;

class ServerRestCaptureRequest extends AbstractRestRequest
{
    public function getService()
    {
        return static::SERVICE_REST_INSTRUCTIONS;
    }

    public function getParentService()
    {
        return static::SERVICE_REST_TRANSACTIONS;
    }

    /**
     * @return string the transaction type
     */
    public function getTxType()
    {
        return ucfirst(strtolower(static::TXTYPE_RELEASE));
    }

    /**
     * Instruction data.
     *
     * @return array
     */
    public function getData()
    {
        return [
            'instructionType ' => $this->getTxType(),
            'amount' => $this->getAmountInteger(),
        ];
    }

    public function getParentServiceReference()
    {
        return $this->getParameter('transactionId');
    }

    /**
     * @param array $data
     * @return ServerRestInstructionResponse
     */
    protected function createResponse($data)
    {
        return $this->response = new ServerRestInstructionResponse($this, $data);
    }
}
