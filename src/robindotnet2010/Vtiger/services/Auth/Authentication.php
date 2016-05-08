<?php

namespace robindotnet2010\Vtiger\Services;

use GuzzleHttp;
use GuzzleHttp\Psr7\Request;
use robindotnet2010\Vtiger\Services\Auth\Challenge;

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

    public $challenge;

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
        $this->getChallenge();

        try {
            $request = new Request(
                'POST',
                'webservice.php'
            );

            $response = $this->http->send($request,[
                'form_params' => [
                    'operation' => 'login',
                    'username' => $this->http->getUserName(),
                    'accessKey' => md5(
                        $this->challenge->getToken() . $this->http->getAccessToken()
                    )
                ]
            ]);
            $this->parseLoginResponse($response);
        } catch (\Exception $e) {
            echo 'We could not connect to the server - ' . $e->getMessage() . '\n';
        }
    }

    private function parseLoginResponse($response)
    {
        $body = json_decode($response->getBody());
        if (! $body->success) {
            throw new \Exception($body->error->message);
        }

    }

    private function getChallenge()
    {
        try {
            $request = new Request(
                'GET',
                'webservice.php'
            );

            $response = $this->http->send($request,[
                'query' => [
                    'operation' => 'getchallenge',
                    'username' => $this->http->getUserName(),
                ]
            ]);
            $this->parseChallengeResponse($response);
        } catch (\Exception $e) {
            echo 'We could not connect to the server - ' . $e->getMessage() . '\n';
        }
    }

    private function parseChallengeResponse($response)
    {
        $body = json_decode($response->getBody());
        if (! $body->success) {
            throw new \Exception('The username does not exist.');
        }
        $this->challenge = new Challenge();
        $this->challenge->setStatus('success');
        $this->challenge->setToken($body->result->token);
        $this->challenge->setServerTime(date('Y-m-d H:i:s', $body->result->serverTime));
        $this->challenge->setExpireTime(date('Y-m-d H:i:s', $body->result->expireTime));
    }
}
