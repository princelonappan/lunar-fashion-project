<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait CallExternalService
{
    public function executeRequest($method, $requestUrl, $formParams = [], $headers = [])
    {
        $params = [
            'query' => $formParams
        ];

        $client = new Client([
            'base_uri'  =>  $this->baseUri,
        ]);
        try {
            $response = $client->request($method, $requestUrl, $params);
            $responseBodyAsString = $response->getBody()->getContents();
            return $responseBodyAsString;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            return $responseBodyAsString;
        }
    }
}
