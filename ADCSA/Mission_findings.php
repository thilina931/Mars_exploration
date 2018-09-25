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

    </ul>
</div>



<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i>Forms</a>
    <ul>

        <li class="active" ><a href="Mission_findings.php"><i class="icon icon-signal"></i> <span>Mission Findings</span></a> </li>
        <li ><a href="Radiation.php"><i class="icon icon-inbox"></i> <span>Radiation</span></a> </li>
        <li><a href="UHF_transmitter.php"><i class="icon icon-th"></i> <span>UHF Transmitter</span></a></li>
       <!-- <li ><a href="Functions.php"><i class="icon icon-fullscreen"></i> <span> Functions </span></a></li>-->


        <li ><a href="Trigger.php"><i class="icon icon-tint"></i> <span>X-Band Transmitter </span></a></li>
        <li ><a href="Procedures.php"><i class="icon icon-pencil"></i> <span> Power Generator  </span></a></li>


    </ul>
</div>

<!--close-left-menu-stats-sidebar-->

<div id="content">
    <div id="content-header">

        <h1>Mission Findings</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Mission Finding Information</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Finding ID  :</label>
                                <div class="controls">
                                    <input type="text" id="finding_id" name="finding_id" class="span11" placeholder="Enter Finding ID" />
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-group">
                                    <label class="control-label">Select Rover :</label>
                                    <div class="controls">
<!--                                        <select name="rover_id" id="rover_id">-->
<!--                                            <option name="rover_id" id="rover_id">Curiosity Rover</option>-->
<!--                                            <option name="rover_id" id="rover_id">Opportunity Rover</option>-->
<!--                                        </select>-->
                                        <input type="text" id="rover_id" name="rover_id" class="span11" placeholder="Enter Rover ID" />
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Finding Name  : </label>
                                <div class="controls">
                                    <input type="text" id="finding_name"  name="finding_name" class="span11" placeholder="Enter Finding Name"  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Finding Distribution   :</label>
                                <div class="controls">
                                    <input type="text" id="finding_dis" name="finding_dis" class="span11" placeholder=" Enter Finding Distribution" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Finding Type :</label>
                                <div class="controls">
                                    <input type="text" id="type" name="type" class="span11" placeholder=" Enter Finding Type" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Location :</label>
                                <div class="controls">
                                    <input type="text" id="location" name="location" class="span11" placeholder=" Enter Location" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Scale :</label>
                                <div class="controls">
                                    <input type="text" id="scale" name="scale" class="span11" placeholder=" Enter Scale" />
                                </div>
                            </div>
                            <div class="form-actions" align="right">
                                <button type="submit" id="missionsubmit" class="btn btn-success" name="add">Submit</button>
                                <button type="submit" id="update" class="btn btn-warning" name="update">Update</button>
                                <button type="submit" id="delete" class="btn btn-danger" name="delete">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php

            include 'DBConn.php';

            if(isset($_POST['add'])) {
                $finding_id = $_POST['finding_id'];
                $rover_id = $_POST['rover_id'];
                $finding_name = $_POST['finding_name'];
                $finding_dis = $_POST['finding_dis'];
                $type = $_POST['type'];
                $location = $_POST['location'];
                $scale = $_POST['scale'];

                $query = "INSERT INTO MISSIONFINDINGS
            VALUES ('$finding_id','$rover_id','$finding_name','$finding_dis','$type','$location','$scale')";

                $stid = oci_parse($conn, $query);

                oci_execute($stid);

                if ($stid) {
                    echo "<script>alert('Data Successfully Added');</script>";
                }

            }

            if(isset($_POST['update']))
            {
                $finding_id=$_POST['finding_id'];
                $rover_id=$_POST['rover_id'];
                $finding_name=$_POST['finding_name'];
                $finding_dis=$_POST['finding_dis'];
                $type=$_POST['type'];
                $location=$_POST['location'];
                $scale=$_POST['scale'];

                $query="UPDATE MISSIONFINDINGS SET FINDINGID='$finding_id' , ROVERID='$rover_id', FINDINGNAME='$finding_name', 
                               FINDINGDISTRIBUTION='$finding_dis', TYPE='$type', LOCATION='$location', SCALE='$scale' WHERE FINDINGID='$finding_id'";
                $stid = oci_parse($conn, $query);
                oci_execute($stid);

                if($stid)
                {
                    echo "<script>alert('Updated Successfully!');</script>";
                }

            }

            if(isset($_POST['delete']))
            {
                $finding_id=$_POST['finding_id'];

                $query="DELETE FROM MISSIONFINDINGS where FINDINGID = '$finding_id'";
                $stid = oci_parse($conn, $query);
                oci_execute($stid);

                if($stid)
                {
                    echo "<script>alert('Successfully Deleted!');</script>";
                }
            }

            ?>
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Mission Finding Information</h5>
                    </div>
                    <!--Table-->
                    <div class="table-responsive">
                        <form method="post">

                            <table id="table" class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Finding ID</th>
                                    <th scope="col">Rover ID</th>
                                    <th scope="col">Finding Name</th>
                                    <th scope="col">Finding Distribution</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Scale</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                include('DBConn.php');
                                $stid = oci_parse($conn, 'SELECT * FROM MISSIONFINDINGS');
                                oci_execute($stid);

                                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                    // Use the uppercase column names for the associative array indices
                                    echo "<tr>\n";
                                    echo "    <td class='align-middle'>" . $row['FINDINGID']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['ROVERID']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['FINDINGNAME']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['FINDINGDISTRIBUTION']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['TYPE']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['LOCATION']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['SCALE']   . "</td>\n";
                                    echo "</tr>\n";
                                }

                                ?>
                                </tbody>
                            </table>

                            <script>
                                var table= document.getElementById('table');

                                for(var i=1;i<table.rows.length; i++)
                                {
                                    table.rows[i].onclick= function()
                                    {
                                        document.getElementById("finding_id").value = this.cells[0].innerHTML;
                                        document.getElementById("rover_id").value = this.cells[1].innerHTML;
                                        document.getElementById("finding_name").value = this.cells[2].innerHTML;
                                        document.getElementById("finding_dis").value = this.cells[3].innerHTML;
                                        document.getElementById("type").value = this.cells[4].innerHTML;
                                        document.getElementById("location").value = this.cells[5].innerHTML;
                                        document.getElementById("scale").value = this.cells[6].innerHTML;
                                        console.log(this.cells[1].innerHTML);
                                    };
                                }
                            </script>

                        </form>
                    </div>
                    <!--Table-->

                </div>

                <div id="span6">
                    <div id="widget-box">
                        <!--<div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>-->

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
            </div>


<!--Footer-part-->
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.toggle.buttons.js"></script>
<script src="js/masked.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.form_common.js"></script>
<script src="js/wysihtml5-0.3.0.js"></script>
<script src="js/jquery.peity.min.js"></script>
<script src="js/bootstrap-wysihtml5.js"></script>
<script>
    $('.textarea_editor').wysihtml5();
</script>
</body>
</html>
