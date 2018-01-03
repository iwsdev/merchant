<?php 
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class AdTable extends Table
{
	 
  public function initialize(array $config) {
        parent::initialize($config);
        $this->primaryKey('id');
        $this->hasMany('adsClick',
                          ['class'=>'adsClick',
                          'foreignKey' => 'ads_id',
                          'dependent' => true
                         ]
                    );

    }
  
}