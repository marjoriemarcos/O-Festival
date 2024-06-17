<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/***
 * 
 * Class which allows you to manage the API with Weezevent
 * 
 */
class Weezevent
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
     * Generate a token and
     *
     * @return string token
     */
    public function fetchToken (): string
    {
        try {
            // Connect to the API to generate a token with the information provided in the .env.local file + service.yaml
            $response = $this->client->request(
                'POST',
                'https://api.weezevent.com/auth/access_token', [
                    'query' => [
                        'username' => $this->login,
                        'password' => $this->passwrd,
                        'api_key' =>  $this->apiKey,
                    ],
                ]);

                // If the status is different from 200, throw an exception
                if ($response->getStatusCode() !== 200) {
                    throw new \Exception('Error while retrieving the token');
                }

                // Store the response in a variable
                $tokenData = $response->toArray();

                // If there is no token in the array, throw an exception
                if (!isset($tokenData['accessToken'])) {
                    throw new \Exception('The key "accessToken" is missing in the response');
                };

                // Return the token
                return $tokenData['accessToken'];
    

        } catch (\Exception $e) {
            return new Response('Error: ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Fetch all customers via API with Weezevent
     *
     * @return array customers
     */
    public function fetchCustomerList(): array
    {
        // Customize the URL with the requested information: API key, token, and Event ID
        $baseUrl = 'https://api.weezevent.com/participant/list?api_key=' . $this->apiKey . '&access_token=' . $this->token . '&id_event[]=' . $this->idEvent . '&full=1';
        try { 
            // Send the request to the API
            $response = $this->client->request(
                'GET',
                $baseUrl);

            // If the status is different from 200, throw an exception
            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Error while retrieving the list');
            }
            // Put the content into an array
            $content = $response->toArray();

            return $content;

            } catch (\Exception $e) {
                throw new \Exception('Error while retrieving the customer list: ' . $e->getMessage());
            }

    }

    /**
     * Fetch all kinds of tickets via API with Weezevent
     *
     * @return array tickets
     */
    public function fetchTicketList(): array
    {
        // Customize the URL with the requested information: API key, token, and Event ID
        $baseUrl = 'https://api.weezevent.com/tickets?api_key=' . $this->apiKey . '&access_token=' . $this->token . '&id_event[]=' . $this->idEvent . '&full=1';
        
        try {
            // Send the request to the API
            $response = $this->client->request(
                'GET',
                $baseUrl);

            // If the status is different from 200, throw an exception
            if ($response->getStatusCode() !== 200) {
                throw new \Exception('Error while retrieving the list');
            }

            // Put the content into an array
            $content = $response->toArray();

            // Extract only the identifiers of each ticket from the array and put them into another array
            // This will be useful in the controller and in the view to display the type of ticket (1-day Pass, etc.) instead of just the identifier (12589)
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
                throw new \Exception('Error while retrieving the ticket list: ' . $e->getMessage());
            }

    }


}
