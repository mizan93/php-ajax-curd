<?php
include_once 'classes/member.php';
$member=new Member();
if (isset($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];

   $addmember=$member->addMember($firstname, $lastname,$phone);
}
?>