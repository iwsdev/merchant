<?php 
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class MerchantPlanTable extends Table
{
	 
  public function initialize(array $config) {
     $this->belongsTo('Users', [
          'foreignKey' => 'user_id'
        ]); 
    }
  
}