<?php
class Auth extends CI_Controller{

  public function index()
  {
    $this->form_validation->set_rules('email','poipo','required');
    $this->form_validation->set_rules('password','Password','required|min_length[5]');

    if($this->form_validation->run()==TRUE){
      $email=$_POST['email'];
      $password=md5($_POST['password']);
      //echo "<script>alert('hi');</script>";
      //check user in db
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where(array('email'=>$email,'password'=>$password));
      $query=$this->db->get();

      $user=$query->row();
      //if user exists
      //echo "<script>alert('".$query->num_rows().$username.$password."');</script>";
      if($query->num_rows() > 0){
        //temporary message
        $this->session->set_flashdata("success", "Welcome,".$user->name);
        $this->session->unset_userdata('error');
        //set session variables
        $this->session->set_userdata("user_logged",1);
        $this->session->set_userdata("userid",$user -> user_id);
        //redirect to profile page
        redirect("user/profile","refresh");

      } else {
        $this->session->set_flashdata("error","No such acccount exists in database");
        $this->session->unset_userdata('success');
        //redirect("auth/login","refresh");
      }
    }
    $this->load->view("login");
  }
  public function register()
  {
    if(isset($_POST['register']))
    {
      $this->form_validation->set_rules('name','Name','required');
      $this->form_validation->set_rules('email','Email','required');
      $this->form_validation->set_rules('password','Password','required|min_length[5]');
      $this->form_validation->set_rules('password','jojio','required|min_length[5]|matches[password]');
      //$this->form_validation->set_rules('phone','Phone','required|min_length[5]');

      if($this->form_validation->run()==TRUE){
        echo "form validated";

        //add user in db
        $data=array(
          //'username'=>$_POST['username']
          'name'=>$_POST['name'],
          'email'=>$_POST['email'],
          'password'=>md5($_POST['password']),
          //'gender'=>$_POST['gender'],
          //'created_date'=>date('Y-m-d'),
          //'phone' => $_POST['phone']
          'time'=>time(),
          'activation'=>0,
        );
        $this->db->insert('users',$data);

        $this->session->set_flashdata("success","Your account has been created. You can login now");
        redirect("/","refresh");

      }
    }
    //load view
    $this->load->view("register");
  }

}

 ?>
