<?php

$query = $this->db->query('SELECT * FROM posts ORDER BY id DESC');

foreach ($query->result_array() as $row)
{
    echo "<div class='row'><div class='col-lg-5 text-center namePost'>";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('user_id'=>1));
        $query=$this->db->get();
        $user=$query->row();
        $remsec=time()-$row['timestamp'];
        $name=$user->name;
        $postid=$row['id'];
        $content=$row['content'];
        echo $name."</div></div>";
        echo "<div class='row'><div class='col-lg-3 text-left namePost'></div>";
        echo "<div class='col-lg-6 text-left contentPost' style='word-wrap:break-word;'>";
        echo $content;
        echo "</div><div class='col-lg-3 text-center contentPost'><button class='sideButton'><img src='".base_url()."assets/images/remove.png'></button><button class='sideButton'><img src='".base_url()."assets/images/up-arrow.png'></button><button class='sideButton'><img src='".base_url()."assets/images/chevron.png'></button></div></div><hr>";
}
?>
