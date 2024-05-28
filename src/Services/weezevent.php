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
    private string $login = '';
    private string $passwrd = '';
    private string $apiKey = '';
    private string $idEvent = '';

    public function __construct(HttpClientInterface $client, string $username, string $password, string $key, string $event)
    {
        $this->client = $client;
        $this->login = $username;
        $this->passwrd = $password;
        $this->apiKey = $key;
        $this->idEvent = $event;
        $this->token = $this->fetchToken();
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
                        'username' => $this->login,
                        'password' => $this->passwrd,
                        'api_key' =>  $this->apiKey,
                    ],
                ]);

                if ($response->getStatusCode() !== 200) {
                    throw new \Exception('Erreur lors de la récupération du token');
                }

                $tokenData = $response->toArray();

                if (!isset($tokenData['accessToken'])) {
                    throw new \Exception('La clé "accessToken" est manquante dans la réponse');
                }
                ;
                return $tokenData['accessToken'];
    
        } catch (\Exception $e) {
            return new Response('Erreur : ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Fetch all customer via API with Weezevent
     *
     * @return array customer
     */
    public function fetchCustomerList(): array
    {
        $baseUrl = 'https://api.weezevent.com/participant/list?api_key=' . $this->apiKey . '&access_token=' . $this->token . '&id_event[]=' . $this->idEvent . '&full=1';
        
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
                throw new \Exception('Erreur lors de la récupération de la liste des clients: ' . $e->getMessage());
            }

    }

    /**
     * Fetch all kind of ticket via API with Weezevent
     *
     * @return array tickets
     */
    public function fetchTicketList(): array
    {
        $baseUrl = 'https://api.weezevent.com/tickets?api_key=' . $this->apiKey . '&access_token=' . $this->token . '&id_event[]=' . $this->idEvent . '&full=1';
        
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
                throw new \Exception('Erreur lors de la récupération de la liste des tickets: ' . $e->getMessage());
            }

    }


}