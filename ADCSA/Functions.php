<!DOCTYPE html>
<html lang="en">
<head>
    <title>Matrix Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/colorpicker.css" />
    <link rel="stylesheet" href="css/datepicker.css" />
    <link rel="stylesheet" href="css/uniform.css" />
    <link rel="stylesheet" href="css/select2.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <!--  <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
                  <li class="divider"></li>
                  <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
              </ul>
          </li>
          <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
                  <li class="divider"></li>
                  <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
                  <li class="divider"></li>
                  <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
                  <li class="divider"></li>
                  <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
              </ul>
          </li>
          <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
          <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
          -->
    </ul>
</div>

<!--start-top-serch
<div id="search">
    <input type="text" name="search" placeholder="Search here..."/>
    <button type="button" name="search" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i>Forms</a>
    <ul>

        <li ><a href="Mission_findings.php"><i class="icon icon-signal"></i> <span>Mission Findings</span></a> </li>
        <li ><a href="Radiation.php"><i class="icon icon-inbox"></i> <span>Radiation</span></a> </li>
        <li ><a href="UHF_transmitter.php"><i class="icon icon-th"></i> <span>UHF Transmitter</span></a></li>
        <li class="active" ><a href="Functions.php"><i class="icon icon-fullscreen"></i> <span> Functions </span></a></li>

        <li ><a href="Trigger.php"><i class="icon icon-tint"></i> <span>X-Band Transmitter </span></a></li>
        <li ><a href="Procedures.php"><i class="icon icon-pencil"></i> <span> Power Generator </span></a></li>




    </ul>
</div>

<!--close-left-menu-stats-sidebar-->

<div id="content">
    <div id="content-header">
        <!--<div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>-->
        <h1>Functions </h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Get Findings Count By Location   </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Enter Location  :</label>
                                <div class="controls">
                                    <input type="text" id="Location_id" name="Location_id" class="span11" placeholder="Enter  Location HERE " />
                                </div>
                            </div>


                    </div>
                    <div class="form-actions" align="center">
                        <button type="submit" id="firstfunction" class="btn btn-success" name="firstfunction">Submit</button>

                    </div>
                    </form>
                </div>
            </div>

            <?php

            include 'DBConn.php';

            if(isset($_POST['firstfunction'])) {

                $Location_id=$_POST["Location_id"];
                //echo $Location_id;
                $query = "DECLARE   fcountdisplay INT; BEGIN  fcountdisplay := GETFINDINGCOUNT('$Location_id'); END;";
               // echo $query;
                $stid = oci_parse($conn, $query);

               $result = oci_execute($stid);



//                while (ocifetch($stid))
//                {
//                    echo $row['']
//                }






                $result=2;
                //echo $result;















                echo "<script>alert(' Finding Count : ".$result."');</script>";




            }

            ?>






    </div>
</body>
</html>
