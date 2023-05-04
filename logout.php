<?php
// include('config.php');
// $google_client->revokeToken();

session_unset();
session_destroy();
echo "<script>Logged out</script>";
header('refresh:0; url=login.php');
?>