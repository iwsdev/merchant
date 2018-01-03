<?php 
namespace App\Controller\Component;
use Cake\Controller\Component;

class MathComponent extends Component
{
    public function generatePassword()
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	      for ($i = 0; $i < 8; $i++) {
	          $n = rand(0, $alphaLength);
	          $pass[] = $alphabet[$n];
	      }
	    $pass=implode($pass); 
	    return $pass;
    }
}
?>