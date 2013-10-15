

<div id=main>

<?php
// HIGH MODIFICATION REQUIRED BY INCLUDING SEARCH ENGINE ETC
echo form_open('friend/friend_request_sender');
echo "<br />";
foreach($all_users->result() as $row) {
    if($row->id != $uid){
        
        echo "<img src=".base_url()."profile_pics/".$row->id.".jpg width=50px />";
        
        echo form_checkbox('friend_request_sent_array[]', $row->id, false);
        echo " ";
        echo $row->username;
        echo "<br />";
    }
}
echo "<br />";
echo form_submit('submit', 'send');
echo "<br />";
echo form_close();

?>


</div>

</div>

</body>

</html>