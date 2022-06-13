<?php

    if(isset($_POST['submit'])){
        $username = addslashes($_POST['fullname']??'');
        $email =addslashes( $_POST['email']??'');
        // gets user password and encrypts it to provide additional security
        $password = md5( addslashes($_POST['password']??''));

    echo registerUser($username, $email, $password);

    }


  

function registerUser($username, $email,$password){
    //    first check if theres a user with that email
    $array['user']=array($username, $email, $password);
      if(chechkDuplicateReg($email)){
          return 'email already exists';
      }else{ 
        // since theres no user with that email, 
        // create user and save details in storage/users.csv
          $storage = '../storage/users.csv';
          $file_path = fopen($storage,'a');
          $f_con = fgetcsv(fopen($storage,'r'));
         
          foreach ($array as $line ) {
              fputcsv($file_path, $line);
          } 

         
           return 'New User Created Successfully!';
      }
    
    }
    
    function chechkDuplicateReg($email){
     //checks if user has registered with the email before
        $storage = '../storage/users.csv';
        $csv = readCSV($storage); 
        foreach($csv as $key){
            if(isset($key[1])){
                if($key[1]== $email){
                    return true;
                }
            }
        }
    
    }



    
//reads the csv file
    function readCSV($csvFile){
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle) ) {
            $line_of_text[] = fgetcsv($file_handle, 1024);
        }
        fclose($file_handle);
        return $line_of_text;
    }

// echo "HANDLE THIS PAGE";


