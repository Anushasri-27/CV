<?php
   $type=$numb_bed=$rate=$pateint="";
   $typeErr=$numb_bedErr=$rateErr=$pateintErr=" ";
   if($_SERVER["REQUEST_METHOD"]=="GET"){
     if(empty($_GET["tr"])){
              $typeErr="type is required";
     }else{
              $type=$_GET["tr"];
     }

     if(empty($_GET["nb"])){
        $numb_bedErr="number of bed  is required";
      }else{
        $numb_bed=$_GET["nb"];
      }
      
      if(empty($_GET["charges"])){
        $rateErrr="mention charges of room per/day is required";
        }else{
        $rate=$_GET["charges"];
        }
       
        if(empty($_GET["np"])){
            $pateintErr="mention number of pateints ";
            }else{
            $pateint=$_GET["np"];
            }


   }


   echo "$type $typeErr";
   echo "$numb_bed  $numb_bedErr";
   echo "$rate  $rateErr";
   echo "$pateint $pateintErr";

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
     $sql="INSERT INTO Rooms_Wards(Type_room,Total_no_of_beds,charges_per_day,number_of_pateint)
     VALUES('$type','$numb_bed','$rate','$pateint')";
      if($conn->query($sql)===TRUE){
          echo "data inserted in table Rooms_Wards";
      } else{
          echo "error in inserting data:".$sql."<br>".$conn->error;
      }
      $conn->close();

  ?>

