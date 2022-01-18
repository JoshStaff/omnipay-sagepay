<?php

namespace Omnipay\Opayo\Message;

class ServerRestAbortRequest extends AbstractRestRequest
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
     * Instruction data.
     *
     * @return array
     */
    public function getData()
    {
        return [
            'instructionType' => static::INSTRUCTION_TYPE_ABORT,
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
