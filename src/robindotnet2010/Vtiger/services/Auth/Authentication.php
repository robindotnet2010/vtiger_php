<?php

namespace robindotnet2010\Vtiger\Services;

use GuzzleHttp;
use GuzzleHttp\Psr7\Request;

class Authentication
{
    /**
   * Access Token for the API
   *
   * @var string
   */
   protected $access_token;

   /**
    * User ID
    *
    * @var string
    */
    protected $userId;

    /**
     * Session ID
     *
     * @var string
     */
     protected $sessionId;

    /**
     * HttpClient
     *
     * @var HttpClient | mixed
     */
    protected $http;

    public function __construct(HttpClientInterface $http)
    {
        if (! isset($this->http)) {
            $this->http = $http;
        }
    }

    public function isLogged()
    {
        if (isset($sessionId)) {
            return true;
        }
        return false;
    }

    public function authenticate()
    {
        if (! $this->isLogged()) {
            $this->login();
        }
    }

    private function login()
    {
        $this->challenge();
    }

    private function challenge()
    {
        try {
            $request = new Request(
                'GET',
                'webservice.php'
            );

            $response = $this->http->send($request,[
                'query' => [
                    'operation' => 'getchallenge',
                    'username' => 'admin'
                ]
            ]);
            $this->parseResponse($response);
        } catch (\Exception $e) {
            echo 'We could not connect to the server - ' . $e->getMessage() . '\n';
        }
    }

    private function parseResponse($response)
    {
        $body = json_decode($response->getBody());
        if (! $body->success) {
            throw new \Exception('The username does not exist.');
        }
        $serverTime = date('Y-m-d H:i:s', $body->result->serverTime);
        echo $serverTime;
    }
}
