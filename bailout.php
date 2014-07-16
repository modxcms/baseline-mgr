<?php
//run this file if you mess up your new manager theme and get locked out.
//delete after done

$mysqli = new mysqli("localhost", "cXXX", "XXX", "instance_cXXX_modx");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} else {
   echo "<p>Good Work Bro. Connected...</p>";
}
 
$query = 'UPDATE modx_system_settings SET value = "default" WHERE key = "manager_theme"';
$mysqli->query($query);
echo "<p>You have reset the manager to the default theme.</p>";
$mysqli->close();
?>
