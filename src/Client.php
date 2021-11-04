<?php

namespace Onetoweb\Datatrics;

/**
 * Client.
 * 
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 * 
 * @see https://api-docs.datatrics.com/
 */
class Client
{
    const BASE_HREF = 'https://api.datatrics.com';
    const VERSION = '2.0';
    
    /**
     * @var string
     */
    private $apiKey;
    
    /**
     * @var int
     */
    private $projectId;
    
    /**
     * @var string
     */
    private $version;
    
    /**
     * @param string $apiKey
     * @param int $projectId
     * @param string $version = self::VERSION
     */
    public function __construct(string $apiKey, int $projectId, string $version = self::VERSION)
    {
        $this->apiKey = $apiKey;
        $this->projectId = $projectId;
        $this->version = $version;
        
        $this->initializeEndpoints();
    }
    
    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }
    
    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }
    
    /**
     * @return string
     */
    public function getBaseUri(): string
    {
        return self::BASE_HREF . '/' . $this->version . '/project/' . $this->projectId;
    }
    
    /**
     * Initialize endpoints.
     */
    private function initializeEndpoints()
    {
        $this->content = new Endpoint\Content($this);
        $this->sale = new Endpoint\Sale($this);
        $this->profile = new Endpoint\Profile($this);
        $this->interaction = new Endpoint\Interaction($this);
    }
}