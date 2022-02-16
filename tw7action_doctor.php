<?php
    $id=$name=$special=$date_joining=$total_exp=$age=$contact="";
    $idErr=$nameErr=$specialErr=$date_joiningErr=$total_expErr=$ageErr=$cantactErr="";

     if($_SERVER["REQUEST_METHOD"]=="POST"){
         if (empty($_POST["ID"])) {
              $id=$_POST["ID"];
         } else{
             $id=$_POST["ID"];
             if (!preg_match ("/^[0-9]*$/", $id) ){  
                $idErr = "Only numeric value is allowed.";   
            }  
         }
         if(empty($_POST["name"])){
             $nameErr="name is required";
         } else{
            $name =$_POST["name"];
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
              $nameErr = "Only letters and white space allowed";
            }
         }
         if(empty($_POST["Specialization"])){
           $specialErr="Specialization is required";
        } else{
            $special=$_POST["Specialization"];
        }
        if(empty($_POST["DOJ"])){
            $date_joiningErr="date-of-joining is required";
        } else{
            $date_joining=$_POST["DOJ"];
        }
        if(empty($_POST["texp"])){
            $total_expErr="mention your total experience";
        } else{
            $total_exp=$_POST["texp"];
        }

        if(empty($_POST["age"])){
           $ageErr="mention your total experience";
        } else{
            $age=$_POST["age"];
        }
         
        
        if(empty($_POST["con_num"])){
            $cantactErr="cantact number is required";
         } else{
             $contact=$_POST["con_num"];
         }
     }

     echo "$id   $idErr";
     echo "$name $nameErr";
     echo "$special  $specialErr"; 
     echo "$date_joining $date_joiningErr"; 
     echo " $total_exp $total_expErr";
     echo "$age  $ageErr";
     echo "$contact $cantactErr <br>";

     $servername="localhost";
     $username="root_anu";
     $password="anusha";
     $dbname="hospital";
     //creating connection to server
     $conn=new mysqli($servername,$username,$password,$dbname);
     if($conn->connect_error){
         die("connection not made".$conn->connect_error);
     } else{
         echo "connected to databse hospital";
     }
     $sql="INSERT INTO doctors(Id,FName,Specialization,Date_of_joining,Total_experience,Age,Contact_number)
     VALUES('$id','$name','$special','$date_joining','$total_exp','$age',$contact)";
      if($conn->query($sql)===TRUE){
          echo "data inserted in table doctors";
      } else{
          echo "error in inserting data:".$sql."<br>".$conn->error;
      }
      $conn->close();

  ?>
    

