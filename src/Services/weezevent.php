<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;


/***
 * 
 * Class which allows you to manage the api with Weezevent
 * 
 */
class weezevent
{
    private HttpClientInterface $client;
    private string $token;
    private string $username;
    private string $password;
    private string $apiKey;

    public function __construct(HttpClientInterface $client, string $username, string $password, string $key)
    {
        $this->client = $client;
        $this->token = $this->fetchToken();
        $this->username = $username;
        $this->password = $password;
        $this->apiKey = $key;
    }

    /**
     * Fetch all customer via API with Weezevent
     *
     * @return array customer
     */
    public function fetchCustomerList(): array
    {
        $baseUrl = 'https://api.weezevent.com/participant/list?api_key=4af7c955bdb1fb64c42597994b0a8cf5&access_token=' . $this->token . '&id_event[]=1146829&full=1';
        
        try { 
            $response = $this->client->request(
                'GET',
                $baseUrl);
    
            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Erreur lors de la récupération de la liste');
            }
            $content = $response->toArray();
            return $content;

            } catch (\Exception $e) {
                return new Response('Erreur : ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

    }

    /**
     * Fetch all kind of ticket via API with Weezevent
     *
     * @return array tickets
     */
    public function fetchTicketList(): array
    {
        $baseUrl = 'https://api.weezevent.com/tickets?api_key=4af7c955bdb1fb64c42597994b0a8cf5&access_token=' . $this->token . '&id_event[]=1146829&full=1';
        
        try {
            $response = $this->client->request(
                'GET',
                $baseUrl);
    
            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Erreur lors de la récupération de la liste');
            }

            $content = $response->toArray();

            $ticketList = [];
            foreach ($content['events'] as $event) {
                foreach ($event['categories'] as $category  ) {

                    $tabTicketsCount = count($category['tickets']);
                    
                    for ($j = 1; $j < $tabTicketsCount; $j++){
                        $ticket = $category['tickets'][$j];
                        $ticketList[$ticket['id']] = $ticket['name'];
                    }

                }
            }

            return $ticketList;

            } catch (\Exception $e) {
                return new Response('Erreur : ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
            }

    }

    /**
     * Generate a token
     *
     * @return string token
     */
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