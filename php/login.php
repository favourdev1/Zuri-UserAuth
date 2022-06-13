<?php
if(isset($_POST['submit'])){
    
    $email =addslashes($_POST['email']??'');
    $password =addslashes(md5( $_POST['password']??''));

    loginUser($email, $password);

}


function LoginUser($email,$password){
    $storage = '../storage/users.csv';
    $csv = readCSV($storage); 
  
      $i=0;
    foreach($csv as $key){
       
      if(isset($key[1])&& isset($key[2])){
        
          
      if($key[1] == $email && $key[2] ==$password ){
         
         session_start();
       
        $_SESSION['username']=$key[0];
        $_SESSION['email']=$key[1];
    //    echo $key[0].'<br>'.$key[1];
        header("Location: ../dashboard.php");
        break;
        
        }  
      
     
     }
     if($i>=count($csv)-1){
       echo  'Incorrect Username or password';
     }$i++;
    } 
     

  }



  function readCSV($csvFile){
    $file_handle = fopen($csvFile, 'r');
    while (!feof($file_handle) ) {
        $line_of_text[] = fgetcsv($file_handle, 1024);
    }
    return $line_of_text;
    fclose($file_handle);
    
  }
  
     
// echo '<br>';

// echo "HANDLE THIS PAGE";

