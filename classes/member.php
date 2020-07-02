<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');

class Member
{

   private $db;

   public function __construct() {
      $this->db = new Database();
      
   }
   public function fetchallData(){
     $sql= "select * from `member`";
     $showdata=$this->db->select($sql);
   return $showdata;
   }
   public function addMember($firstname, $lastname,$phone){
$sql="insert into member (firstname, lastname,phone) values ('$firstname', '$lastname','$phone')";
$ins_data=$this->db->insert($sql);
return $ins_data;
   }
   public function editMember($firstname, $lastname, $phone, $memid){
      $sql="update member set firstname='$firstname', lastname='$lastname',phone='$phone' where memberid='$memid'";
   $eidt_data=$this->db->update($sql);
   return $eidt_data;
   }
   public function deleteMember($memid){
     $sql="delete from member where memberid='$memid'";
  $this->db->delete($sql);
   }
    
}
?>