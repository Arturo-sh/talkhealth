
<?php
session_start();

require_once "../../config/database.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if (isset($_POST['Guardar'])) {
        if (isset($_SESSION['id_user'])) {
    
            $old_pass    = md5(mysqli_real_escape_string($mysqli, trim($_POST['old_pass'])));
            $new_pass    = md5(mysqli_real_escape_string($mysqli, trim($_POST['new_pass'])));
            $retype_pass = md5(mysqli_real_escape_string($mysqli, trim($_POST['retype_pass'])));

 
            $id_user = $_SESSION['id_user'];


            $sql = mysqli_query($mysqli, "SELECT password FROM usuarios WHERE id_user=$id_user")
                                          or die('error: '.mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($sql);

         
            if ($old_pass != $data['password']){
                header("Location: ../../main.php?module=password&alert=1");
            }

          
            else {

                
                if ($new_pass != $retype_pass){
                        header("Location: ../../main.php?module=password&alert=2");
                }

               
                else {
                   
                    $query = mysqli_query($mysqli, "UPDATE usuarios SET password = '$new_pass'
                                                                  WHERE id_user  = '$id_user'")
                                                    or die('error : '.mysqli_error($mysqli));   

                   
                    if ($query) {
                        
                        header("location: ../../main.php?module=password&alert=3");
                    }   
                }
            }
        }
    }   
}               
?>