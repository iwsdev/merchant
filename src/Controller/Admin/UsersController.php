<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;

class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        $this->loadComponent('Flash');
        $this->loadComponent('Math');
        $this->loadModel('Ad');
        $this->loadModel('AdsClick');
        $this->loadModel('Plan');
        $this->loadModel('MerchantPlan');
        $this->loadModel('Country');
        $this->loadModel('Cities');
        $this->loadModel('States');
        $this->loadModel('Landmark');
        $this->loadModel('Route');
         $this->loadModel('Users');
  
        $this->viewBuilder()->layout("admin");
        parent::beforeFilter($event);
         $this->Auth->allow(['login','forgetpassword']);
        $userInfo = $this->request->session()->read('Auth.User');
         $this->userID = $userInfo['id'];
         $this->emailID = $userInfo['email'];
         $this->userName = $userInfo['name'];

         $planList = $this->Plan->find('list',['keyField' => 'id',
         'valueField' => 'name'])->where(['status'=>1])->toArray();
         $this->set('planList',$planList);

        $countryList = $this->Country->find('list',['keyField' => 'country_id',
         'valueField' => 'country_name'])->toArray();
         $this->set('countryList',$countryList);

         $stateList = $this->States->find('list',['keyField' => 'state_id',
         'valueField' => 'state_name'])->toArray();
         $this->set('stateList',$stateList);



    }

    /**
    Created By: jai singh
    date:25-8-2017
    purpose:For Login
    **/
    public function login()
    {
        $this->viewBuilder()->layout("admin_login_layout");

    
            
      if ($this->request->is('post')) {

            $user = $this->Auth->identify();
	
         if ($user){
              $this->Auth->setUser($user);
               $UserRoleId =$this->Auth->user('user_role'); 
              if($UserRoleId==2)
               {
                $this->redirect(array('controller'=>'users','action' => 'index','prefix'=>false)); 
               }
               else if($UserRoleId==1 && $UserRoleId==3)
               {
                 $this->redirect(array('controller'=>'users','action' => 'index','prefix'=>'admin'));  
               }
              return $this->redirect($this->Auth->redirectUrl());        
              }
            else
            {
            $this->Flash->loginerror(__('Invalid username or password, try again'));
            }
        }
    }

    /**
    Created By: jai singh
    date:24-8-2017
    purpose:For Logout
    **/
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }




/**
Created By: jai singh
date:24-8-2017
purpose:For forget password
 **/
public function forgetpassword()
    {
       $this->viewBuilder()->layout("front_login_layout");
       if($this->request->is('post') || $this->request->is('put'))
            {
               $emailId = $this->request->data['email'];
               $user = $this->Users->find()->where(['email'=>$emailId])->first();
               if($user)
               {
                $userName = $user->username;
                $name = $user->name;
                $emailId = $user->email;
                $pass =$this->Math->generatePassword();
                $user->password =$pass;
              if( $this->Users->save($user))   
                {
                $email = new Email();
                $email->transport('default');
                $email->viewVars([
                    'userName' => $userName,
                    'name' => $name,
                    'pass' => $pass,
                    'subject' => 'Forget Password',
                ]);
                $email->emailFormat('html')
                        ->from(['ict@gmail.com' => 'ICT'])
                        ->to($emailId)
                        ->subject('Forget Password')
                        ->template('forgetpasswordmail')
                        ->send(); 

                $this->Flash->forgetsuccess(__('Password has been sent to your e-mail.'));

                }
               else
                { 
                $this->Flash->forgeterror(__('Some problem Password updated'));
                }

             }
               else
               {

                $this->Flash->forgeterror(__('E-mail id is not registered')); 
               }
          } 

}
 /**End Section **/


