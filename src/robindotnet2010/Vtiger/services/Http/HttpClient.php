<?php

namespace robindotnet2010\Vtiger\Services;

use GuzzleHttp;
use GuzzleHttp\RequestOptions;
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

   /**
    * RequestOptions Class
    *
    * @var mixed
    */
    protected $options;

    public function __construct($base_uri, $access_token)
    {
        parent::__construct(['base_uri' => $base_uri]);
        $this->options = new RequestOptions();
        $this->options->DEBUG = true;
    }

  /**
   * Set Method Name
   *
   * @param $method var Description
   * @return mixed
   */
  public function setMethod($method)
  {
      //$request->
  }
}
