<?php

namespace App\Services;

use GuzzleHttp\Client;

class PushAll
{
    /**
     * @var string
     */
    private string $apiUrl = 'https://pushall.ru/api.php';

    /**
     * @param string|null $apiKey
     * @param string|null $id
     */
    public function __construct(
        private ?string $apiKey,
        private ?string $id
    )
    {
    }

    /**
     * @param string $title
     * @param string $text
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send(string $title, string $text): \Psr\Http\Message\ResponseInterface
    {
        $client = new Client();

        return $client->post($this->apiUrl, [
            'form_params' => [
                'type' => 'self',
                'id' => $this->id,
                'key' => $this->apiKey,
                'text' => $text,
                'title' => $title
            ]
        ]);
    }

}
