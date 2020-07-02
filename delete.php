<?php
include_once 'classes/member.php';
$member=new Member();
	if(isset($_POST['memid'])){
		$memid=$_POST['memid'];
        $deletemember=$member->deleteMember($memid);
		
	}
