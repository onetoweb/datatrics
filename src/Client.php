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
    public const BASE_HREF = 'https://api.datatrics.com';
    public const VERSION = '2.0';
    
    /**
     * @param string $apiKey
     * @param int $projectId
     * @param string $version = self::VERSION
     */
    public function __construct(
        
        #[\SensitiveParameter]
        private string $apiKey,
        
        #[\SensitiveParameter]
        private int $projectId,
        
        private string $version = self::VERSION
    ) {
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
