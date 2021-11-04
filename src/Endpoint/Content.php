<?php

namespace Onetoweb\Datatrics\Endpoint;

/**
 * Content Endpoint.
 * 
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 * @see https://api-docs.datatrics.com/#e8689e06-ddcb-42b7-bb6b-1da43650a421
 */
class Content extends AbstractEndpoint
{
    const RESOURCE = 'content';
    
    /**
     * @return string
     */
    public function getResource(): string
    {
        return self::RESOURCE;
    }
    
    /**
     * @param string $contentId
     * @param array $query = []
     */
    public function get(string $contentId, array $query = []): array
    {
        return $this->request(parent::METHOD_GET, $contentId, [], $query);
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
     * @param array $query = []
     */
    public function create(array $data = [], array $query = []): array
    {
        return $this->request(parent::METHOD_POST, null, $data, $query);
    }
    
    /**
     * @param string $contentId
     * @param array $data = []
     * @param array $query = []
     */
    public function update(string $contentId, array $data = [], array $query = []): array
    {
        return $this->request(parent::METHOD_PUT, $contentId, $data, $query);
    }
    
    /**
     * @param array $data = []
     * @param array $query = []
     */
    public function bulk(array $data = [], array $query = []): array
    {
        return $this->request(parent::METHOD_POST, 'bulk', $data, $query);
    }
    
    /**
     * @param string $contentId
     * @param array $data = []
     */
    public function delete(string $contentId, array $query = []): ?array
    {
        return $this->request(parent::METHOD_DELETE, $contentId, [], $query);
    }
}