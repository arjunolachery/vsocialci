<?php
class Home_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('User_functions_model');
    }
    public function show_posts()
    {
        $data['name']=$this->Auth_model->retrieve_user($uid=$this->session->userdata('uid'));
        if (!empty($data['name'])) {
            $data['name']=$data['name']->name;
            $this->load->view('posts_input_content', $data);
        }
    }
    public function show_search_result()
    {
        // TODO: change $_POST to standard post function in CI
        // retrieval of search_results is done from User_functions_model->retrieve_search_results
        $data['selector_search']=$_POST['selector_search'];
        $data['search_data']=$_POST['search_data'];
        $data['retrieved_search_results']=$this->User_functions_model->retrieve_search_results($data['search_data']);
        // load view [search_content] to the method [search_result] with $data [$search_data] loaded into div [search_result_value]
        $this->load->view('search_content', $data);
    }
    public function show_welcome_message()
    {
        // load view [welcome_content] to the method [welcome_message]
        $this->load->view('welcome_content');
    }
    public function show_settings()
    {
        // load view [settings_content] to the method [settings]
        $this->load->view('settings_content');
    }
    public function show_settings_actual()
    {
        // load view [settings_content] to the method [settings]
        //echo 1;
        $data['retrieved_settings']=$this->User_model->retrieve_settings();
        $data['profile_pic_file_name']=$this->User_functions_model->get_profile_pic();
        $this->load->view('settings_content_actual', $data);
    }
    public function show_notifications()
    {
        // load view [notifications_content] to the method [notifications]
        $this->load->view('notifications_content');
    }
    public function show_friend_requests()
    {
        // load view [friend_requests_content] to the method [friend_requests]
        $uid=$this->session->userdata('uid');
        $select_friend_requests=$this->db->query("SELECT * FROM friends,users,profile_pic WHERE (friends.friend_id=$uid AND profile_pic.u_id=friends.u_id AND users.user_id=friends.u_id AND profile_pic.set_profile_pic=1 AND friends.status_friend=0) ORDER BY friends.time_friend DESC");
        $data['friend_requests']=$select_friend_requests->result_array();
        $select_friend_acceptances=$this->db->query("SELECT * FROM friends,users,profile_pic WHERE (friends.u_id=$uid AND profile_pic.u_id=friends.friend_id AND users.user_id=friends.friend_id AND profile_pic.set_profile_pic=1 AND friends.status_friend=1) ORDER BY friends.time_friend DESC");
        $data['friend_acceptances']=$select_friend_acceptances->result_array();

        $select_checked_on_time=$this->db->query("SELECT * FROM checked_on WHERE u_id=$uid AND type_checked_on='f'");
        $data['checked_on']=$select_checked_on_time->result_array();

        $data['friend_requests_number']=$this->show_friend_requests_number();

        $this->load->view('friend_requests_content', $data);
        $this->update_checked_on_friends();
    }
    public function show_friend_requests_number()
    {
        $uid=$this->session->userdata('uid');
        $select_friend_requests=$this->db->query("SELECT * FROM friends,users,profile_pic WHERE (friends.friend_id=$uid AND profile_pic.u_id=friends.u_id AND users.user_id=friends.u_id AND profile_pic.set_profile_pic=1 AND friends.status_friend=0) ORDER BY friends.time_friend DESC");
        $data['friend_requests']=$select_friend_requests->result_array();
        $select_friend_acceptances=$this->db->query("SELECT * FROM friends,users,profile_pic WHERE (friends.u_id=$uid AND profile_pic.u_id=friends.friend_id AND users.user_id=friends.friend_id AND profile_pic.set_profile_pic=1 AND friends.status_friend=1) ORDER BY friends.time_friend DESC");
        $data['friend_acceptances']=$select_friend_acceptances->result_array();

        $select_checked_on_time=$this->db->query("SELECT * FROM checked_on WHERE u_id=$uid AND type_checked_on='f'");
        $data['checked_on']=$select_checked_on_time->result_array();
        $add='';
        $count=0;

        foreach ($data['friend_requests'] as $key) {
            $add=$add.$key['time_friend'];
            if ($data['checked_on'][0]['time_checked_on']<$key['time_friend']) {
                $count++;
            }
        }
        foreach ($data['friend_acceptances'] as $key) {
            $add=$add.$key['time_friend'];
            if ($data['checked_on'][0]['time_checked_on']<$key['time_friend']) {
                $count++;
            }
        }
        return $count;
        //return $data['checked_on'][0]['time_checked_on'].$add;
    }
    public function show_messages_number()
    {
        $uid=$this->session->userdata('uid');
        $select_friends=$this->db->query("SELECT * FROM friends WHERE status_friend=1 AND (u_id=$uid OR friend_id=$uid)");
        $select_friends_array=$select_friends->result_array();
        $count=0;
        //print_r($select_friends_array);
        foreach ($select_friends_array as $key) {
            if ($key['friend_id']==$uid) {
                $friend_id=$key['u_id'];
            } else {
                $friend_id=$key['friend_id'];
            }
            $friend_id_m=$friend_id."m";
            //check the notifications time
            $select_friends_2=$this->db->query("SELECT * FROM checked_on WHERE u_id=$uid AND type_checked_on='m'");
            $select_friends_array_2=$select_friends_2->result_array();
            //return $select_friends_array_2[0]['time_checked_on'];
            //print_r($select_friends_array_2);

            $time_checked=$select_friends_array_2[0]['time_checked_on'];
            //got friend_id and time_checked
            //find messages that are more than the time
            $select_messages=$this->db->query("SELECT * FROM messages WHERE time_message>$time_checked AND u_id=$friend_id");
            $select_messages_array=$select_messages->result_array();
            if (sizeof($select_messages_array)>0) {
                $count++;
            }
        }
        return $count;
        //get friends first
        //then with the friends id, get messages with the time more than the checked_time
        /*
        $select_friend_requests=$this->db->query("SELECT * FROM friends,users,profile_pic WHERE (friends.friend_id=$uid AND profile_pic.u_id=friends.u_id AND users.user_id=friends.u_id AND profile_pic.set_profile_pic=1 AND friends.status_friend=0) ORDER BY friends.time_friend DESC");
        $data['friend_requests']=$select_friend_requests->result_array();
        $select_friend_acceptances=$this->db->query("SELECT * FROM friends,users,profile_pic WHERE (friends.u_id=$uid AND profile_pic.u_id=friends.friend_id AND users.user_id=friends.friend_id AND profile_pic.set_profile_pic=1 AND friends.status_friend=1) ORDER BY friends.time_friend DESC");
        $data['friend_acceptances']=$select_friend_acceptances->result_array();

        $select_checked_on_time=$this->db->query("SELECT * FROM checked_on WHERE u_id=$uid AND type_checked_on='f'");
        $data['checked_on']=$select_checked_on_time->result_array();
        $add='';
        $count=0;

        foreach ($data['friend_requests'] as $key) {
            $add=$add.$key['time_friend'];
            if ($data['checked_on'][0]['time_checked_on']<$key['time_friend']) {
                $count++;
            }
        }
        foreach ($data['friend_acceptances'] as $key) {
            $add=$add.$key['time_friend'];
            if ($data['checked_on'][0]['time_checked_on']<$key['time_friend']) {
                $count++;
            }
        }*/
        //return $data['checked_on'][0]['time_checked_on'].$add;
    }
    public function update_checked_on_friends()
    {
        $uid=$this->session->userdata('uid');
        $data_checked_on=array(
        'time_checked_on'=>time(),
      );
        $this->db->where('u_id', $uid);
        $this->db->where('type_checked_on', 'f');
        $this->db->update('checked_on', $data_checked_on);
    }
    public function show_messages()
    {
        //get names of friends
        $data['friends_list']=$this->Friend_model->retrieve_friends_messages_list();
        $data['uid']=$this->session->userdata('uid');
        // load view [messages_content] to the method [messages]
        $this->load->view('messages_content', $data);
    }
    public function show_posts_content()
    {
        // store session uid value
        $data['uid']=$this->session->userdata('uid');
        // retrieval of posts is done from User_functions_model->retrieve_posts
        $this->load->model('User_functions_model');
        $data['posts_results']=$this->User_functions_model->retrieve_posts();
        // load view [posts_content_view] to the method [posts_content] with $data [$uid,$posts_results]
        $this->load->view('posts_content_view', $data);
    }
    public function show_profile()
    {
        // $uid has the user_id from the users table which is set in the session variable uid from the login method
        $uid=$this->session->userdata('uid');
        // proceed to the following 'if branch' if the user_logged session variable has not been set
        if (!isset($_SESSION['uid'])) {
            // set session variable error to value 'Please login first to view this page.'
            // and redirect to login page
            $this->session->set_flashdata("error", "Please login first to view this page.");
            redirect("auth/");
        }
        // $activation_status has value 0 or 1 depending on whether the user's email account has been verified or not
        //$activation_status=$this->User_model->check_activation_status($uid);
        //proceed to the following 'if branch' if the user's email account has not been verified

        // load the profile view to the profile method only if the user has been logged in successfully as mentioned before
        $data['profile_pic_file_name']=$this->User_functions_model->get_profile_pic();
        $data['email']=$_REQUEST['email'];
        $data['profile']=true;
        $data['welcome_screen_enabled']=$this->User_functions_model->check_welcome_screen();
        $this->load->view('home_view.php', $data);
        //WORKS!
      //$this->load->view('login_view.php');
    }
    public function show_profile_specific()
    {
        //echo "<br><br>You are now viewing a profile<br><br> email: ".$_POST['data'];
        $data['uid']=$this->session->userdata('uid');
        $data['email']=$_POST['data'];
        //echo $data['email'];
        $data['friend_uid']=$this->User_functions_model->get_uid_from_email($data['email']);
        $data['retrieved_settings']=$this->User_model->retrieve_settings_friend($data['friend_uid']);

        $data['retrieved_settings']=$this->User_model->retrieve_settings_friend($data['friend_uid']);
        $data['profile_pic_file_name']=$this->User_functions_model->get_profile_pic_friend($data['friend_uid']);
        //check whether friend
        $data['friend']=$this->User_functions_model->friends_data($data['uid'], $data['friend_uid']);
        $data['friend_status']=$this->Friend_model->friend_status_check($data['friend']);
        $this->load->view('profile_view.php', $data);
    }
    public function update_messages_container_seen()
    {
        // code...
        $uid=$this->session->userdata('uid');
        $data_checked_on=array(
      'time_checked_on'=>time(),
    );
        $this->db->where('u_id', $uid);
        $this->db->where('type_checked_on', 'm');
        $this->db->update('checked_on', $data_checked_on);
    }
    public function notification_message_time_update_model()
    {
        $friend_id=$_POST['friend_id'];
        $friend_id_m=$friend_id."m";
        $uid=$this->session->userdata('uid');
        $data_checked_on=array(
    'time_checked_on'=>time(),
  );
        $this->db->where('u_id', $uid);
        $this->db->where('type_checked_on', $friend_id_m);
        $this->db->update('checked_on', $data_checked_on);
    }
}
