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
        <li class="active"><a href="Radiation.php"><i class="icon icon-inbox"></i> <span>Radiation</span></a> </li>
        <li><a href="UHF_transmitter.php"><i class="icon icon-th"></i> <span>UHF Transmitter</span></a></li>
        <!--<li ><a href="Functions.php"><i class="icon icon-fullscreen"></i> <span> Functions </span></a></li>-->
        <li ><a href="Trigger.php"><i class="icon icon-tint"></i> <span>X-Band Transmitter </span></a></li>
        <li ><a href="Procedures.php"><i class="icon icon-pencil"></i> <span> Power Generator  </span></a></li>




    </ul>
</div>

<!--close-left-menu-stats-sidebar-->

<div id="content">
    <div id="content-header">

        <h1>Radiation </h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Radiation Information</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">RADIATION NO :</label>
                                <div class="controls">
                                    <input type="text" id="Radiation_no" name="Radiation_no" class="span11" placeholder="Enter RADIATION NO" />
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
                                <label class="control-label">DATE AND TIME  : </label>
                                <div class="controls">
                                    <input type="text" id="Date_and_time"  name="Date_and_time" class="span11" placeholder=" DD-MON-YY   "  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">SURFACE RADIATION  :</label>
                                <div class="controls">
                                    <input type="text" id="Surface_radiation" name="Surface_radiation" class="span11" placeholder=" Enter SURFACE RADIATION " />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">GALACTIC RADIATION :</label>
                                <div class="controls">
                                    <input type="text" id="Galactic_radiation" name="Galactic_radiation" class="span11" placeholder=" Enter GALACTIC RADIATION" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">COSMIC RADIATION :</label>
                                <div class="controls">
                                    <input type="text" id="Cosmic_radiation" name="Cosmic_radiation" class="span11" placeholder=" Enter COSMIC RADIATION" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">INTERIOR RADIATION :</label>
                                <div class="controls">
                                    <input type="text" id="interior_radiation" name="interior_radiation" class="span11" placeholder=" Enter INTERIOR RADIATION " />
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
                $Radiation_no = $_POST['Radiation_no'];
                $rover_id = $_POST['rover_id'];
                $Date_and_time = $_POST['Date_and_time'];
                $Surface_radiation = $_POST['Surface_radiation'];
                $Galactic_radiation = $_POST['Galactic_radiation'];
                $Cosmic_radiation = $_POST['Cosmic_radiation'];
                $interior_radiation = $_POST['interior_radiation'];

                $query = "INSERT INTO RADIATION
            VALUES ('$Radiation_no','$rover_id','$Date_and_time','$Surface_radiation','$Galactic_radiation','$Cosmic_radiation','$interior_radiation')";

                $stid = oci_parse($conn, $query);

                oci_execute($stid);

                if ($stid) {
                    echo "<script>alert('Data Successfully Added');</script>";
                }

            }

            if(isset($_POST['update']))
            {
                $Radiation_no = $_POST['Radiation_no'];
                $rover_id = $_POST['rover_id'];
                $Date_and_time = $_POST['Date_and_time'];
                $Surface_radiation = $_POST['Surface_radiation'];
                $Galactic_radiation = $_POST['Galactic_radiation'];
                $Cosmic_radiation = $_POST['Cosmic_radiation'];
                $interior_radiation = $_POST['interior_radiation'];

                $query="UPDATE RADIATION SET RADIATIONNO=' $Radiation_no' , ROVERID='$rover_id', DATEANDTIME='$Date_and_time', 
                               SURFACERADIATION='$Surface_radiation', GALACTICRADIATION='$Galactic_radiation', COSMICRADIATION='$Cosmic_radiation', INTERIORRADIATION='$interior_radiation' WHERE RADIATIONNO='$Radiation_no'";
                $stid = oci_parse($conn, $query);
                oci_execute($stid);

                if($stid)
                {
                    echo "<script>alert('Updated Successfully!');</script>";
                }

            }

            if(isset($_POST['delete']))
            {
                $Radiation_no=$_POST['Radiation_no'];

                $query="DELETE FROM RADIATION where RADIATIONNO = '$Radiation_no'";
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
                        <h5> Radiation  Information</h5>
                    </div>
                    <!--Table-->
                    <div class="table-responsive">
                        <form method="post">

                            <table id="table" class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">RadiationNo</th>
                                    <th scope="col">RoverID</th>
                                    <th scope="col">Date/time</th>
                                    <th scope="col">Surface_Rad</th>
                                    <th scope="col">Galactic_Rad</th>
                                    <th scope="col">Cosmic_Rad</th>
                                    <th scope="col">Interior_Rad</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                include('DBConn.php');
                                $stid = oci_parse($conn, 'SELECT * FROM RADIATION');
                                oci_execute($stid);

                                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                    // Use the uppercase column names for the associative array indices
                                    echo "<tr>\n";
                                    echo "    <td class='align-centre'>" . $row['RADIATIONNO']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['ROVERID']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['DATEANDTIME']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['SURFACERADIATION']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['GALACTICRADIATION']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['COSMICRADIATION']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['INTERIORRADIATION']   . "</td>\n";
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
                                        document.getElementById("Radiation_no").value = this.cells[0].innerHTML;
                                        document.getElementById("rover_id").value = this.cells[1].innerHTML;
                                        document.getElementById("Date_and_time").value = this.cells[2].innerHTML;
                                        document.getElementById("Surface_radiation").value = this.cells[3].innerHTML;
                                        document.getElementById("Galactic_radiation").value = this.cells[4].innerHTML;
                                        document.getElementById("Cosmic_radiation").value = this.cells[5].innerHTML;
                                        document.getElementById("interior_radiation").value = this.cells[6].innerHTML;
                                        console.log(this.cells[1].innerHTML);
                                    };
                                }
                            </script>

                        </form>
                    </div>
                    <!--Table-->
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
