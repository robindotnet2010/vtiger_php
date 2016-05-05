<?php
require_once(dirname(dirname(__FILE__)) . '/vendor/autoload.php');
use robindotnet2010\Vtiger\Vtiger as myClass;
use robindotnet2010\Vtiger\Modules\Lead;
use robindotnet2010\Vtiger\Services\HttpClient;
use robindotnet2010\Vtiger\Services\Authentication;

class VtigerTest extends PHPUnit_Framework_TestCase
{
    public function testCanBeNegated()
    {
        /**
            * TODO: Write readable tests
            **/
        $auth = new Authentication("test");
        $a = new myClass();
        $test = new Lead();
        $service = new HttpClient();
    }
}
