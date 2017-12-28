<?php
session_start();

if(isset($_POST['ajaxsend']) && $_POST['ajaxsend']==true){
	// Code to save and send chat
	$chat = fopen("chatdata.txt", "a");
date_default_timezone_set("Asia/Calcutta");
$time=  date("h:ia");
    $username=$_SESSION['username'];
       $chatmsg=trim(htmlentities(trim($_POST['chat']), ENT_NOQUOTES, 'utf-8'));
if ($username == "321" ) {
 $data= "   <div class='message sent'>
                       $chatmsg
                     <span class='metadata'>
                      <span class='time'>$time</span><span class='tick'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='15' id='msg-dblcheck-ack' x='2063' y='2076'><path d='M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.88a.32.32 0 0 1-.484.032l-.358-.325a.32.32 0 0 0-.484.032l-.378.48a.418.418 0 0 0 .036.54l1.32 1.267a.32.32 0 0 0 .484-.034l6.272-8.048a.366.366 0 0 0-.064-.512zm-4.1 0l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.88a.32.32 0 0 1-.484.032L1.892 7.77a.366.366 0 0 0-.516.005l-.423.433a.364.364 0 0 0 .006.514l3.255 3.185a.32.32 0 0 0 .484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z' fill='#4fc3f7'/></svg></span>
                  </span>
                </div>
"; 
} elseif ( $username == "567") {
   $data="       <div class='message received'>
                     $chatmsg
                  <span class='metadata'><span class='time'>$time</span></span>
                </div>

";
} else {
   
}
if($chatmsg != null){
    	fwrite($chat,$data);
	fclose($chat);
}




	$chat = fopen("chatdata.txt", "r");
	echo fread($chat,filesize("chatdata.txt"));
	fclose($chat);
} else if(isset($_POST['ajaxget']) && $_POST['ajaxget']==true){
	// Code to send chat history to the user
	$chat = fopen("chatdata.txt", "r");
	echo fread($chat,filesize("chatdata.txt"));
	fclose($chat);
} else if(isset($_POST['ajaxclear']) && $_POST['ajaxclear']==true){
	// Code to clear chat history
	$chat = fopen("chatdata.txt", "w");
	$data="<b><center>".$_SESSION['username'].'</b> cleared chat<br></center>';
	fwrite($chat,$data);
	fclose($chat);
}