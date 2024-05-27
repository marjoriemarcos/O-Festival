<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class weezevent
{
    private HttpClientInterface $client;
    private string $token;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
        $this->token = $this->fetchToken();
    }

    public function fetchTicketList(): array
    {
        $baseUrl = 'https://api.weezevent.com/participant/list?api_key=4af7c955bdb1fb64c42597994b0a8cf5&access_token=' . $this->token . '&id_event[]=1146829';
        
        $response = $this->client->request(
            'GET',
            $baseUrl);

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
        return $content;
    }

    public function fetchToken (): string
    {
        try {

            $response = $this->client->request(
                'POST',
                'https://api.weezevent.com/auth/access_token', [
                    'query' => [
                        'username' => 'marjorie.marcos@oclock.school',
                        'password' => '.ybqeN3VAL2bd!H',
                        'api_key' => '4af7c955bdb1fb64c42597994b0a8cf5',
                    ],
                ]);

                if ($response->getStatusCode() !== 200) {
                    throw new \Exception('Erreur lors de la récupération du token');
                }
    
                $tokenData = $response->toArray();
                $token = $tokenData['accessToken'];
    
            return $token;

        } catch (\Exception $e) {
            return new Response('Erreur : ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}