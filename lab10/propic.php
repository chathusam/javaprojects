<?php 
session_start();

?>

      <!--profile picture upload function -->
      <?php
         if(isset($_FILES['image'])){
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
            $destination = $_SESSION['username'] . "/";
            
            $expensions= array("jpeg","jpg","png");
            $userfilename = $_SESSION['username'];
            $filename = $userfilename.".".$file_ext;
            $urlforpic = $destination . $filename;
            if(in_array($file_ext,$expensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if($file_size > 2097152){
               $errors[]='File size must be excately 2 MB';
            }
            
            if(empty($errors)==true){

              

                  if (file_exists($urlforpic)) 
                    {
                       if (!unlink($urlforpic))
                          {
                          echo ("Error deleting $file");
                          }
                        else
                          {
                          } 
                    }

               move_uploaded_file($file_tmp,$destination.$filename);


                    $conn = mysqli_connect("localhost", "root", "", "online_cloth");
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } 

                    $sql = "UPDATE users SET picURL = '$urlforpic' WHERE username = '$userfilename'";
                    if(!mysqli_query($conn,$sql))
                        {
                              die("Error in updating!");
                        }
                    else
                    {

                    }
                    $conn->close();
                    

            }else{
               print_r($errors);
            }
         }

      ?>
      <!--end of profile picture upload function -->

      <script>
                    window.location="profile.php";
      </script>

