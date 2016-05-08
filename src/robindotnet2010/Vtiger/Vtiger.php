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

use robindotnet2010\Vtiger\Services\HttpClient;
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
   * Authentication Object
   *
   * @var mixed
   */
   protected $auth;

   /**
    * undocumented class variable
    *
    * @var string
    */
    protected $http;

    public function __construct($base_uri,$username, $access_token)
    {
        $this->http = new HttpClient($base_uri, $username, $access_token);
        $this->auth = new Authentication($this->http);
    }

    public function someAction()
    {
        $this->auth->authenticate();
    }
}
