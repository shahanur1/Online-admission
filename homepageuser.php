<?php

    session_start();
    error_reporting(0);

$con=mysqli_connect("localhost","root","","oas");
$q=mysqli_query($con,"select s_name from t_user_data where s_id='".$_SESSION['user']."'");
$n=  mysqli_fetch_assoc($q);
$stname= $n['s_name'];
$id=$_SESSION['user'];


$sta=mysqli_query($con,"select s_stat from t_status where s_id='".$_SESSION['user']."'");
$stat=  mysqli_fetch_assoc($sta);
$stval= $stat['s_stat'];

$result = mysqli_query($con,"SELECT * FROM t_user WHERE s_id='".$_SESSION['user']."'");
                    
                    while($row = mysqli_fetch_array($result))
                      {
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
       
    </head>
    <body style="background-image:url(./images/inbg.jpg) ">
        
        <?php  

include 'usersession.php';

?>
      <form id="admin" action="admin.php" method="post">
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                        <img src="images/cutm.jpg" width="100%" style="box-shadow: 0px 5px 5px #999999; "></img>
                  </div>
                 </div>    
             </div>
          
            <div class="container-fluid" id="dmid">    
                <div class="row">
                  <div class="col-sm-12">
                  <center>     <font style="color:white; font-family: Verdana; width:100%; font-size:20px;">
                <b>My Profile</b> </font></center>
                  </div>
                 </div>    
             </div>
          
             <div class="container">
                    <ul class="nav nav-tabs" >

                        <li class="active"><a data-toggle="tab" href="#myapp">My Application Form</a></li>
                        <li><a data-toggle="tab" href="#mystat">My Admission Details</a></li>
                        <li><a  href="logout.php">Logout</a></li>
                    </ul>
                 
                 <div class="tab-content">
                     <div id="myapp" class="tab-pane fade in active">
           
                         
                     <div class="container-fluid">
                            <div class="row">
                               <div class="col-sm-12">
      <center>  <table class="table table-bordered" style="font-family: Verdana">
                
                <tr>
                 <td style="width:3%;"><img src="./images/Logo-T.gif" width="50%"> </td>
                 <td style="width:8%;"><center><font style="font-family:Arial Black; font-size:20px;">
                    English Language Education Institute Bangladesh,Basundhara,Dhaka-1229</font></center>
                
                <center><font style="font-family:Verdana; font-size:18px;">
                    Phone : (+00)019963-686929, Email : edtechbd@gmail.com
                    </font></center>
                
                <br>
                <br>
                <center><font style="font-family:Arial Black; font-size:20px;">
                    ADMISSIONS</font></center>
                </td>
                    <td colspan="2" width="3%" >
                   <?php
                  
                    $picfile_path ='studentpic/';
                    
                    $result1 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='".$_SESSION['user']."'");
                        
                    
                    
                    while($row1 = mysqli_fetch_array($result1))
                      {                  
                        $picsrc=$picfile_path.$row1['s_pic'];
                        
                        echo "<img src='$picsrc.' class='img-thumbnail' width='180px' style='height:180px;'>";
                        echo"<div>";
                      }
                      $resdata = mysqli_query($con,"SELECT * FROM t_user_data WHERE s_id='".$_SESSION['user']."'");
                    
                    while($rowdata = mysqli_fetch_array($resdata))
                      {
                   ?>
                        </td>
                 </tr>       
                 
                 <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">Name : </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $stname;?> </td>
                 </tr>
                 
                 
                <tr>
                    <td> <font style="font-family: Verdana;">ID : </font> </td>
                    <td colspan="3"> <?php echo $id ?> </td>
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Date of Birth : </font> </td>
                    <td colspan="3"> <?php echo $rowdata[2] ?> </td>
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Email : </font> </td>
                      <td colspan="3"> <?php echo $rowdata[4]  ?> </td>
                </tr>
                  <?php
                      }
                      ?>
                  <tr>
                    <td > <font style="font-family: Verdana;"> Mobile No.</font>  </td>
                    <td colspan="3"> <?php echo 'Telephone - '. $row[2]. '   ' ?><br>
                    <?php echo ' Mobile - '.$row[3] ?></td>
                  </tr>
                
                  <tr>
                    <td><font style="font-family: Verdana;"> Father's Name</font></td>
                    <td  colspan="3"><?php echo $row[4] ?> </td>
                   </tr>
                 
                  <tr>
                    <td> <font style="font-family: Verdana;">Father's Occupation</font></td>
                    <td> <?php echo $row[5] ?></td>
                    <td><font style="font-family: Verdana;"> Mobile No.</font></td>
                    <td> <?php echo $row[6] ?> </td>
                  </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Mother's Name</font> </td>
                    <td colspan="3"> <?php echo $row[7] ?></td>
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Mother's Occupation</font></td>
                    <td> <?php echo $row[8] ?> </td>
                     <td> <font style="font-family: Verdana;">Mobile No.</font></td>
                    <td> <?php echo $row[9] ?></td>
                </tr>
                
                <tr>
                    <td><font style="font-family: Verdana;"> Income of Parents </font>
                     <td  colspan="3"><?php echo $row[10] ?></td>
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Sex </font>
                    <td colspan="3"><?php echo $row[11] ?></td>       
                    
                </tr>
                
                <tr>
                    <td><font style="font-family: Verdana;"> Present Address</font>
                    <td colspan="3"><?php echo 'Address :'. $row[12] ?><br>
                          <?php echo 'State :'. $row[13] ?><br>
                          <?php echo 'Pin :'. $row[14] ?><br>
                          <?php echo 'Mobile :'. $row[15] ?><br>
                </td>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Permanent Address</font>
                    <td colspan="3"><?php echo 'Address :'. $row[16] ?><br>
                          <?php echo 'State :'. $row[17] ?><br>
                          <?php echo 'Pin :'. $row[18] ?><br>
                          <?php echo 'Mobile :'. $row[19] ?><br>
                </td>
                </tr>   
               
                
                </tr>  
                                
                <tr>
                    <td><font style="font-family: Verdana;"> Nationality</font>
                    <td> <?php echo $row[21] ?></td>
                    <td><font style="font-family: Verdana;"> Religion</font>
                    <td> <?php echo $row[22] ?></td>
                </tr>       
               
               <tr>
                    <td><font style="font-family: Verdana;">Roll No.</font></td>
                    <td><?php echo $row[26] ?></td>
                    
               </tr>  
               
               
               <tr>
                    <td><font style="font-family: Verdana;">Choice Your Course</font></td>
                    <td colspan="3"><?php echo $row[28] ?>
                     </td>
               </tr>
               <tr>
                     <td><font style="font-family: Verdana;">College Name</font></td>
                     <td colspan="3"><?php echo $row[29] ?>
                     </td>
                     
                </tr>
                
                <tr>
                     <td><font style="font-family: Verdana;">Course Type</font></td>
                     <td colspan="3"><?php echo $row[31] ?>
                     </td>
                     
                </tr>
                
                
               <tr>
                   <td><font style="font-family: Verdana;">Academic Qualification</font></td>
                   <td colspan="3">
                       <table class="table table-hover">
                           <thead>
                               <tr>
                                    <th><font style="font-family: Verdana;font-size: small">Exam</font> <br><font style="font-family: Verdana; font-size: small">Name</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Name of</font> <br><font style="font-family: Verdana;font-size: small">Board/University</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Year of</font> <br><font style="font-family: Verdana;font-size: small"> Passing</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">GPA/</font><br><font style="font-family: Verdana;font-size: small"> CGPA</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Total</font> <br><font style="font-family: Verdana;font-size: small">Obtained</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Division</font></th>
                              </tr>   
                           </thead>
                            <tbody>
                           <tr>
                               <td>A level/SSC/Dakhil</td>
                               <td><input type="text" id="nob1" name="nob1" ></td>
                               <td><input type="text" id="yop1" name="yop1" class="actab" ></td>
                               <td><input type="text" id="tm1" name="tm1" class="actab" ></td>
                               <td><input type="text" id="mo1" name="mo1" class="actab" ></td>
                               <td><input type="text" id="divs1" name="divs1" class="actab" ></td>
                               
                           </tr>
                           <tr>
                               <td>O level/Diploma/HSC/Alim </td>
                               <td><input type="text" id="nob2" name="nob2" ></td>
                               <td><input type="text" id="yop2" name="yop2" class="actab" ></td>
                               <td><input type="text" id="tm2" name="tm2" class="actab" ></td>
                               <td><input type="text" id="mo2" name="mo2" class="actab" ></td>
                               <td><input type="text" id="divs2" name="divs2" class="actab" ></td>
                               
                           </tr>
                           
                           
                            </tbody>
                       </table>
                       
                           <tr>
                               <td><font style="font-family: Verdana;">Medium of Instruction till class 10th</font></td>
                               
                                    <td colspan="3"><?php echo $row[45] ?></td>
                               
                           </tr>
                           
                           
                           <tr>
                               <td><font style="font-family: Verdana;">Mode of Payment</font></td>
                               
                               <td colspan="3"><?php echo $row[46] ?></td>
                               
                           </tr>
                 
                       </table>
                     </center>
                               </div>
                            </div>
            </div>
        <?php
              }
        ?>
             
                         
                 </div>
                 
                 
                 <div id="mystat" class="tab-pane fade">
                <div class="container-fluid">
                    <div class="jumbotron">
                        <div class="row">
                            <div class="col-sm-12">

                                <ul class="list-group">

                                    <li class="list-group-item">
                                        <font style="font-family: Verdana; font-size:15px;"> 1) Application Status
                                        <p align="right"> <?php echo $stval ?></p></font>
                                    </li>
                                    <li class="list-group-item">
                                        <font style="font-family: Verdana; font-size:15px;"> 2) Print Application</font>
                                        <p align="right" style="font-family: Verdana; font-size:15px;">
                                           <a href="admsnreport1.php" >Click Here</a>
                                        </p>
                                    </li>

                                    <li class="list-group-item">
                                        <font style="font-family: Verdana; font-size:15px;"> 3) Edit Application</font>
                                        <p align="right" style="font-family: Verdana; font-size:15px;">
                                            <a href="editform.php" >Click Here</a>
                                         </p>
                                    </li>

                                </ul>
                            </div>

                         
                        </div>


                    </div>
                </div>
             </div>

             </div>
             </div>
    </body>
</html>

