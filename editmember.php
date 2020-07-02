<?php
include_once 'classes/member.php';
$member=new Member();
if (isset($_POST['efirstname'])) {
    $firstname = $_POST['efirstname'];
    $lastname = $_POST['elastname'];
    $phone = $_POST['ephone'];
    $memid = $_POST['memid'];

   $addmember=$member->editMember($firstname, $lastname, $phone ,$memid);
}
