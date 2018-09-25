<?php
/**
 * Created by PhpStorm.
 * User: Thilina
 * Date: 7/4/2018
 * Time: 9:44 PM
 */


// Create connection to Oracle
$conn = oci_connect("thilina", "123", "localhost");
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
else {
   //print "Connected to Oracle!";
}
// Close the Oracle connection
//oci_close($conn);

?>