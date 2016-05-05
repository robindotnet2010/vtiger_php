<?php

namespace robindotnet2010\Vtiger\Services;

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
     * @var mixed
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
            $this->getChallenge();
        }
    }

    private function getChallenge()
    {
    }
}
