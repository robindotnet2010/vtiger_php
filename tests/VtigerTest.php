<?php
require_once(dirname(dirname(__FILE__)) . '/vendor/autoload.php');
use robindotnet2010\Vtiger\Vtiger as myClass;
use robindotnet2010\Vtiger\Modules\Lead;

use robindotnet2010\Vtiger\Services\HttpClient;

class VtigerTest extends PHPUnit_Framework_TestCase
{
	public function testCanBeNegated () {
		$a = new myClass();
		$test = new Lead();
		$service = new HttpClient();
	}

}
