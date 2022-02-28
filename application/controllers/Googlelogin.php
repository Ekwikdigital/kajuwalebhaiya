<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Googlelogin extends CI_Controller {

public function __construct()
{
	parent::__construct();
	require_once APPPATH.'third_party/src/Google_Client.php';
	require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
		$this->load->model('Common_model');
		$this->load->library('email');
		$this->load->helper('security');

}
	
	public function index()
	{
		$this->load->view('login_view');
	}
	
	public function login()
	{
	
		$clientId = '1028403516180-2bhvufvahf1v1dg50rde3b69rdslii4e.apps.googleusercontent.com'; //Google client ID
		$clientSecret = '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'; //Google client secret
		$redirectURL = base_url() .'googlelogin/login';
		
		//https://curl.haxx.se/docs/caextract.html

		//Call Google API
		$gClient = new Google_Client();
		$gClient->setApplicationName('Kajuwalebhaiya');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectURL);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		
		if(isset($_GET['code']))
		{
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token'])) 
		{
			$gClient->setAccessToken($_SESSION['token']);
		}
		
		if ($gClient->getAccessToken()) {
		
            $userProfile = $google_oauthV2->userinfo->get();
            $get_users =$this->Common_model->getsingle('users',array('email'=>$userProfile['email']));
            //print_r($get_users);
            
            $today= date('Y-m-d h:i:s');
            
            if(!$get_users)
            {
                 $insert_arr = array(
							    'first_name' => $userProfile['given_name'],
								'last_name'=>$userProfile['family_name'],
								'email' => $userProfile['email'],
								'locale' => $userProfile['locale'],
								'picture' => $userProfile['picture'],
								'verified_email' =>$userProfile['verified_email'],
								'oauth_uid' =>$userProfile['id'],
								'oauth_provider' => 'google',
								'created' => $today,
							);
			    $result=$this->Common_model->insertData('users',$insert_arr);
			    $from_email = "billing@kajuwalebhaiya.com"; 
                            $to_email = $userProfile['email'];
                            
                    		$this->email->set_header('MIME-Version', '1.0; charset=utf-8'); //must add this line
                            $this->email->set_header('Content-type', 'text/html');
                    		$subject ='Welcome to Kajuwalebhaiya';
        	
        		            $body = '<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f7f7f7" style="max-width:800px;margin:auto;padding:12px;font-family:arial;color:#565a5c;background-color:#f5f5f5;border:1px solid #e8e8e8">
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <img src="'.base_url().'image/resize-164310701455515656KWBpngtransparent1.png" title="Kajuwalebhaiya" alt="Kajuwalebhaiya" class="CToWUd">
                                            <hr style="border:none;border-bottom:1px solid #bbbbbb;margin-top:15px">
                                        </td>
                                    </tr>
                                    <tr>
                                    
                                        <td>
                                            <h4 style="color:#222222;font-size:16px">Hello <span>'.$userProfile['given_name'].' '.$userProfile['family_name'].'</span>,</h4>                    
                                            <p style="font-size:14px;color:#222222">Thanks for creating your account on Kajuwalebhaiya. You can access your account area to views orders, edit profile, change your password and more at : <a href="'.base_url().'account" target="_blank">'.base_url().'account</a></p>                        
                                            <p style="font-size:14px">Best Regards,<br>Team Kajuwalebhaiya</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>';
                            $this->email->from($from_email, 'Kajuwalebhaiya'); 
                            $this->email->to($to_email);
                            $this->email->subject($subject); 
                 
                 
                            // $body = $this->load->view('site/email',$data,true);
                             $this->email->message($body);  
                             //Send mail 
                            $this->email->send();
			    $ids=$this->db->insert_id();
			    $this->session->set_userdata('u_id',$ids);
			    $this->session->set_flashdata('success1', 'Success! Your account has been registered successfully!');
            }
            else
            {
                $this->session->set_userdata('u_id',$get_users->id);
            }
			$this->session->set_userdata('loggedIn', true); 
			$this->session->set_userdata('userData', $userProfile);
			           
			           // $this->session->set_userdata($userProfile);
		//	print_r($userProfile);
			
	        redirect('');
			die;
        } 
		else 
		{
            $url = $gClient->createAuthUrl();
		    header("Location: $url");
            exit;
        }
	}
	    public function logout(){ 
         $this->session->unset_userdata('loggedIn');
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
         
        // Redirect to login page 
        redirect(''); 
    } 
}
