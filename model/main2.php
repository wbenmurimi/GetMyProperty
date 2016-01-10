<?php


        if (!empty($_FILES['postername'])) {

            $myFile = $_FILES['postername'];
            $name = preg_replace("/[^A-Z0-9._-]/i","_",$myFile["name"]);
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            if ($myFile['error'] !== UPLOAD_ERR_OK) {

                echo '{"results":0,"message":"Had an error uploading file."}';
                exit;
            }

            if ($extension == "JPG" || $extension == "PNG" ) {

            } else{
                echo '{"results":0,"message":"Only jpeg,png format files are allowed"}';
                exit;
            }
             $i=0;
            $parts=pathinfo($name);

            while (file_exists(UPLOAD_DIR.$name)) {

                $i++;
                $name = $parts["filename"] . "-" . $i ."." . $parts["extension"];
            }

            $success = move_uploaded_file($myFile["tmp_name"],UPLOAD_DIR . $name);

            if (!$success) {
                echo '{"results":0,"message":"Could not successfully move the file to target directory"}';
                exit;
            }
            else{
                include "post.php";

                $post = new Post();
                $name = $_REQUEST['ename'];
                 $description = $_REQUEST['description'];
                 $d= $_REQUEST['event_date'];
                 $date=date("Y-m-d",strtotime($d));;
                // $image=$_REQUEST['postername'];
                 $user= $_SESSION['username'];
              if(!$post->addMyPost($name,$description,$date,$filename,$user)){
                echo '{"result": 0, "message": "post was not added"}';
                return;
              }
              echo '{"result": 1, "message": "post was added successfully"}';

              return;
            }


        }
        else{
            echo '{"results":"Empty file called"}';
        }
    

?>
