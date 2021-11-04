<?php

namespace Onetoweb\Datatrics\Endpoint;

/**
 * Sale Endpoint.
 * 
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 * @see https://api-docs.datatrics.com/#2526b901-f5ec-4a86-a49e-5f87c4a89d73
 */
class Sale extends AbstractEndpoint
{
    const RESOURCE = 'sale';
    
    /**
     * @return string
     */
    public function getResource(): string
    {
        return self::RESOURCE;
    }
    
    /**
     * @param string $conversionId
     * @param array $query = []
     */
    public function get(string $conversionId, array $query = []): array
    {
        return $this->request(parent::METHOD_GET, $conversionId, [], $query);
    }
    
    /**
     * @param array $query = []
     */
    public function list(array $query = []): array
    {
        return $this->request(parent::METHOD_GET, null, [], $query);
    }
    
    /**
     * @param array $data = []
     */
    public function create(array $data = []): array
    {
        return $this->request(parent::METHOD_POST, null, $data);
    }
    
    /**
     * @param array $data = []
     */
    public function bulk(array $data = []): array
    {
        return $this->request(parent::METHOD_POST, 'bulk', $data);
    }
}