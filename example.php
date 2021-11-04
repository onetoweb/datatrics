<?php

require 'vendor/autoload.php';

use Onetoweb\Datatrics\Client;

// params
$apiKey = 'api_key';
$projectId = 42;

// get client
$client = new Client($apiKey, $projectId);

// get profiles
$profiles = $client->profile->list([
    'page' => 1
]);

// get profile
$profileId = '1234';
$source = 'twitter';
$profile = $client->profile->get($profileId, ['source' => $source]);

// create profile
$profile = $client->profile->create([
    'profileid' => '1234',
    'source' => 'twitter',
    'profile' => [
        'name' => 'Example Profile',
        'firstname' => 'Example',
        'lastname' => 'Profile',
        'email' => 'example@profile.com',
        'country' => 'The Netherlands',
        'created' => '2018-01-01 12:00:00',
        'updated' => '2018-01-02 13:41:21'
    ]
]);

// update profile
$profileId = '1234';
$profile = $client->profile->update($profileId, [
    'profileid' => $profileId,
    'source' => 'twitter',
    'profile' => [
        'name' => 'Example Profile (updated)',
        'firstname' => 'Example',
        'lastname' => 'Profile',
        'email' => 'example@profile.com',
        'country' => 'The Netherlands',
        'created' => '2018-01-01 12:00:00',
        'updated' => '2018-01-02 13:41:21'
    ]
]);

// bulk create / update profile
$profiles = $client->profile->bulk([
    'profiles' => [
        [
            'profileid' => '1234',
            'source' => 'twitter',
            'profile' => [
                'name' => 'Example Profile (bulk updated)',
                'firstname' => 'Example',
                'lastname' => 'Profile',
                'email' => 'example@profile.com',
                'country' => 'The Netherlands',
                'created' => '2018-01-01 12:00:00',
                'updated' => '2018-01-02 13:41:21'
            ]
        ], [
            'profileid' => '1235',
            'source' => 'twitter',
            'profile' => [
                'name' => 'Example Profile 2 (bulk created)',
                'firstname' => 'Example 2',
                'lastname' => 'Profile 2',
                'email' => 'example2@profile.com',
                'country' => 'The Netherlands',
                'created' => '2018-01-01 12:00:00',
                'updated' => '2018-01-02 13:41:21'
            ]
        ]
    ]
]);

// get content list
$contents = $client->content->list(['type' => 'item']);

// get content
$contentId = '1234';
$content = $client->content->get($contentId, [
    'type' => 'item',
    'source' => 'ExampleCRM'
]);

// create content
$content = $client->content->create([
    'itemid' => '1234',
    'source' => 'ExampleCRM',
    'item' => [
        'name' => 'Example content',
        'description' => 'Example content description',
        'short_description' => 'Example content short description',
        'url' => 'https://example.com/product/1234',
        'created' => '2018-06-01 02:14:55',
        'updated' => '2018-06-01 02:14:55',
        'image' => 'https://example.com/images/product-1234'
    ]
], [
    'type' => 'item'
]);

// update content
$contentId = '1234';
$content = $client->content->update($contentId, [
    'itemid' => $contentId,
    'source' => 'ExampleCRM',
    'item' => [
        'name' => 'Example content (updated)',
        'description' => 'Example content description',
        'short_description' => 'Example content short description',
        'url' => 'https://example.com/product/1234',
        'created' => '2018-06-01 02:14:55',
        'updated' => '2018-06-01 02:14:55',
        'image' => 'https://example.com/images/product-1234'
    ]
], [
    'type' => 'item'
]);

// bulk create / update contents
$contents = $client->content->bulk([
    'items' => [
        [
            'itemid' => '1234',
            'source' => 'ExampleCRM',
            'item' => [
                'name' => 'Example content (bulk updated)',
                'description' => 'Example content description',
                'short_description' => 'Example content short description',
                'url' => 'https://example.com/product/1234',
                'created' => '2018-06-01 02:14:55',
                'updated' => '2018-06-01 02:14:55',
                'image' => 'https://example.com/images/product-1234'
            ]
        ], [
            'itemid' => '1235',
            'source' => 'ExampleCRM',
            'item' => [
                'name' => 'Example content 2 (bulk created)',
                'description' => 'Example content description 2',
                'short_description' => 'Example content short description 2',
                'url' => 'https://example.com/product/1234',
                'created' => '2018-06-01 02:14:55',
                'updated' => '2018-06-01 02:14:55',
                'image' => 'https://example.com/images/product-1234'
            ]
        ]
    ]
], [
    'type' => 'items'
]);

