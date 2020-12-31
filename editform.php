<?php
    session_start();
    error_reporting(0);

    $unam = $_REQUEST["unam"];
    $uphn1 =$_REQUEST["uphn1"];
    
    
    $ufname =$_REQUEST["ufname"];
    $ufocc=$_REQUEST["ufocc"];
    $ufphn=$_REQUEST["ufphn"];
    
    $umname=$_REQUEST["umname"];
    $umocc=$_REQUEST["umocc"];
    $umphn=$_REQUEST["umphn"];
    
    $inc=$_REQUEST["inc"];
    $gen=$_REQUEST["gen"];
    
    $cadr=$_REQUEST["cadr"];
    $cast=$_REQUEST["cast"];
    $capin=$_REQUEST["capin"];
    $camob=$_REQUEST["camob"];
    
    $padr=$_REQUEST["padr"];
    $past=$_REQUEST["past"];
    $papin=$_REQUEST["papin"];
    $pamob=$_REQUEST["pamob"];
    
    
    $natn=$_REQUEST["natn"];
    $relg=$_REQUEST["relg"];
    
    $nob1=$_REQUEST["nob1"];
    $yop1=$_REQUEST["yop1"];
    $tm1=$_REQUEST["tm1"];
    $mo1 =$_REQUEST["mo1"];
    $divs1=$_REQUEST["divs1"];
    
    
    $nob2  =$_REQUEST["nob2"];
    $yop2=$_REQUEST["yop2"];
    $tm2=$_REQUEST["tm2"];
    $mo2  =$_REQUEST["mo2"];
    $divs2  =$_REQUEST["divs2"];
    
       
    $moi  = $_REQUEST["moi"];
    $pay= $_REQUEST["pay"];
    
    $con=mysqli_connect("localhost","root","","oas");
    
    
    if(!isset($con))
    {
        die("Database Not Found");
    }
    
    
    if(isset($_REQUEST["frmupdate"]))
    {
        $sql="update t_user set

s_phn1='$uphn1', s_phn2='$uphn2', f_name='$ufname', f_occ='$ufocc', f_phn='$ufphn', m_name='$umname',
m_occ='$umocc', m_phn='$umphn', s_iop='$inc', s_sex='$gen', s_cadr='$cadr', s_cst='$cast', s_cpin='$capin', s_cmob='$camob',
 s_padr='$padr', s_pst='$past', s_ppin='$papin', s_pmob='$pamob', s_ruc='$rur', s_natn='$natn',
s_relg='$relg', s_catg='$cat', s_mainsxam='$oaco', s_mainsrank='$oarank', s_mainsroll='$oaroll',
s_mainsbrnch='$oabrn', s_branch='$brnc',s_college='$col', s_center='$cen', s_crtype='$crsty', 
s_pcm='$pcm', s_tenbrd='$nob1', s_tenyop='$yop1', s_tentotmark='$tm1', s_tenmarkob='$mo1',
s_tendiv='$divs1', s_tenprcmark='$pom1', s_twlbrd=' $nob2 ', s_twlyop='$yop2', 
s_twltotmark='$tm2', s_twlmarkob='$mo2', s_twldiv='$divs2', s_twlprcmark='$pom2', s_moi='$moi', s_pay='$pay'
where s_id='".$_SESSION['user']."'";

$sql1="update t_user_data set s_name='$unam' where s_id='".$_SESSION['user']."'";
mysqli_query($con, $sql);
mysqli_query($con, $sql1);

        
        header('location:homepageuser.php');
        echo "<script type='text/javascript'>alert('Details Uploaded !!');</script>";
        
        
    }
    
    
$q=mysqli_query($con,"select s_name from t_user_data where s_id='".$_SESSION['user']."'");
$n=  mysqli_fetch_assoc($q);
$stname= $n['s_name'];


