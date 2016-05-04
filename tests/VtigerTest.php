<?php
require_once(dirname(dirname(__FILE__)) . '/src/robindotnet2010/Vtiger/Vtiger.php');
use robindotnet2010\Vtiger\Vtiger as myClass;

class VtigerTest extends PHPUnit_Framework_TestCase
{
	public function testCanBeNegated () {
		$a = new myClass();
		$a->increase(9)->increase(8);
		$b = $a->negate();
		$this->assertEquals(0, $b->myParam);
	}

}
