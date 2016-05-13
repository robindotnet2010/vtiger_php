<?php
/**
* vtiger_php
* @package Vtiger
* @version 0.1.0
* @link https://github.com/robindotnet2010/vtiger_php
* @author robindotnet2010 <https://github.com/robindotnet2010>
* @license https://github.com/robindotnet2010/vtiger_php/blob/master/LICENSE
* @copyright Copyright (c) 2014, robindotnet2010
*/

namespace robindotnet2010\Vtiger;

use GuzzleHttp;
use GuzzleHttp\Psr7\Request;
use robindotnet2010\Vtiger\Services\HttpClient;
use robindotnet2010\Vtiger\Services\HttpResponse;
use robindotnet2010\Vtiger\Services\Authentication;

require(dirname(dirname(dirname(dirname(__FILE__)))) . '/vendor/autoload.php');

/**
* The Vtiger class
* @author robindotnet2010 <https://github.com/robindotnet2010>
* @since 0.1.0
*/
class Vtiger
{

   /**
    * undocumented class variable
    *
    * @var string
    */
    protected $api;

    public function __construct($base_uri,$username, $access_token)
    {
        $this->api = new HttpClient($base_uri, $username, $access_token);
    }

    public function logout()
    {
        $this->api->logout();
    }

    public function someAction()
    {
        $this->api->authenticate();
    }

    public function getAll($module)
    {
        try {
            $this->api->authenticate();
            $this->api->setMethod("GET");
            $this->api->setModule($module);
            $this->api->setOperation("query");
            $http_options = $this->api->prepareQueryStrings();
            return $this->api->executeRequest($http_options);
        } catch (\Exception $e) {
            echo 'We could not connect to the server - ' . $e->getMessage() . '\n';
        }

    }

    public function getRecordsWithFilter($module, $filter)
    {
        try {
            $this->api->authenticate();
            $this->api->setMethod("GET");
            $this->api->setModule($module);
            $this->api->setOperation("query");
            $http_options = $this->api->prepareQueryStrings([], ['*'], $filter);
            return $this->api->executeRequest($http_options);
        } catch (\Exception $e) {
            echo 'We could not connect to the server - ' . $e->getMessage() . '\n';
        }
    }

}