?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
        
        
        
    </head>
     <body style="background-image:url('./images/inbg.jpg');">
        <form id="edform" action="editform.php" method="post">
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                        <img src="images/cutm.jpg" width="100%" style="box-shadow: 1px 5px 14px #999999; "></img>
                  </div>
                 </div>    
             </div>
            <div id="dmid" class="container-fluid">  
                
                 <div class="row">
                    <div class="col-sm-12">
                        <font style="color:white; margin-left:520px; font-family: Verdana; width:100%; font-size:30px;">
                        <b>ADMISSION FORM</b> </font>
                      </div>
                 </div>
                
             </div>
                       
                       
            <table class="frmtbl">
                <?php
            
                    $result = mysqli_query($con,"SELECT * FROM t_user WHERE s_id='".$_SESSION['user']."'");

                            while($row = mysqli_fetch_array($result))
                              {
                        
                ?>
                <tr border="1" class="hdrow">
                    
                 </tr>       
                 
                  <tr>
                      <td> <font style="font-family: Verdana;">Name </font> </td>
                    <td colspan="2"> <input type="text" id="unam" name="unam" value="<?php echo $stname;?>">
                  </tr>
                  
                  <tr>
                    <td> <font style="font-family: Verdana;">Student's Mobile No.</font>  </td>
                    <td colspan="3"> <input type="text" id="uphn1" name="uphn1" value="<?php echo $row[2]  ?>">
                    <input type="text" id="uphn2" name="uphn2" value="<?php echo $row[3]  ?>"></td>
                  </tr>
                
                  <tr>
                    <td><font style="font-family: Verdana;"> Father's Name</font></td>
                    <td  colspan="3"> <input type="text" id="ufname" name="ufname" value="<?php echo $row[4]  ?>" > </td>
                   </tr>
                 
                  <tr>
                    <td> <font style="font-family: Verdana;">Father's Occupation</font></td>
                    <td> <input type="text" id="ufocc" name="ufocc" value="<?php echo $row[5] ?>"> </td>
                    <td><font style="font-family: Verdana;"> Mobile No.</font></td>
                    <td> <input type="text" id="ufphn" name="ufphn" value="<?php echo $row[6] ?>"> </td>
                  </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Mother's Name</font> </td>
                    <td colspan="3"> <input type="text" id="umname" name="umname" value="<?php echo $row[7] ?>"></td>
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Mother's Occupation</font></td>
                    <td> <input type="text" id="umocc" name="umocc" value="<?php echo $row[8] ?>"> </td>
                     <td> <font style="font-family: Verdana;">Mobile No.</font></td>
                    <td> <input type="text" id="umphn" name="umphn" value="<?php echo $row[9] ?>"></td>
                </tr>
                
                <tr>
                    <td><font style="font-family: Verdana;"> Income of Parents </font>
                     <td  colspan="3"><input type="text" id="inc" name="inc" value="<?php echo $row[10] ?>"></td>
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Sex </font>
                    <td><input type="radio" id="gen" name="gen" value="Male"><font style="font-family: Verdana;">Male</font>
                     <input type="radio" id="gen" name="gen" value="Female"><font style="font-family: Verdana;">Female </font></td>       
                    
                </tr>
                
                <tr>
                    <td><font style="font-family: Verdana;"> Present Address</font>
                    </td><td colspan="3"><input type="text" id="cadr" name="cadr" class="ad" placeholder="Address 1 " required="true"><br>
                          <input type="text" id="cast" name="cast" class="ad" placeholder="District" style="margin-top: 4px;" required="true"><br>
                          <input type="text" id="capin" name="capin" class="ad" placeholder="Thana" style="margin-top: 4px;" required="true"><br>
                          <input type="text" id="camob" name="camob" class="ad" placeholder="Mobile" style="margin-top: 4px;" required="true"><br>
                </td>
                
                </tr><tr>
                    <td> <font style="font-family: Verdana;">Permanent Address</font>
                    </td><td colspan="3"><input type="text" id="padr" name="padr" class="ad" placeholder="Address 2 " required="true"><br>
                          <input type="text" id="past" name="past" class="ad" placeholder="District" style="margin-top: 4px;" required="true"><br>
                          <input type="text" id="papin" name="papin" class="ad" placeholder="Thana" style="margin-top: 4px;" required="true"><br>
                          <input type="text" id="pamob" name="pamob" class="ad" placeholder="Mobile" style="margin-top: 4px;" required="true"><br>
                    </td>
                </tr>   
               
                
                
                <tr>
                    <td><font style="font-family: Verdana;"> Nationality</font>
                    <td><input type="text" id="natn" name="natn" value="<?php echo $row[21] ?>"></td>
                    <td><font style="font-family: Verdana;"> Religion</font>
                    <td><input type="text" id="relg" name="relg" value="<?php echo $row[22] ?>"></td>
                </tr>    
               
                  
               
               
               <tr>
                    <td><font style="font-family: Verdana;">Choice Your Course</font></td>
                    <td><select id="brnc" name="brnc">
                        <option selected="selected">--------------------Select--------------------</option>
                         <option>IELTS</option>
                         <option>DUOLINGO</option>
                         <option>GRE</option>
                         <option>TOEFL</option>
                         <option>ENGLISH PROGRAM</option>
                         </select>
                     </td>
               </tr>
                
                <tr>
                     <td><font style="font-family: Verdana;">Shift</font></td>
                     <td><select id="crsty" name="crsty">
                         <option selected="selected">--------------------Select--------------------</option>
                         <option>Morning</option>
                         <option>Evening</option>
                         <option>Night</option>
                         </select>
                     </td>
                     
                </tr>
                
                
                
               <tr>
                   <td><font style="font-family: Verdana;">Academic Qualification</font></td>
                   <td colspan="3">
                       <table class="table table-hover">
                           <thead>
                               <tr>
                                    <th><font style="font-family: Verdana;font-size: small">Exam</font> <br><font style="font-family: Verdana; font-size: small">passed</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Name of</font> <br><font style="font-family: Verdana;font-size: small">Board/University</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Year of</font> <br><font style="font-family: Verdana;font-size: small"> Passing</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">CGPA</font><br><font style="font-family: Verdana;font-size: small"> GPA</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Grade</font> <br><font style="font-family: Verdana;font-size: small">Obtained</font></th>
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
                       
                           </td></tr><tr>
                               <td><font style="font-family: Verdana;">Medium of Instruction till class 10th</font></td>
                               <td colspan="3">
                                    <input type="radio" id="moi" name="moi" value="Bengali"><font style="font-family: Verdana;">Bengali</font>
                                    <input type="radio" id="moi" name="moi" value="English"><font style="font-family: Verdana;">English</font>
                               </td>
                           </tr>
                           
                        
                 
                 
                           
                           <tr>
                                <td colspan="4">
                                   <center> <input type="submit" id="frmupdate" name="frmupdate" value="Update" ></center>
                                </td>
                           </tr>
                           
                           <?php
                           
                              }
                           ?>
                       </table>
            <br>
                       
                            
            <br>
                       
                  </form>
            </body>
</html>
