<?php

namespace Omnipay\Solana\Message;

use Omnipay\Common\Message\AbstractRequest as OmnipayAbstractRequest;

abstract class AbstractRequest extends OmnipayAbstractRequest
{
    protected $responseClass = Response::class;

    abstract protected function getEnpoint(): string;

    public function getApiUrl(): string
    {
        return $this->getParameter('api_url');
    }

    public function setApiUrl(string $value): AbstractRequest
    {
        $this->setParameter('api_url', $value);

        return $this;
    }

    /**
     * Validate request parameters
     */
    protected function validateRequest(): void
    {
        //
    }

    /**
     * Get request URL parameters
     *
     * @return array
     */
    protected function getRequestUrlParameters(): array
    {
        return [];
    }

    /**
     * Get request query parameters
     *
     * @return array
     */
    protected function getRequestQueryParameters()
    {
        return [];
    }

    /**
     * Get common request parameters
     *
     * @return array|mixed
     */
    public function getData(): string
    {
        $this->validateRequest();

        $query = http_build_query($this->getRequestQueryParameters(), '', '&');

        return sprintf($this->getEnpoint(), ...$this->getRequestUrlParameters()) . ($query ? '?' . $query : '');
    }

    public function sendData($query)
    {
        $httpResponse = $this->httpClient->request('GET', $this->getApiUrl() . $query);

        return $this->createResponse(json_decode($httpResponse->getBody()->getContents()));
    }

    protected function createResponse($data): Response
    {
        return $this->response = new $this->responseClass($this, $data);
    }
}
