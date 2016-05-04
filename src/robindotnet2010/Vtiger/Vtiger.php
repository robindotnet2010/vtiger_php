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

require(dirname(dirname(dirname(dirname(__FILE__)))) . '/vendor/autoload.php');

/**
 * The Vtiger class
 * @author robindotnet2010 <https://github.com/robindotnet2010>
 * @since 0.1.0
 */
class Vtiger {

	/**
	 * A sample parameter
	 * @var int $myParam This is my parameter
	 * @since 0.1.0
	 */
	public $myParam = 0;

	/**
	 * A sample function that adds the $n param to $myParam
	 * @name increase
	 * @param int $n The number to add to $myParam
	 * @since 0.1.0
	 * @return object the Vtiger object
	 */
	public function increase ( $n ) {
		$this->myParam += $n;
		return $this;
	}

	/**
	 * A sample function that sets $myParam to 0
	 * @name negate
	 * @since 0.1.0
	 * @return object the Vtiger object
	 */
	public function negate (){
		$this->myParam = 0;
		return $this;
	}
}
