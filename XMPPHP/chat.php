<?php



include ("XMPP.php"); 

$conn = new XMPP('202.129.227.20', 5222, 'cipto', 'juragan', 'xmpphp', 'mcojaya.com', $printlog=False, $loglevel=LOGGING_INFO); 

$conn->use_encryption = False;
$conn->connect(); $conn->processUntil('session_start'); 


$conn->message('morti1@mcojaya.com', 'This is a test message!'); 

$conn->disconnect();


 ?> 