// delete content
$contentId = '1235';
$client->content->delete($contentId, [
    'source' => 'ExampleCRM',
    'type' => 'item',
]);

// get conversion
$conversionId = '1';
$conversion = $client->sale->get($conversionId, [
    'source' => 'ExampleCRM'
]);

// get conversions
$conversions = $client->sale->list([
    'page' => 1,
]);

// create conversion
$conversion = $client->sale->create([
    'conversionid' => '1',
    'source' => 'ExampleCRM',
    'conversion' => [
        'created' => '2018-10-20 09:00:00',
        'updated' => '2018-10-20 09:11:12',
        'profileid' => '1234',
        'email' => 'example@profile.com',
        'total' => 19.99,
        'items' => [
            [
                'itemid' => '123',
                'name' => 'Example Product',
                'price' => 19.99,
                'quantity' => 1,
                'total' => 19.99
            ], [
                'itemid' => '124',
                'name' => 'Example Product 2',
                'price' => 19.99,
                'quantity' => 1,
                'total' => 19.99
            ]
        ]
    ]
]);

// bulk create / update conversions
$conversions = $client->sale->bulk([
    'items' => [
        [
            'conversionid' => '1',
            'source' => 'ExampleCRM',
            'conversion' => [
                'created' => '2018-10-20 09:00:00',
                'updated' => '2018-10-20 09:11:12',
                'profileid' => '1234',
                'email' => 'example@profile.com',
                'total' => 39.98,
                'items' => [
                    [
                        'itemid' => '123',
                        'name' => 'Example Product',
                        'price' => 19.99,
                        'quantity' => 1,
                        'total' => 19.99
                    ], [
                        'itemid' => '124',
                        'name' => 'Example Product 2',
                        'price' => 19.99,
                        'quantity' => 1,
                        'total' => 19.99
                    ]
                ]
            ]
        ], [
            'conversionid' => '2',
            'source' => 'ExampleCRM',
            'conversion' => [
                'created' => '2018-10-20 09:00:00',
                'updated' => '2018-10-20 09:11:12',
                'profileid' => '1234',
                'email' => 'example@profile.com',
                'total' => 19.99,
                'items' => [
                    [
                        'itemid' => '123',
                        'name' => 'Example Product',
                        'price' => 19.99,
                        'quantity' => 1,
                        'total' => 19.99
                    ]
                ]
            ]
        ]
    ]
]);

// get interaction
$interactionId = '1';
$interaction = $client->interaction->get($interactionId, [
    'source' => 'ExampleESP'
]);

// get interactions
$interactions = $client->interaction->list([
    'page' => 1,
]);

// create interaction
$interaction = $client->interaction->create([
    'interactionid' => '1',
    'source' => 'ExampleESP',
    'objecttype' => 'interaction',
    'interaction' => [
        'datetime' => '2020-03-23 09:51:31',
        'profileid' => '1234',
        'event' => 'open',
        'emailid' => '987654321'
    ]
]);

// bulk create / update interactions
$interactions = $client->interaction->bulk([
    'interactions' => [
        [
            'interactionid' => '1',
            'source' => 'ExampleESP',
            'objecttype' => 'interaction (bulk updated)',
            'interaction' => [
                'datetime' => '2020-03-23 09:51:31',
                'profileid' => '1234',
                'event' => 'open',
                'emailid' => '987654321'
            ]
        ], [
            'interactionid' => '2',
            'source' => 'ExampleESP',
            'objecttype' => 'interaction 2 (bulk created)',
            'interaction' => [
                'datetime' => '2020-03-23 09:51:31',
                'profileid' => '1234',
                'event' => 'open',
                'emailid' => '987654321'
            ]
        ]
    ]
]);
