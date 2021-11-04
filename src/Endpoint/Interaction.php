<?php

namespace Onetoweb\Datatrics\Endpoint;

/**
 * Interaction Endpoint.
 * 
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 * @see https://api-docs.datatrics.com/#87ad62e2-5813-4b6b-bbd5-8b4a2cc2ab56
 */
class Interaction extends AbstractEndpoint
{
    const RESOURCE = 'interaction';
    
    /**
     * @return string
     */
    public function getResource(): string
    {
        return self::RESOURCE;
    }
    
    /**
     * @param string $interactionId
     * @param array $query = []
     */
    public function get(string $interactionId, array $query = []): array
    {
        return $this->request(parent::METHOD_GET, $interactionId, [], $query);
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