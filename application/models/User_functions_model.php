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

    public function retrieve_posts_2($uid)
    {
        $query = $this->db->query("SELECT * FROM users,posts WHERE users.user_id=$uid AND posts.u_id=$uid ORDER BY posts.id DESC");
        return $query->result_array();
    }

    public function retrieve_search_results($search_data)
    {
        //return $this->session->userdata('uid').$search_data;
        $query_string="SELECT * FROM users WHERE name LIKE '".$search_data."%' LIMIT 25";
        $query = $this->db->query($query_string);
        return $query->result_array();
    }
    public function check_password_exists($current_password, $new_password)
    {
        $uid=$this->session->userdata('uid');
        $query_string="SELECT * FROM users WHERE user_id='$uid' AND password='$current_password'";
        $query_execute= $this->db->query($query_string);
        $query_num_rows=$query_execute->num_rows();
        return $query_num_rows;
    }
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
    public function get_uid_from_email($email)
    {
        $user = $this->db->query("SELECT * FROM users WHERE email='$email'");
        $user_result = $user->result_array();
        return $user_result[0]['user_id'];
    }
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
    public function get_profile_pic_friend($uid)
    {
        //$this->
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
    public function update_caption($album, $img_captions)
    {
        $uid=$this->session->userdata('uid');
        $num_images=sizeof($img_captions);
        //select $num_images last uploaded
        $result_images= $this->db->query("SELECT * FROM profile_pic WHERE u_id='$uid' ORDER BY id DESC LIMIT $num_images");
        $profile_pic_file_name = $result_images->result_array();
        //print_r($profile_pic_file_name);
        /*
          for($i=0;$i<$num_images;$i++)
          {
            echo $profile_pic_file_name[$i]['id']."<br>";
          }
          */
        for ($i=0;$i<$num_images;$i++) {
            $data=array(
            'caption' => $img_captions[$num_images-$i-1],
        );
            $this->db->where('id', $profile_pic_file_name[$i]['id']);
            $this->db->update('profile_pic', $data);
        }
        echo $num_images;
    }
    public function friends_data($uid, $friend_uid)
    {
        //return $uid.$friend_uid;
        $result_images= $this->db->query("SELECT * FROM friends WHERE (u_id='$uid' AND friend_id='$friend_uid') OR (friend_id='$uid' AND u_id='$friend_uid')");
        $friends_table = $result_images->result_array();
        return $friends_table;
    }



    public function deletePost_model()
    {
        $uid=$this->session->userdata('uid');
        $postid=$this->input->post('postid');
        $this->deleteUserPost($postid);
    }
    public function update_personal_information_model()
    {
        $gender_value=$this->input->post('gender');
        $date_birth=$this->input->post('dob');
        $uid=$this->session->userdata('uid');
        $this->db->where('u_id', $uid);
        $this->db->update('primary_information', array('gender' => $gender_value,'date_birth' =>$date_birth));
        echo 1;
    }
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
    public function upload_photo_model()
    {
        $config['upload_path'] = base_url().'assets/user_images';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['overwrite'] = 'TRUE';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $img = $this->input->post('userfile');
        if (! $this->user_functions->upload_photo($img)) {
            $error = array('error' => $this->upload->display_errors());
            echo "Failed!!";
            print_r($error);
        //$this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            echo "File uploaded successfully!!";
            //$this->load->view('upload_success', $data);
        }
    }
    public function caption_profile_update_model()
    {
        $img_caption = $this->input->post('data_caption');
        //print_r($img);
        $update_captions_result=$this->update_caption('profile', $img_caption);
    }
}
