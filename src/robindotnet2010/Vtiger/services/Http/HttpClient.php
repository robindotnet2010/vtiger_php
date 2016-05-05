<?php

namespace robindotnet2010\Vtiger\Services;

use GuzzleHttp;

use robindotnet2010\Vtiger\Services\HttpClientInterface;

/**
 * HttpClient
 */
class HttpClient extends GuzzleHttp\Client implements HttpClientInterface
{
  /**
   * undocumented class variable
   *
   * @var string
   */
   protected $base_uri;

  /**
   * This variable will store the access_token for the WebService Connection
   *
   * @var string
   */
   protected $access_token;

  function __construct()
  {
    
  }
}
