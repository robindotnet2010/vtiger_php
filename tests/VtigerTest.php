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
        $a = new myClass("base_uri", "access_token");
        echo "test";
    }
}
