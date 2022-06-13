<?php
function logout(){
        /*
    Check if the existing user has a session
    if it does
    destroy the session and redirect to login page
    */
    session_start();
        if (isset($_SESSION['username'])){
            // remove all session variables
            session_unset();
            // destorys all session
            session_destroy();
            
        }
    echo  'User logged out successfully ';
     sleep(1);
      header("Location: ../index.php");
}
logout();
// echo "HANDLE THIS PAGE";
