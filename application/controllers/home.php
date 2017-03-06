<?php
	class home extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('user_model');
		}

		function index(){
			include_once APPPATH."libraries/facebook/facebook.php";
			$appId = '1970185156542690';
		    $appSecret = 'e155f5236cf9b0c902724142d1beb34b';
		    $redirectUrl = base_url() . 'home/fb';
		    $fbPermissions = 'email';
		    $facebook = new Facebook(array(
				  	'appId'  => $appId,
				  	'secret' => $appSecret
			));


			if(isset($_GET['code'])){
		        $this->googleplus->getAuthenticate();
				$this->session->set_userdata('login',true);
				$googleuser = $this->googleplus->getUserInfo();

				$this->session->set_userdata('user_profile',$googleuser);
				redirect('home/googles');
			}
			else{
				$data['fb_url'] = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
				$data['google_url'] = $this->googleplus->loginURL();
				$this->load->view('home_view',$data);
			}
		}

		function googles(){
			if($this->session->userdata('login') != true){
				redirect('');
			}
			
			$data['user_profile'] = $this->session->userdata('user_profile');
			$data['social'] = 'Google+';
			$this->load->view('profile_view',$data);
		}

		public function fb(){
			include_once APPPATH."libraries/facebook/facebook.php";
			$appId = '1970185156542690';
		    $appSecret = 'e155f5236cf9b0c902724142d1beb34b';
		    $facebook = new Facebook(array(
				  	'appId'  => $appId,
				  	'secret' => $appSecret
			));

		    $fbuser = $facebook->getUser();
			if($fbuser){
					$userPro = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');

					$userProfile['oauth_provider'] = 'facebook';
					$userProfile['id'] = $userPro['id'];
		            $userProfile['given_name'] = $userPro['first_name'];
		            $userProfile['family_name'] = $userPro['last_name'];
		            $userProfile['email'] = $userPro['email'];
					$userProfile['gender'] = $userPro['gender'];
					//$userData['locale'] = $userProfile['locale'];
		            //$userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
		            $userProfile['picture'] = $userPro['picture']['data']['url'];

		            $data['user_profile'] = $userProfile;
                	$this->session->set_userdata('user_profile',$userProfile);
                	$data['social'] = 'Facebook';
                	$this->load->view('profile_view',$data);
				}
			else{
				$fbuser = '';
				redirect('');
			}
		}
		public function logout() {
			$this->session->unset_userdata('user_profile');
			$this->session->unset_userdata('login');
			
	        $this->session->sess_destroy();
	        $this->googleplus->revokeToken();
			redirect('/home');
   		}
	}
?>