<?php

namespace Onetoweb\Datatrics\Endpoint;

use Onetoweb\Datatrics\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;

/**
 * Abstract Endpoint.
 *
 * @author Jonathan van 't Ende <jvantende@onetoweb.nl>
 * @copyright Onetoweb B.V.
 */
abstract class AbstractEndpoint implements EndpointInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';
    
    /**
     * @var Client
     */
    protected $client;
    
    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    
    /**
     * @param string $endpoint = null
     *
     * @return string
     */
    private function getUrl(string $endpoint = null): string
    {
        return rtrim(implode('/', [
            $this->client->getBaseUri(),
            $this->getResource(),
            $endpoint
        ]), '/');
    }
    
    /**
     * @param string $method
     * @param string $endpoint null
     * @param array $data = []
     * @param array $query = []
     * 
     * @return array|null
     */
    public function request(string $method, string $endpoint = null, array $data = [], array $query = []): ?array
    {
        $options = [
            RequestOptions::HEADERS => [
                'Content-Type' => 'application/json',
                'x-apikey' => $this->client->getApiKey()
            ],
            RequestOptions::QUERY => $query
        ];
        
        if (in_array($method, [self::METHOD_POST, self::METHOD_PUT])) {
            $options[RequestOptions::JSON] = $data;
        }
        
        try {
            
            $response  = (new GuzzleClient())->request($method, $this->getUrl($endpoint), $options);
            
            $contents = $response->getBody()->getContents();
            
            return json_decode($contents, true);
            
        } catch (RequestException $requestException) {
            
            if ($requestException->hasResponse()) {
                
                $contents = $requestException->getResponse()->getBody()->getContents();
                
                return json_decode($contents, true);
            }
            
            return [
                'message' => 'no response'
            ];
        }
    }
}