public function findstate()
        {
          $this->viewBuilder()->layout("ajax");
          $country_id=$this->request->data['country'];
          $stateList = $this->States->find('list',
           ['keyField' => 'state_id',
            'valueField' => 'state_name'
            ])->where(['States.country_id'=>$country_id])->toArray();
          $this->set('states',$stateList);
     }
    

    /**
    Created By: jai singh
    date:25-8-2017
    purpose:For Dashboard
    **/
    public function index()
    {
	
       ## Start section, If user hit without action from normal user to admin section it will redirect
		## it 's not Needed but i did it..
		## This code main part is avialbale in appController,Here only without action
	    /* $userrole = $this->Auth->user('user_role'); 
		 if(isset($this->request->params['prefix'])){
          $curPrefix = $this->request->params['prefix']; 
		  }
		  else
		  {
			 $curPrefix = '';
		  }
		  if($userrole==1 && $curPrefix==''){
			 $this->redirect('/admin/users/');
		  }
		  else if($userrole==2 && $curPrefix=='admin'){
			 $this->redirect('/users/'); 
		  }*/
	## End Section of  

      

    }


   

    public function profile()
    {
      $user_id = $this->userID;

      // $user = $this->request->session()->read('Auth.User');
      $user = $this->Users->find()->where(['id'=>$user_id,'status'=>1])->first(); 
      $this->set('userInfo',$user);

      $planDetail = $this->MerchantPlan->find()->where(['user_id'=>$user_id,'status'=>1])->first(); 
      $this->set('planDetail',$planDetail);

       $countrys= $this->Country->find('all');
        $this->set('countrys',$countrys);

        if($this->request->is(['post','put'])){
         $data = $this->request->data;
          $user = $this->Users->get($user_id);
          $user->name = $data['name'];
          $user->phone_number = $data['phone_number'];
           $user->countries_isd_code = $data['countries_isd_code'];
          $user->address = $data['address'];
        if($this->Users->save($user)){
            $this->Flash->profilesuccess(__("Your profile has been saved."));
            $this->redirect(['action' => 'profile']);
         } else 
            {
            $this->Users->profileerror(__("Unable to save your profile information."));
            $this->redirect(['action' => 'profile']);
             }
        }

    }

   
/**
Created By: jai singh
date:29-8-207
purpose:For change password
 **/

public function changepassword()
     {

        if($this->request->is('post'))
         {
            //$id = $this->$userID;
           $users =$this->Auth->user();
          // pr($users);
           $id=$users['id'];
            $getPass = $this->request->data;
            $data = $this->Users->get($id);
            $passwordcurrent = $getPass['current_password'];
            $hasher = new DefaultPasswordHasher();
            if(!$hasher->check($passwordcurrent,$data->password))
            {
                 $this->Flash->changepassworderror(__('Your current password does not matched...'));
            }
            else
            {
               $password_again =  $getPass['password_again'];
              if($password_again==$passwordcurrent)
              {
                $this->Flash->changepassworderror(__('Your current password and new password should not be the same.'));
              }
               else
               {
                   $data->password = $password_again;
                   $username = $data->username;
                   $name = $data->name;
                   $emailId = $data->email;
                   $pass = $getPass['password_again'];
                   $data['current_password']=$password_again;
                   
                   if($this->Users->save($data))
                     { 
                      $email = new Email();
                      $email->transport('default');
                      $email->viewVars([
                          'userName' => $username,
                          'name' => $name,
                          'pass' => $pass,
                          'subject' => 'Change Password',
                      ]);
                      $email->emailFormat('html')
                        ->from(['ict@gmail.com' => 'ICT'])
                        ->to($emailId)
                        ->subject('Change Password')
                        ->template('changepasswordmail')
                        ->send(); 
                         $this->Flash->changepasswordsuccess('Thank you! You have successfully changed your Login Password, please keep a record of the new password. We have also sent a copy of the Password Change to your email for your records.');
                         $this->redirect(['action' => 'changepassword']);
               
                     }
                    
                   else
                   {
                       $this->Flash->changepassworderror(__('Error in updation.')); 
                   }
              }

          }  
             
        }
    }




 /**
    Created By: jai singh
    date:7-9-2017
    purpose:For admin plan 
 **/
    public function plan()
    {
       
      $planList = $this->Plan->find()->toArray();
      $this->set('planList',$planList);
    }

    /**
    Created By: jai singh
    date:11-9-2017
    purpose:For Create plan 
    **/
    public function createplan()
    {
        if($this->request->is(['post','put'])){
          $plan = $this->Plan->newEntity();
          $plan = $this->Plan->patchEntity($plan, $this->request->data);
          if ($this->Plan->save($plan)) {
            $this->Flash->plansuccess(__("A new plan has been created."));
            $this->redirect(['action' => 'plan']);

          }else{
             $this->Flash->planerror(__("some problem during creation."));
          }
        }
    }

   /**
    Created By: jai singh
    date:11-9-2017
    purpose:For admin plan 
    **/
    public function editplan($id)
    { 
        $planInfo = $this->Plan->get($id);
        $this->set('planInfo',$planInfo);
        $this->set('id',$id);
        if($this->request->is(['post','put'])){
          $data = $this->request->data;
           $plan = $this->Plan->patchEntity($planInfo, $data);
          if ($this->Plan->save($planInfo)) {
            $this->Flash->plansuccess(__("Your Plan has been updated Successfully."));
             $this->redirect(['action' => 'editplan',$id]);

          }else{
             $this->Flash->planerror(__("some problem during updatation."));
          }  
        }
    }

    /**
    Created By: jai singh
    date:12-9-2017
    purpose:For admin plan 
    **/
    public function deleteplan($id)
    { 
        $this->autoRender = false;
        $planInfo = $this->Plan->get($id);
        if ($this->Plan->delete($planInfo)) 
          {
            $this->Flash->plansuccess(__("Your Plan has been deleted Successfully."));
             $this->redirect(['action' => 'plan']);
          }
          else
          {
             $this->Flash->planerror(__("There is some problem during deletion."));
          }  
        
    }

   /**
    Created By: jai singh
    date:28-8-2017
    purpose:For To change the status of Ad
    **/
     public function planstatus($id) {
        $this->autoRender = false;       
        $plan = $this->Plan->get($id);
        $status = $plan->status;
        if($status==1){
            $plan->status = 0;
        }else{
            $plan->status = 1;  
        }
        if( $save = $this->Plan->save($plan)){
           $this->Flash->success(__("Your status has been changed."));
           $this->redirect(['action' => 'plan']);

         } 
    }




