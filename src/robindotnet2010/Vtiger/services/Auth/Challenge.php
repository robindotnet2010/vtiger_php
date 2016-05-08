<?php

namespace robindotnet2010\Vtiger\Services\Auth;
/**
 * Challenge
 *
 * @author Kento <robinsondotnet@hotmail.com>
 */

/**
 * Challenge Object
 */
class Challenge
{
    protected $status;

    protected $token;

    protected $serverTime;

    protected $expireTime;

    public  function getStatus()
    {
        return $this->status;
    }

    public  function setStatus($status)
    {
        $this->status = $status;
    }

    public  function getToken()
    {
        return $this->token;
    }

    public  function setToken($token)
    {
        $this->token = $token;
    }

    public function getServerTime()
    {
        return $this->serverTime;
    }

    public function setServerTime($serverTime)
    {
        $this->serverTime = $serverTime;
    }

    public function getExpireTime()
    {
        return $this->expireTime;
    }

    public function setExpireTime($expireTime)
    {
        $this->expireTime = $expireTime;
    }

}
