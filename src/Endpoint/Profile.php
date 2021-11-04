<?php

namespace Onetoweb\Datatrics\Endpoint;

/**
 * Profile Endpoint.
 * 
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 * @see https://api-docs.datatrics.com/#30c1801b-7bf4-4289-935b-981597da9025
 */
class Profile extends AbstractEndpoint
{
    const RESOURCE = 'profile';
    
    /**
     * @return string
     */
    public function getResource(): string
    {
        return self::RESOURCE;
    }
    
    /**
     * @param string $profileId
     * @param array $query = []
     */
    public function get(string $profileId, array $query = []): array
    {
        return $this->request(parent::METHOD_GET, $profileId, [], $query);
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
     * @param string $profileId
     * @param array $data = []
     */
    public function update(string $profileId, array $data = []): array
    {
        return $this->request(parent::METHOD_PUT, $profileId, $data);
    }
    
    /**
     * @param array $data = []
     */
    public function bulk(array $data = []): ?array
    {
        return $this->request(parent::METHOD_POST, 'bulk', $data);
    }
}