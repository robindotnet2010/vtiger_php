<?php
require_once(dirname(dirname(__FILE__)) . '/vendor/autoload.php');
use robindotnet2010\Vtiger\Vtiger;
use robindotnet2010\Vtiger\Modules\Lead;
use robindotnet2010\Vtiger\Services\HttpClient;
use robindotnet2010\Vtiger\Services\Authentication;

class VtigerTest extends PHPUnit_Framework_TestCase
{
    public function testChallengeLogin()
    {
        /**
            * TODO: Write readable tests
            **/
        $a = new Vtiger("http://app.interconnecta.com/interconnectacrm_sandbox/", "access_token");
        $a->someAction();
    }
}
