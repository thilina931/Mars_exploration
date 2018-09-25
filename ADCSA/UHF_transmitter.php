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

        <li ><a href="Mission_findings.php"><i class="icon icon-signal"></i> <span>Mission Findings</span></a> </li>
        <li ><a href="Radiation.php"><i class="icon icon-inbox"></i> <span>Radiation</span></a> </li>
        <li class="active"><a href="UHF_transmitter.php"><i class="icon icon-th"></i> <span>UHF Transmitter</span></a></li>

        <!--<li ><a href="Functions.php"><i class="icon icon-fullscreen"></i> <span> Functions </span></a></li>-->
        <li ><a href="Trigger.php"><i class="icon icon-tint"></i> <span>X-Band Transmitter </span></a></li>
        <li ><a href="Procedures.php"><i class="icon icon-pencil"></i> <span> Power Generator  </span></a></li>


    </ul>
</div>

<!--close-left-menu-stats-sidebar-->

<div id="content">
    <div id="content-header">
        <!--<div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>-->
        <h1>UHF Transmitter </h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>UHF Transmitter  Information </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">UHF TRANSMITTER ID :</label>
                                <div class="controls">
                                    <input type="text" id="Uhf_transmitter_id" name="Uhf_transmitter_id" class="span11" placeholder="Enter UHF TRANSMITTER ID " />
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="control-group">
                                    <label class="control-label">AI ID :</label>
                                    <div class="controls">
                                        <!--                                        <select name="rover_id" id="rover_id">-->
                                        <!--                                            <option name="rover_id" id="rover_id">Curiosity Rover</option>-->
                                        <!--                                            <option name="rover_id" id="rover_id">Opportunity Rover</option>-->
                                        <!--                                        </select>-->
                                        <input type="text" id="Ai_id" name="Ai_id" class="span11" placeholder="Enter AI ID" />
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">ORIGIN : </label>
                                <div class="controls">
                                    <input type="text" id="Origin"  name="Origin" class="span11" placeholder="Enter ORIGIN "  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">TRAVEL TIME  :</label>
                                <div class="controls">
                                    <input type="text" id="Travel_time" name="Travel_time" class="span11" placeholder=" DD-MON-YY " />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">NO OF RADIOS :</label>
                                <div class="controls">
                                    <input type="text" id="No_Of_radios" name="No_Of_radios" class="span11" placeholder=" Enter NO OF RADIOS" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">SIGNAL STRENGTH :</label>
                                <div class="controls">
                                    <input type="text" id="Signal_strength" name="Signal_strength" class="span11" placeholder=" Enter SIGNAL STRENGTH " />
                                </div>
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
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>UHF Transmitter Information</h5>
                    </div>
                    <!--Table-->
                    <div class="table-responsive">
                        <form method="post">

                            <table id="table" class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">UHF_TRANSMITTER_ID</th>
                                    <th scope="col">AI_ID </th>
                                    <th scope="col">ORIGIN</th>
                                    <th scope="col">TRAVEL_TIME </th>
                                    <th scope="col">NO_OF_RADIOS</th>
                                    <th scope="col">SIGNAL STRENGTH</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                include('DBConn.php');
                                $stid = oci_parse($conn, 'SELECT * FROM UHFTRANSMITTER');
                                oci_execute($stid);

                                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                    // Use the uppercase column names for the associative array indices
                                    echo "<tr>\n";
                                    echo "    <td class='align-middle' align='centre'>" . $row['UHFTRANSMITTERID']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['AIID']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['ORIGIN']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['TRAVELTIME']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['NOOFRADIOS']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['SIGNALSTRENGTH']   . "</td>\n";

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
                                        document.getElementById("Uhf_transmitter_id").value = this.cells[0].innerHTML;
                                        document.getElementById("Ai_id").value = this.cells[1].innerHTML;
                                        document.getElementById("Origin").value = this.cells[2].innerHTML;
                                        document.getElementById("Travel_time").value = this.cells[3].innerHTML;
                                        document.getElementById("No_Of_radios").value = this.cells[4].innerHTML;
                                        document.getElementById("Signal_strength").value = this.cells[5].innerHTML;

                                        console.log(this.cells[1].innerHTML);
                                    };
                                }
                            </script>

                        </form>
                    </div>
                    <!--Table-->
                </div>
            </div>
            </div>
            <?php

            include 'DBConn.php';

            if(isset($_POST['add'])) {
                $Uhf_transmitter_id = $_POST['Uhf_transmitter_id'];
                $Ai_id = $_POST['Ai_id'];
                $Origin = $_POST['Origin'];
                $Travel_time = $_POST['Travel_time'];
                $No_Of_radios = $_POST['No_Of_radios'];
                $Signal_strength = $_POST['Signal_strength'];


                $query = "INSERT INTO UHFTRANSMITTER
            VALUES ('$Uhf_transmitter_id','$Ai_id','$Origin','$Travel_time','$No_Of_radios','$Signal_strength')";

                $stid = oci_parse($conn, $query);

                oci_execute($stid);

                if ($stid) {
                    echo "<script>alert('Data Successfully Added');</script>";
                }

            }

            if(isset($_POST['update']))
            {
                $Uhf_transmitter_id = $_POST['Uhf_transmitter_id'];
                $Ai_id = $_POST['Ai_id'];
                $Origin = $_POST['Origin'];
                $Travel_time = $_POST['Travel_time'];
                $No_Of_radios = $_POST['No_Of_radios'];
                $Signal_strength = $_POST['Signal_strength'];

                $query="UPDATE UHFTRANSMITTER SET UHFTRANSMITTERID=' $Uhf_transmitter_id' , AIID='$Ai_id', ORIGIN='$Origin', 
                               TRAVELTIME='$Travel_time', NOOFRADIOS='$No_Of_radios', SIGNALSTRENGTH='$Signal_strength' WHERE UHFTRANSMITTERID='$Uhf_transmitter_id'";
                $stid = oci_parse($conn, $query);
                oci_execute($stid);

                if($stid)
                {
                    echo "<script>alert('Updated Successfully!');</script>";
                }

            }

            if(isset($_POST['delete']))
            {
                $Uhf_transmitter_id=$_POST['Uhf_transmitter_id'];

                $query="DELETE FROM UHFTRANSMITTER where UHFTRANSMITTERID = '$Uhf_transmitter_id'";
                $stid = oci_parse($conn, $query);
                oci_execute($stid);

                if($stid)
                {
                    echo "<script>alert('Successfully Deleted!');</script>";
                }
            }

            ?>
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
