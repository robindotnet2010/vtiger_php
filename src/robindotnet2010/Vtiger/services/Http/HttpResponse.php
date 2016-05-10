<?php
/**
 * HttpResponse
 *
 * @author Kento <robinsondotnet@hotmail.com>
 */

namespace robindotnet2010\Vtiger\Services;

use GuzzleHttp\Psr7\Response;
/**
 * This class will store of the response data
 */
class HttpResponse
{
    protected $raw_response;
    protected $body;

    public function __construct(Response $response)
    {
        $this->raw_response = $response;
        $this->body = json_decode($response->getBody());
    }

    public function isSuccess()
    {
        if (! $this->body->success) {
            return false;
        }
        return true;
    }

    public function getRows()
    {
        return $this->body;
    }
}
