<?php

namespace Omnipay\Solana\Message;

class FetchTransactionRequest extends AbstractRequest
{
    protected function getEnpoint(): string
    {
        return '/transaction/%s';
    }

    protected function validateRequest(): void
    {
        $this->validate('transactionReference');
    }

    protected function getRequestUrlParameters(): array
    {
        return [
            $this->getTransactionReference()
        ];
    }
}
