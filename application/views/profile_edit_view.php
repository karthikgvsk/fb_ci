
<div id=main>
    <?php
    
    if(isset($profile_change)){
        echo $profile_change;
        echo "<br />";
    }
    if(isset($valid_errors) && $valid_errors == 1){
        echo validation_errors();
    }
    ?>
    <br />
    <br />
    <h1>your previous attributes</h1>
    <?php
        echo "<table>";
        echo "<tr>";
        echo "<td>username:{$user->username}</td>";
        echo "</tr>";
        //echo "<li>password:{$user->password}</li>";
        echo "<tr>";
        echo "<td>first_name:{$user->first_name}</td>";
        echo "</tr>";
        
        echo "<tr>";
        echo "<td>last_name:{$user->last_name}</td>";
        echo "</tr>";
        
        echo "<tr>";
        echo "<td>profile_pic:<img src = ".base_url()."profile_pics/{$uid}.jpg width = 200px /></td>";
        echo "</tr>";
        
        echo "</table>";
    ?>
    
    <br />
    <hr />
    
    <h1>profile edit</h1>
    <?php
        echo form_open('login/edit_profile');
        echo "<ul>";
        echo "<li>username:";
        echo form_input('username');
        echo "</li>";
        echo "<li>password:";
        echo form_password('password');
        echo "</li>";
        echo "<li>first name:";
        echo form_input('first_name');
        echo "</li>";
        echo "<li>last name:";
        echo form_input('last_name');
        echo "</li>";
        echo "<li>" . form_submit('submit', 'submit') . "</li>";
        echo form_close();
    ?>

