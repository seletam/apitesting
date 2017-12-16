<?php
namespace App\Controller;

use App\Controller\AppController;

class NewController extends AppController
{
/* ----------------------------------------------------------------
 * -- cURL example
 */
	public function test(){
		$link = 'http://drupaltest.csir.co.za/Utilities.php?f=getJobList';
		$ch = curl_init();
		curl_setopt_array($ch, [
								CURLOPT_RETURNTRANSFER => 1,
								CURLOPT_URL => $link
		]);
		$output = curl_exec($ch);	
		curl_close($ch);
	
		$this->set('response', array($output));
 }
}
?>