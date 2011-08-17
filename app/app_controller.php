<?php
/**
 * Base app controller, all your controllers inherit this class
 * 
 * @author		  rynop and the paypal IPN pieces are thanks to webtechnick's example
 * @link          http://rynop.com, http://github.com/webtechnick/CakePHP-Paypal-IPN-Plugin
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class AppController extends Controller {

	var $helpers = array('Html', 'Form', 'Session');
	var $components = array(
		'Session',
	   	'DebugKit.Toolbar'
	);	
	    
	

}
?>