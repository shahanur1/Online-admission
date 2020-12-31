<?php 

    if(isset($_POST['btn-send']))
    {
       $Name = $_POST['UName'];
       $Email = $_POST['Email'];
       $Subject = $_POST['Subject'];
       $Msg = $_POST['msg'];

       if(empty($Name) || empty($Email) || empty($Subject) || empty($Msg))
       {
           header('location:contact.php?error');
       }
       else
       {
           $to = "edtechbd@gmail.com";

           if(mail($to,$Email, $Msg))
           {
               header("location:contact.php?success");
           }
       }
    }
    else
    {
        header("location:contact.php");
    }
?>