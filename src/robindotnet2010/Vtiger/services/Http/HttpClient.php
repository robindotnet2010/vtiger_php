<?php

namespace robindotnet2010\Vtiger\Services;

use GuzzleHttp;
use GuzzleHttp\RequestOptions;
use robindotnet2010\Vtiger\Services\HttpClientInterface;
use robindotnet2010\Vtiger\Services\HttpResponse;
use GuzzleHttp\Psr7\Request;

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

    protected $username;

    protected $auth;

    public function __construct($base_uri, $username, $access_token)
    {
        parent::__construct(['base_uri' => $base_uri]);
        $this->access_token = $access_token;
        $this->username = $username;
        $this->auth = new Authentication($this);
    }

    public function executeRequest($http_options = [])
    {
        try {
            $request = new Request(
                $this->method,
                'webservice.php'
            );

            $response = $this->send($request, $http_options);
            return $result = new HttpResponse($response);
        } catch (\Exception $e) {
            echo 'We could not connect to the server - ' . $e->getMessage() . '\n';
        }
    }

    public function prepareQueryStrings($query_strings = [], $columns = ["*"], $filter = [], $authenticated = true)
    {
        $http_options = [];

        $http_options['debug'] = true;

        if (! empty($query_strings)) {
            $http_options['query'] = $query_strings;
        }

        if ($authenticated) {
            $http_options['query']['sessionName'] = $this->auth->getSessionId();
        }

        if ($this->operation == 'query') {
            $http_options['query']['query'] = $this->parseSQLQuery('SELECT', $columns, $filter);
        }

        $http_options['query']['operation'] = $this->operation;

        return $http_options;
    }

    public function logout()
    {
        $this->auth->logout();
    }

    public function authenticate()
    {
        $this->auth->authenticate();
    }

    public function getFilterSQLQuery($filter)
    {
        if (is_array($filter) && empty($filter)) {
            return "";
        }
        $sqlQuery = " WHERE ";
        $beforeImplode = [];
        foreach ($filter as $column => $value) {
            array_push($beforeImplode,$column . "=" . $value);
        }
        $sqlQuery .= implode(" AND ", $beforeImplode);
        return $sqlQuery;
    }

    public function parseSQLQuery($sql_operation, $columns = ['*'], $filter = [])
    {
        $filterSQLQuery = $this->getFilterSQLQuery($filter);
        return $sql_operation . " " . join(",", $columns) . " FROM " . $this->module . "$filterSQLQuery;";
    }

    public function setModule($module)
    {
        $this->module = $module;
    }

    public function setOperation($operation)
    {
        $this->operation = $operation;
    }

   /**
   * Set Method Name
   *
   * @param $method var Description
   * @return mixed
   */
    public function setMethod($method)
    {
        $this->method = $method;
    }
    public function getAccessToken()
    {
        return $this->access_token;
    }

    public function getUserName()
    {
        return $this->username;
    }

}
