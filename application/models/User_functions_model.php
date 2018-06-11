<?php
/**
 * [User_functions_model the operations that are used in User_functions controller]
 * these include more specific functions
 */
class User_functions_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('upload');
    }
    /**
     * [deleteUserPost is executed whenever the user pressed the delete button]
     * @param  [int] $postid [the unique id of post]
     * @return [void]
     */
    public function deleteUserPost($postid)
    {
        $this->db->where('id', $postid);
        $this->db->delete('posts');
    }
    /**
     * [retrieve_posts posts is retrieved after joining the result from  both tables to get name as well]
     * @return [type] [description]
     */
    public function retrieve_posts()
    {
        $query = $this->db->query('SELECT * FROM users INNER JOIN posts on users.user_id = posts.u_id ORDER BY id DESC');
        return $query->result_array();
    }
    /**
     * [retrieve_posts_2 ]
     * @param  [type] $uid [description]
     * @return [type]      [description]
     */
    public function retrieve_posts_2($uid)
    {
        $query = $this->db->query("SELECT * FROM users,posts WHERE users.user_id=$uid AND posts.u_id=$uid ORDER BY posts.id DESC");
        return $query->result_array();
    }
    /**
     * [retrieve_search_results this function gets the array of the search data results]
     * @param  [type] $search_data [the characters entered in the search bar]
     * @return [arr]              [the users having a name similar to the search input is displayed]
     */
    public function retrieve_search_results($search_data)
    {
        //return $this->session->userdata('uid').$search_data;
        $query_string="SELECT * FROM users WHERE name LIKE '".$search_data."%' LIMIT 5";
        $query = $this->db->query($query_string);
        return $query->result_array();
    }
    // TODO: new password is not needed below
    /**
     * [check_password_exists a function that checks for whether the current password entered exists]
     * @param  [type] $current_password [the entered current password]
     * @param  [type] $new_password     [the entered new password]
     * @return [int]                   [number of rows of the entered password and user id in session]
     */
    public function check_password_exists($current_password, $new_password)
    {
        $uid=$this->session->userdata('uid');
        $query_string="SELECT * FROM users WHERE user_id='$uid' AND password='$current_password'";
        $query_execute= $this->db->query($query_string);
        $query_num_rows=$query_execute->num_rows();
        return $query_num_rows;
    }
    /**
     * [update_password the function that updates the current password to the new password]
     * @param  [type] $new_password [entered new password]
     * @return [type]               [descriptio]
     */
    public function update_password($new_password)
    {
        $uid=$this->session->userdata('uid');
        $data=array(
      'password' => $new_password,
      );
        $this->db->where('user_id', $uid);
        $this->db->update('users', $data);
        $update_check=$this->db->affected_rows();
        return $update_check;
    }
    /**
     * [check_welcome_screen function that checks for whether the welcome screen is enabled or not]
     * @return [type] [description]
     */
    public function check_welcome_screen()
    {
        $uid=$this->session->userdata('uid');
        $this->db->select('*');
        $this->db->from('preferences');
        $this->db->where(array('u_id'=>$uid));
        $query=$this->db->get();
        $user=$query->row();
        if (!empty($user)) {
            return $user->welcome_screen;
        }
    }
    /**
     * [get_uid_from_email the uid of a user having the email is returned]
     * @param  [type] $email [the email id of the user]
     * @return [type]        [uid of a user with the provided email id is returned]
     */
    public function get_uid_from_email($email)
    {
        $user = $this->db->query("SELECT * FROM users WHERE email='$email'");
        $user_result = $user->result_array();
        return $user_result[0]['user_id'];
    }
    /**
     * [get_profile_pic used in other models to display the link to the profile picture]
     * @return [str] [link to profile picture]
     */
    public function get_profile_pic()
    {
        $uid=$this->session->userdata('uid');
        $user = $this->db->query("SELECT * FROM profile_pic WHERE u_id='$uid'");
        $profile_pic_file_name = $user->result_array();
        if (!empty($profile_pic_file_name)) {
            $profile_pic_head_location=base_url().'uploads/';
            foreach ($profile_pic_file_name as $value) {
                if ($value['set_profile_pic']==1) {
                    $profile_pic_name=$value['profile_pic_file_name'];
                }
            }
            $profile_pic_val=$profile_pic_head_location.$profile_pic_name;
            return $profile_pic_val;
        }
    }
    /**
     * [get_profile_pic_friend the profile picture link of the friend is retrieved]
     * @param  [type] $uid [user id of friend]
     * @return [str]      [profile pic link of the friend]
     */
    public function get_profile_pic_friend($uid)
    {
        //get uid of $email
        $user = $this->db->query("SELECT * FROM profile_pic WHERE u_id='$uid'");
        $profile_pic_file_name = $user->result_array();
        $profile_pic_head_location=base_url().'uploads/';
        foreach ($profile_pic_file_name as $value) {
            if ($value['set_profile_pic']==1) {
                $profile_pic_name=$value['profile_pic_file_name'];
                $profile_pic_val=$profile_pic_head_location.$profile_pic_name;
                return $profile_pic_val;
            }
        }
    }
    /**
     * [remove_set_profile used by the profile pic uploader to set all the other profile pictures that were uploaded and set it as not profile pictures]
     * @return [int] $update_check [the successful completion of the update denoted by a 1 is returned]
     */
    public function remove_set_profile()
    {
        $uid=$this->session->userdata('uid');
        $data=array(
    'set_profile_pic' => 0,
    );
        $this->db->where('u_id', $uid);
        $this->db->update('profile_pic', $data);
        $update_check=$this->db->affected_rows();
        return $update_check;
    }
    /**
     * [insert_profile_pic_db a profile picture's data is inserted into the table profile_pic and set_profile_pic is set to 1]
     * @param  [type] $file_name [the name of the file after appending unique numbers]
     * @return [type]            [description]
     */
    public function insert_profile_pic_db($file_name)
    {
        $uid=$this->session->userdata('uid');
        $data=array(
      'u_id' => $uid,
      'profile_pic_file_name' => $file_name,
      'time_profile_pic' => time(),
      'set_profile_pic' => 1
    );
        $this->db->insert('profile_pic', $data);
        return 1;
    }
    /**
     * [insert_timeline_pic_db a pic uploaded to the timeline is inserted into pictures table with its metadata in it]
     * @param  [type] $file_name [the name of the file after appending unique numbers]
     * @return [type]            [description]
     */
    public function insert_timeline_pic_db($file_name)
    {
        $uid=$this->session->userdata('uid');
        $data=array(
      'u_id' => $uid,
      'pic_file_name' => $file_name,
      'time_pic' => time(),
      'album' => 'timeline'
    );
        $this->db->insert('pictures', $data);
        return 1;
    }
    /**
     * [update_caption once the picture is uploaded to the file server and its corresponding data is inserted into the pictures/profile_pic table, the caption is then loaded. Once caption is submitted it will update the corresponding data row]
     * this is specific to profile_pic only
     * @param  [type] $album        [description]
     * @param  [type] $img_captions [description]
     * @return [type]               [description]
     */
    public function update_caption($album, $img_captions)
    {
        $uid=$this->session->userdata('uid');
        $num_images=sizeof($img_captions);
        //select $num_images last uploaded
        $result_images= $this->db->query("SELECT * FROM profile_pic WHERE u_id='$uid' ORDER BY id DESC LIMIT $num_images");
        $profile_pic_file_name = $result_images->result_array();
        for ($i=0;$i<$num_images;$i++) {
            $data=array(
            'caption' => $img_captions[$num_images-$i-1],
        );
            $this->db->where('id', $profile_pic_file_name[$i]['id']);
            $this->db->update('profile_pic', $data);

            $data_2=array(
          'u_id' => $uid,
          'picture_id' => $profile_pic_file_name[$i]['id']."p",
          'timestamp' => time(),
        );
            $this->db->insert('posts', $data_2);
            return 1;
        }
        echo $num_images;
    }
    /**
     * [update_caption_2 once the picture is uploaded to the file server and its corresponding data is inserted into the pictures/profile_pic table, the caption is then loaded. Once caption is submitted it will update the corresponding data row]
     * this is specific to timeline pictures only
     * @param  [type] $album        [description]
     * @param  [type] $img_captions [description]
     * @return [type]               [description]
     */
    public function update_caption_2($album, $img_captions)
    {
        $uid=$this->session->userdata('uid');
        $num_images=sizeof($img_captions);
        //select $num_images last uploaded
        $result_images= $this->db->query("SELECT * FROM pictures WHERE u_id='$uid' ORDER BY id DESC LIMIT $num_images");
        $profile_pic_file_name = $result_images->result_array();
        for ($i=0;$i<$num_images;$i++) {
            $data=array(
            'image_caption' => $img_captions[$num_images-$i-1],
        );
            $this->db->where('id', $profile_pic_file_name[$i]['id']);
            $this->db->update('pictures', $data);

            $data_2=array(
          'u_id' => $uid,
          'picture_id' => $profile_pic_file_name[$i]['id'],
          'timestamp' => time(),
        );
            $this->db->insert('posts', $data_2);
            return 1;
        }
        echo $num_images;
    }
    public function friends_data($uid, $friend_uid)
    {
        $result_images= $this->db->query("SELECT * FROM friends WHERE (u_id='$uid' AND friend_id='$friend_uid') OR (friend_id='$uid' AND u_id='$friend_uid')");
        $friends_table = $result_images->result_array();
        return $friends_table;
    }
    /**
     * [deletePost_model this function is used for deleting a user's post whenever the delete button is clicked]
     * @return void
     */
    public function deletePost_model()
    {
        $uid=$this->session->userdata('uid');
        $postid=$this->input->post('postid');
        $this->deleteUserPost($postid);
    }
    /**
     * [update_personal_information_model the function where the primary_information table data row is updated whenever the user clicks on 'Save Changes']
     * @return [type] [description]
     */
    public function update_personal_information_model()
    {
        $gender_value=$this->input->post('gender');
        $date_birth=$this->input->post('dob');
        $uid=$this->session->userdata('uid');
        $this->db->where('u_id', $uid);
        $this->db->update('primary_information', array('gender' => $gender_value,'date_birth' =>$date_birth));
        echo 1;
    }
    /**
     * [update_preferences_model to update the preferences as toggled by the user under the settings tab -> could be either auto-login,welcome_screen etc.]
     * @return [type] [description]
     */
    public function update_preferences_model()
    {
        $uid=$this->session->userdata('uid');
        $auto_login_value=$this->input->post('auto_login_val');
        $welcome_screen_val=$this->input->post('welcome_screen_val');
        $select_value=$this->input->post('select_val');
        $this->db->where('u_id', $uid);
        $this->db->update('preferences', array('auto_login' => $auto_login_value,'welcome_screen' =>$welcome_screen_val));
        echo $auto_login_value.$welcome_screen_val.$select_value;
    }
    /**
     * [change_password_model used to update the new password as set by the user under settings]
     * @return [type] [description]
     */
    public function change_password_model()
    {
        $current_password=$this->input->post('current_password');
        $new_password=$this->input->post('new_password');
        $confirm_new_password=$this->input->post('confirm_new_password');
        $current_password=htmlentities($current_password);
        $new_password=htmlentities($new_password);
        $confirm_new_password=htmlentities($confirm_new_password);
        if ($current_password=='') {
            exit('Current Password Field is Empty');
        }
        if ($new_password=='') {
            exit('New Password Field is Empty');
        }
        if ($confirm_new_password=='') {
            exit('Confirm New Password Field is Empty');
        }
        if ($new_password != $confirm_new_password) {
            exit('New Password and Confirm Password Fields do not match.');
        }
        if ($current_password == $new_password) {
            exit('1');
        }
        $current_password=md5($current_password);
        $new_password=md5($new_password);
        $num_rows=$this->check_password_exists($current_password, $new_password);
        if ($num_rows==1) {
            //runs the update password model method and when it's 1, its successful
            $password_update=$this->update_password($new_password);
            if ($password_update==1) {
                echo '1';
            } else {
                echo 'Password Not Updated';
            }
        } else {
            echo 'Current Password is Incorrect';
        }
    }
    /**
     * [caption_profile_update_model the model used for updating the caption on the profile picture]
     * @return void
     */
    public function caption_profile_update_model()
    {
        $img_caption = $this->input->post('data_caption');
        $update_captions_result=$this->update_caption('profile', $img_caption);
    }
    /**
     * [caption_image_update_model the model used for updating the caption on the timeline picture]
     * @return void
     */
    public function caption_image_update_model()
    {
        $img_caption = $this->input->post('data_caption');
        $update_captions_result=$this->update_caption_2('profile', $img_caption);
    }
}