/**
    Created By: jai singh
    date:13-9-2017
    purpose:For Ads list
 **/

    public function merchant()
    {
       $userInfo = $this->request->session()->read('Auth.User');
       $countryid = $userInfo['country_id'];
       if($userInfo['user_role']==1){
		   $merchantList = $this->Users->find()->where(['user_role'=>2])->order(['Users.ID'=>'ASC'])->Contain('Plan')->toArray();

		   $this->set('merchantList',$merchantList); 
	   }else{
		  $merchantList = $this->Users->find()->where(['user_role'=>2,'country_id'=> $countryid])->order(['Users.ID'=>'ASC'])->Contain('Plan')->toArray();
		  $this->set('merchantList',$merchantList); 
	   }
       
    }



    public function createmerchant()
    {
      
      if($this->request->is(['post','put'])){
        $data = $this->request->data;
        $data['user_role']=2;
        $data['payment_status']=1;
        $data['username']=$data['email'];
        $pass =$this->Math->generatePassword();
        $data['password']=$pass;
        ## Start Get Plan Detail
        $plan_id = $data['plan_id'];
        $planDetail = $this->Plan->find()->where(['id'=>$plan_id])->first();
        ## End Get Plan Detail

        $merchant = $this->Users->newEntity();
        $merchant = $this->Users->patchEntity($merchant, $data);
       if ($save = $this->Users->save($merchant)) {
          $currentDate = date("Y-m-d H:i:s");
          $merchant_id= $save->id;
          $day = $planDetail->validity;
          $planData['user_id'] = $merchant_id;
          $planData['plan_id'] = $plan_id;
          $planData['name'] = $planDetail->name;
          $planData['no_of_ads'] = $planDetail->no_of_ads;
          $planData['validity'] = $day;
          $planData['cost'] = $planDetail->cost;
          $planData['start_date'] = $currentDate;
          $planData['end_date'] = date('Y-m-d h:i:s', strtotime("+".$day."days"));;
          $planData['status'] = 1;
          $planData['payment_status'] = 1;
          $plan = $this->MerchantPlan->newEntity();
          $plan = $this->MerchantPlan->patchEntity($plan, $planData);
          $this->MerchantPlan->save($plan);
          ## Email section Start
          $url = homeurl;
          $email = new Email();
          $email->transport('default');
          $email->viewVars([
            'name' => $data['name'],
            'userName' => $data['username'],
            'pass' => $pass,
            'url' => $url,
            ]);
          $email->emailFormat('html')
             ->from(['ict@gmail.com' => 'ICT'])
             ->to($data['username'])
             ->subject('Login Detail')
             ->template('merchantloginmail')
             ->send(); 
          ## End Email Section 
            //$this->Flash->plansuccess(__("A new Merchant User has been created."));
             $this->Flash->plansuccess(__("Your plan will be Activate!"));
            $this->redirect(['action' => 'merchant']);

          }else{
             $this->Flash->planerror(__("some problem during creation."));
          }
        }

    }


    public function editmerchant($id=NULL)
    {

       $merchantUser = $this->Users->get($id);
        $this->set('merchantUser',$merchantUser);
        $this->set('id',$id);
      if($this->request->is(['post','put'])){
        $data = $this->request->data;
        $merchantUser = $this->Users->patchEntity($merchantUser, $data);
          if ($this->Users->save($merchantUser)) {
            $this->Flash->plansuccess(__("Your Merchant has been updated Successfully."));
             $this->redirect(['action' => 'editmerchant',$id]);

          }else{
             $this->Flash->planerror(__("some problem during updatation."));
          }
        }

    }

    /**
    Created By: jai singh
    date:15-9-2017
    purpose:Chack Email Id exit or Not
    **/
    public function validemail()
    {
      $this->autoRender = false;
      $email=$this->request->data['email'];
      $merchantDetail =$this->Users->find()->where(['Users.email'=>$email])->first(); 
       if($merchantDetail){
        echo 1;
       }
       die;
    }



    /**
    Created By: jai singh
    date:25-8-2017
    purpose:For View Merchant
    **/
    public function viewmerchant($id=NULL)
    {
       $merchantDetail =$this->Users->find()->where(['Users.id'=>$id])->Contain('Plan')->first(); 
       $this->set('merchantDetail',$merchantDetail);
    }

       /**
    Created By: jai singh
    date:13-9-2017
    purpose:For To change the status of Merchant from admin
    **/
     public function merchantstatus($id) {

        $this->autoRender = false;       
        $merchant = $this->Users->get($id);
        $status = $merchant->status;
        if($status==1){
            $merchant->status = 0;
        }else{
            $merchant->status = 1;  
        }
        if( $save = $this->Users->save($merchant)){
           $this->Flash->success(__("The status of merchant User has been changed."));
           $this->redirect(['action' => 'merchant']);

         } 
    }

    /**
    Created By: jai singh
    date:13-9-2017
    purpose:For Delete merchant from admin
    **/
    public function deletemerchant($id)
    { 
        $this->autoRender = false;
        $merchantInfo = $this->Users->get($id);
        if ($this->Users->delete($merchantInfo)) 
          {
            $this->Flash->plansuccess(__("Your Merchant User has been deleted Successfully."));
             $this->redirect(['action' => 'merchant']);
          }
          else
          {
             $this->Flash->planerror(__("There is some problem during deletion."));
          }  
        
    }



    /**
    Created By: jai singh
    date:13-9-2017
    purpose:For Ads list
 **/

    public function merchantplan($id=NULL)
    {

       if(!empty($id)){
         $merchantPlan = $this->MerchantPlan->find()->Contain('Users')->where(['user_id'=>$id])->order(['user_id'=>'DESC'])->toArray();
         $merchantName = $this->Users->find()->where(['id'=>$id])->first();
         $this->set('name',$merchantName->name);

       }
        else{
       $merchantPlan = $this->MerchantPlan->find()->Contain('Users')->toArray();
    
       // pr($merchantPlan);die;
     }
       $this->set('merchantPlan',$merchantPlan);
    }


     /**
    Created By: jai singh
    date:19-9-2017
    purpose:For Merchant Plan Detail
    **/
    public function merchantplan_detail($id=NULL)
    {
       
      $MerchantPlanDetail = $this->MerchantPlan->find()->where(['id'=>$id])->first(); 
      $this->set('MerchantPlanDetail',$MerchantPlanDetail);
    }


 /**
    Created By: jai singh
    date:12-9-2017
    purpose:For Ads list
 **/

    public function adlist()
    {
       $userInfo = $this->request->session()->read('Auth.User');
       $countryid = $userInfo['country_id'];
       if($userInfo['user_role']==1){
		   $adList = $this->Ad->find()->Contain(['AdsClick','Users','Landmark','Route'])->order(['Ad.id'=>'ASC'])->toArray();
		   $this->set('adList',$adList);
	   }else{	

		  $adList = $this->Ad->find()->where(['Ad.country'=>$countryid])->order(['Ad.id'=>'ASC'])->Contain(['AdsClick','Users','Landmark','Route'])->toArray();
		  $this->set('adList',$adList); 
	   }
       
    }

    /**
    Created By: jai singh
    date:25-8-2017
    purpose:For AdDetail
    **/
    public function ad_detail($id=NULL)
    {
       $adDetail = $this->Ad->find()->where(['Ad.id'=>$id])->Contain(['AdsClick','Users'])->first(); 
      // pr($adDetail);
       $this->set('adDetail',$adDetail);
    }
	
	
	/**
    Created By: Shivam Tripathi
    date:04-12-2017
    purpose:For Ad Detail with AJAX
    **/
	public function indv_ad_detail($id=NULL)
    {
       $adDetail = $this->Ad->find()->where(['Ad.id'=>$id])->first()->toArray(); 
	   echo json_encode($adDetail);exit;
    }

        /**
    Created By: jai singh
    date:28-8-2017
    purpose:For To change the status of Ad
    **/
     public function adstatus($id) {
        $this->autoRender = false;       
        $ad = $this->Ad->get($id);
        $block = $ad->block_status;
        if($block==1){
            $ad->block_status = 0;
        }else{
            $ad->block_status = 1;  
        }
        if( $save = $this->Ad->save($ad)){
           $this->Flash->success(__("Your status has been changed."));
           $this->redirect(['action' => 'adlist']);

         } 
    }

   /**
    Created By: jai singh
    date:12-9-2017
    purpose:For admin plan 
    **/
    public function deletead($id)
    { 
        $this->autoRender = false;
        $adInfo = $this->Ad->get($id);
        if ($this->Ad->delete($adInfo)) 
          {
            $this->Flash->plansuccess(__("Your Ad has been deleted Successfully."));
             $this->redirect(['action' => 'adlist']);
          }
          else
          {
             $this->Flash->planerror(__("There is some problem during deletion."));
          }  
        
    }


    /**
    Created By: jai singh
    date:21-9-2017
    purpose:For Cron Job Method 
    **/
    public function renewplanbycronjob()
    { 
        $this->autoRender = false;
        $merchantPlan = $this->MerchantPlan->find()->where(['status'=>1,'payment_status'=>1])->toArray();
        $currentDate = date("Y-m-d H:i:s");
        foreach ($merchantPlan as $list) { 
            $dateFormate= strtotime($list->end_date);
            $sub_date = date("Y-m-d H:i:s",$dateFormate);
            $diffDay = $this->remainDays($sub_date,$currentDate);
            if($diffDay==5)
            {
              $plan_id = $list->plan_id;
              $planDetail = $this->Plan->find()->where(['id'=>$plan_id])->first();
              $currentDate = date("Y-m-d H:i:s");
          $merchant_id= $list->user_id;
          $day = $planDetail->validity;
          $planData['user_id'] = $merchant_id;
          $planData['plan_id'] = $plan_id;
          $planData['name'] = $planDetail->name;
          $planData['no_of_ads'] = $planDetail->no_of_ads;
          $planData['validity'] = $day;
          $planData['cost'] = $planDetail->cost;
          $planData['start_date'] = $currentDate;
          $planData['end_date'] = date('Y-m-d h:i:s', strtotime("+".$day."days"));;
          $planData['status'] = 0;
          $planData['payment_status'] = 0;
          $plan = $this->MerchantPlan->newEntity();
          $plan = $this->MerchantPlan->patchEntity($plan, $planData);
          $this->MerchantPlan->save($plan);

            }
        }

  }
   
  /** Methods for Route Start **/ 
   
   public function route()
    {
       $routelist = $this->Route->find()->where(['status'=>1])->toArray();
       $this->set('routelist',$routelist);
    }
    
   public function routestatus($id) {

        $this->autoRender = false;       
        $route = $this->Route->get($id);
        $status = $route->status;
        if($status==1){
            $route->status = 0;
        }else{
            $route->status = 1;  
        }
        if( $save = $this->Route->save($route)){
           $this->Flash->success(__("The route status has been changed."));
           $this->redirect(['action' => 'route']);

         } 
    }

    public function deleteroute($id)
    { 
        $this->autoRender = false;
        $route = $this->Route->get($id);
        if ($this->Route->delete($route)) 
          {
            $this->Flash->success(__("Your route has been deleted Successfully."));
             $this->redirect(['action' => 'route']);
          }
          else
          {
             $this->Flash->error(__("There is some problem during deletion."));
          }  
        
    }
    
    public function createroute()
    {
      
      if($this->request->is(['post','put'])){
        $data = $this->request->data;
        if($this->request->data['from_address']){
			$from_address = $this->request->data['from_address'];
			$from_city = $this->request->data['from_city'];
			$from_state = $this->request->data['from_state'];
			$from_country = $this->request->data['from_country'];
			$from_zipcode = $this->request->data['from_zipcode'];
			// Get lat and long by address         
			$address = $from_address." ".$from_city." ".$from_state." ".$from_country." ".$from_zipcode; // Google HQ
			$prepAddr = str_replace(' ','+',$address);
			$geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=true');
			$output= json_decode($geocode);
			$fromlatitude = $output->results[0]->geometry->location->lat;
			$fromlongitude = $output->results[0]->geometry->location->lng;        
			$data['from_latitude'] = $fromlatitude;		  
			$data['from_longitude'] = $fromlongitude;
		}
		if($this->request->data['to_address']){
			$to_address = $this->request->data['to_address'];
			$to_city = $this->request->data['to_city'];
			$to_state = $this->request->data['to_state'];
			$to_country = $this->request->data['to_country'];
			$to_zipcode = $this->request->data['to_zipcode'];
			// Get lat and long by address         
			$address = $to_address." ".$to_city." ".$to_state." ".$to_country." ".$to_zipcode; // Google HQ
			$prepAddr = str_replace(' ','+',$address);
			$geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=true');
			$output= json_decode($geocode);
			$tolatitude = $output->results[0]->geometry->location->lat;
			$tolongitude = $output->results[0]->geometry->location->lng;        
			$data['to_latitude'] = $tolatitude;		  
			$data['to_longitude'] = $tolongitude;
		}	        
        $data['status'] = 1;
        $Route = $this->Route->newEntity();
        $Route = $this->Route->patchEntity($Route, $data);       
        if ($this->Route->save($Route)) {
            $this->Flash->success(__("A new route has been created."));
            $this->redirect(['action' => 'route']);
          }else{
             $this->Flash->error(__("some problem during creation."));
          }
	  }

    }


    public function editroute($id=NULL)
    {

       $route = $this->Route->get($id);
       $this->set('Route',$route);
       $this->set('id',$id);
       if($this->request->is(['post','put'])){
        $data = $this->request->data;
        if($this->request->data['from_address']){
			$from_address = $this->request->data['from_address'];
			$from_city = $this->request->data['from_city'];
			$from_state = $this->request->data['from_state'];
			$from_country = $this->request->data['from_country'];
			$from_zipcode = $this->request->data['from_zipcode'];
			// Get lat and long by address         
			$address = $from_address." ".$from_city." ".$from_state." ".$from_country." ".$from_zipcode; // Google HQ
			$prepAddr = str_replace(' ','+',$address);
			$geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=true');
			$output= json_decode($geocode);
			$fromlatitude = $output->results[0]->geometry->location->lat;
			$fromlongitude = $output->results[0]->geometry->location->lng;        
			$data['from_latitude'] = $fromlatitude;		  
			$data['from_longitude'] = $fromlongitude;
		}
		if($this->request->data['to_address']){
			$to_address = $this->request->data['to_address'];
			$to_city = $this->request->data['to_city'];
			$to_state = $this->request->data['to_state'];
			$to_country = $this->request->data['to_country'];
			$to_zipcode = $this->request->data['to_zipcode'];
			// Get lat and long by address         
			$address = $to_address." ".$to_city." ".$to_state." ".$to_country." ".$to_zipcode; // Google HQ
			$prepAddr = str_replace(' ','+',$address);
			$geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=true');
			$output= json_decode($geocode);
			$tolatitude = $output->results[0]->geometry->location->lat;
			$tolongitude = $output->results[0]->geometry->location->lng;        
			$data['to_latitude'] = $tolatitude;		  
			$data['to_longitude'] = $tolongitude;
		}	
        $route = $this->Route->patchEntity($route, $data);
          if ($this->Route->save($route)) {
            $this->Flash->success(__("Your Route has been updated Successfully."));
            $this->redirect(['action' => 'editroute',$id]);

          }else{ 
             $this->Flash->error(__("some problem during updatation."));
          }
        }

    }

    public function viewroute($id=NULL)
    {
       $viewroute =$this->Route->find()->where(['Route.id'=>$id])->first(); 
       $this->set('viewroute',$viewroute);
    } 

  /** Methods for Landmark End **/   
  
   /** Methods for Landmark Start **/ 
   //->where(['status'=>1])
   public function landmark()
    {
       $landmarklist = $this->Landmark->find()->toArray();
       $this->set('landmarklist',$landmarklist);
    }
    
   public function landmarkstatus($id,$status) {

        $this->autoRender = false;       
        $landmark = $this->Landmark->get($id);
        $status = $landmark->status;
        if($status==1){
            $landmark->status = 0;
        }else{
            $landmark->status = 1;  
        }
        if( $save = $this->Landmark->save($landmark)){
           $this->Flash->success(__("The landmark status has been changed."));
           $this->redirect(['action' => 'landmark']);

         } 
    }

    public function deletelandmark($id)
    { 
        $this->autoRender = false;
        $landmark = $this->Landmark->get($id);
        if ($this->Landmark->delete($landmark)) 
          {
            $this->Flash->success(__("Your landmark has been deleted Successfully."));
             $this->redirect(['action' => 'landmark']);
          }
          else
          {
             $this->Flash->error(__("There is some problem during deletion."));
          }  
        
    }
    
    public function createlandmark()
    {
      
      if($this->request->is(['post','put'])){
        $data = $this->request->data;        
        if($this->request->data['address']){
			$address = $this->request->data['address'];
			$city = $this->request->data['city'];
			$state = $this->request->data['state'];
			$country = $this->request->data['country'];
			$zipcode = $this->request->data['zipcode'];
			// Get lat and long by address         
			$address = $address." ".$city." ".$state." ".$country." ".$zipcode; // Google HQ
			$prepAddr = str_replace(' ','+',$address);
			$geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=true');
			$output= json_decode($geocode);
			$latitude = $output->results[0]->geometry->location->lat;
			$longitude = $output->results[0]->geometry->location->lng;        
			$data['latitude'] = $latitude;		  
			$data['longitude'] = $longitude;
		}			
        $data['status'] = 1;		  
        $Landmark = $this->Landmark->newEntity();
        $Landmark = $this->Landmark->patchEntity($Landmark, $data);       
        if ($this->Landmark->save($Landmark)) {
            $this->Flash->success(__("A new landmark has been created."));
            $this->redirect(['action' => 'landmark']);

          }else{
             $this->Flash->error(__("some problem during creation."));
          }
	  }

    }


    public function editlandmark($id=NULL)
    {

       $Landmark = $this->Landmark->get($id);
       $this->set('Landmark',$Landmark);
       $this->set('id',$id);
      if($this->request->is(['post','put'])){
        $data = $this->request->data;
		if($this->request->data['address']){	
			$address = $this->request->data['address'];
			$city = $this->request->data['city'];
			$state = $this->request->data['state'];
			$country = $this->request->data['country'];
			$zipcode = $this->request->data['zipcode'];
			// Get lat and long by address         
			$address = $address." ".$city." ".$state." ".$country." ".$zipcode; // Google HQ
			$prepAddr = str_replace(' ','+',$address);
			$geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=true');
			$output= json_decode($geocode);
			$latitude = $output->results[0]->geometry->location->lat;
			$longitude = $output->results[0]->geometry->location->lng;        
			$data['latitude'] = $latitude;		  
			$data['longitude'] = $longitude;
		}
        $Landmark = $this->Landmark->patchEntity($Landmark, $data);
          if ($this->Landmark->save($Landmark)) {
            $this->Flash->success(__("Your Landmark has been updated Successfully."));
            $this->redirect(['action' => 'editlandmark',$id]);

          }else{ 
             $this->Flash->error(__("some problem during updatation."));
          }
        }

    }

    public function viewlandmark($id=NULL)
    {
       $viewlandmark =$this->Landmark->find()->where(['Landmark.id'=>$id])->first(); 
       $this->set('viewlandmark',$viewlandmark);
    } 

  /** Methods for Route End **/   
  
  /** Method for admin Start  **/
  
  public function admin()
    {
       $adminList = $this->Users->find()->where(['user_role'=>3])->toArray();
       $this->set('adminList',$adminList);
    }


    public function createadmin()
    {
      
      if($this->request->is(['post','put'])){
        $data = $this->request->data;
        $data['user_role']=3;
        $data['username']=$data['email'];
        $pass =$this->Math->generatePassword();
        $data['password']=$pass;
        $admin = $this->Users->newEntity();
        $admin = $this->Users->patchEntity($admin, $data);
       if ($save = $this->Users->save($admin)) {
          
          ## Email section Start
          $url = homeurl;
          $email = new Email();
          $email->transport('default');
          $email->viewVars([
            'name' => $data['name'],
            'userName' => $data['username'],
            'pass' => $pass,
            'url' => $url,
            ]);
          $email->emailFormat('html')
             ->from(['ict@gmail.com' => 'ICT'])
             ->to($data['username'])
             ->subject('Login Detail')
             ->template('merchantloginmail')
             ->send(); 
          ## End Email Section
            $this->Flash->plansuccess(__("A new sub-admin user has been created."));
            $this->redirect(['action' => 'admin']);

          }else{
             $this->Flash->planerror(__("some problem during creation."));
          }
        }

    }


    public function editadmin($id=NULL)
    {

        $adminUser = $this->Users->get($id);
        $this->set('adminUser',$adminUser);
        $this->set('id',$id);
      if($this->request->is(['post','put'])){
        $data = $this->request->data;
        $adminUser = $this->Users->patchEntity($adminUser, $data);
          if ($this->Users->save($adminUser)) {
            $this->Flash->plansuccess(__("Your sub-admin has been updated Successfully."));
             $this->redirect(['action' => 'editadmin',$id]);

          }else{
             $this->Flash->planerror(__("some problem during updatation."));
          }
        }

    }

 
    public function validateemail()
    {
      $this->autoRender = false;
      $email=$this->request->data['email'];
      $adminDetail =$this->Users->find()->where(['Users.email'=>$email])->first(); 
       if($adminDetail){
        echo 1;
       }
       die;
    }


    public function viewadmin($id=NULL)
    {
       $adminDetail =$this->Users->find()->where(['Users.id'=>$id])->first(); 
       $this->set('adminDetail',$adminDetail);
    }


     public function adminstatus($id) {

        $this->autoRender = false;       
        $admin = $this->Users->get($id);
        $status = $admin->status;
        if($status==1){
            $admin->status = 0;
        }else{
            $admin->status = 1;  
        }
        if( $save = $this->Users->save($admin)){
           $this->Flash->success(__("The status of sub-admin user has been changed."));
           $this->redirect(['action' => 'admin']);

         } 
    }

    public function deleteadmin($id)
    { 
        $this->autoRender = false;
        $adminInfo = $this->Users->get($id);
        if ($this->Users->delete($adminInfo)) 
          {
            $this->Flash->plansuccess(__("Your sub-admin user has been deleted Successfully."));
            $this->redirect(['action' => 'admin']);
          }
          else
          {
             $this->Flash->planerror(__("There is some problem during deletion."));
          }  
        
    }
  /** Method for admin End  **/

} 
?>
