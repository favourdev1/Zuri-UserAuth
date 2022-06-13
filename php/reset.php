<?php
if(isset($_POST['submit'])){
    $email = $_POST['email']??'';
    //encrypts the new password and saves in database csv file
    $newpassword = md5($_POST['password']);
// echo $newpassword;
    resetPassword($email, $newpassword);
}

function resetPassword($email, $newpassword){
    //open file and check if the username exist inside
    //if it does, replace the password
  
    // //What and where you want to insert
    // $DataToInsert = '11,Shamit,Male';
    // $PositionToInsert = chechkEmailPosition($email);
    // echo $PositionToInsert;
    // //Full path & Name of the CSV File
    // $FileName = '../storage/users.csv';
    
    // //Read the file and get is as a array of lines.
    // $arrLines = file($FileName);
    
    // //Insert data into this array.
    // $Result = array_insert($arrLines, $PositionToInsert, $DataToInsert);
    
    // //Convert result array to string.
    // $ResultStr = implode("", $Result);
    
    // //Write to the file.
    // file_put_contents($FileName, $ResultStr);

    echo chechkEmailPosition($email, $newpassword);
     
}


  function array_insert($array, $pos, $val)
    {
        $array2 = array_splice($array, $pos);
        $array[] = $val;
        $array = array_merge($array, $array2);
    
        return $array;
    }
    
    function chechkEmailPosition($email, $newpassword){
        //checks if user has registered with the email before
           $storage = '../storage/users.csv';
           $csv['user'] = readCSV($storage); 
           $i=0;
           $file_path = fopen($storage,'r');
           echo (count($csv['user']));
           foreach($csv['user'] as $key){
               if(isset($key[1])){
                   if($key[1]== $email){
                    $username= $key[0];
                      $passarray= array(0=>$username,1=>$email, 2=> $newpassword);
                    //   print_r(array_replace($csv[$i],$passarray));
                    $csv['user'][$i][2]=$newpassword;
                    print_r($csv['user'][$i]);
                      echo '<br>';
                      echo '<pre>';
                       print_r($csv);
                       echo '<pre>';
                   }

               }
                $i++;
           }
           echo '<br>';
           echo '<br>';
           $i=0;

        //    foreach($csv as $csv1){
        //         foreach( $csv1 as $value){
        //             print_r( $csv1);
        //             fputcsv( $file_path, $value);
        //             return "password reset successful";
        //             // break;
        //         }
        //    }
        echo count($csv['user']);
        $j=0;
      $csv3[]='';
           for($j; $j<=count($csv['user']); $j++){
           print_r( array_insert($csv3, $csv['user'][$j]??'',0));
            for ($k=0;$k>=count($csv); $k++){
                
            }
            
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
  


echo "HANDLE THIS PAGE";




