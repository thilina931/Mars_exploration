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
        <li ><a href="UHF_transmitter.php"><i class="icon icon-th"></i> <span>UHF Transmitter</span></a></li>

        <!--<li ><a href="Functions.php"><i class="icon icon-fullscreen"></i> <span> Functions </span></a></li>-->
        <li class="active"><a href="Trigger.php"><i class="icon icon-tint"></i> <span>X-Band Transmitter </span></a></li>
        <li ><a href="Procedures.php"><i class="icon icon-pencil"></i> <span> Power Generator  </span></a></li>



    </ul>
</div>

<!--close-left-menu-stats-sidebar-->

<div id="content">
    <div id="content-header">
        <!--<div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>-->
        <h1>X-Band Transmitter  </h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Add A X-Band Transmission </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">X-BAND TRANSMITTER ID  :</label>
                                <div class="controls">
                                    <input type="text" id="xband_id" name="xband_id" class="span11" placeholder="Enter X-BAND TRANSMITTER ID " />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">ROVER ID  :</label>
                                <div class="controls">
                                    <input type="text" id="rover_id" name="rover_id" class="span11" placeholder="Enter ROVER ID " />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">COMPUTER ID :</label>
                                <div class="controls">
                                    <input type="text" id="computer_id" name="computer_id" class="span11" placeholder="Enter COMPUTER ID" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">FREQUENCY :</label>
                                <div class="controls">
                                    <input type="text" id="frequency" name="frequency" class="span11" placeholder="Enter FREQUENCY" />
                                </div>
                            </div>


                    </div>
                    <div class="form-actions" align="center">
                        <button type="submit" id="missionsubmit" class="btn btn-success" name="Trigger1">Submit</button>

                    </div>
                    </form>
                </div>
            </div>

            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Transmission Log  </h5>
                    </div>
                    <!--Table-->
                    <div class="table-responsive">
                        <form method="post">

                            <table id="table" class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">TransmissionLogID  </th>
                                    <th scope="col">Description </th>
                                    <th scope="col">TRansmissionDate </th>


                                </thead>
                                <tbody>
                                <tbody>
                                <?php

                                include('DBConn.php');
                                $stid = oci_parse($conn, 'SELECT * FROM  TRANSMISSIONLOG');
                                oci_execute($stid);

                                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                    // Use the uppercase column names for the associative array indices
                                    echo "<tr>\n";
                                    echo "    <td class='align-middle'>" . $row['TRANSMISSIONLOGID']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['DESCRIPTION']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['TRANSMISSIONDATE']   . "</td>\n";

                                    echo "</tr>\n";
                                }

                                ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!---        2nd trigger           ----->








            <?php


    include 'DBConn.php';

    if(isset($_POST['Trigger1'])) {
        $xband_id = $_POST['xband_id'];
        $rover_id = $_POST['rover_id'];
        $computer_id = $_POST['computer_id'];
        $frequency = $_POST['frequency'];


        $query = "INSERT INTO XBANDTRANSMITTER
            VALUES ('$xband_id','$rover_id','$computer_id','$frequency')";

        $stid = oci_parse($conn, $query);

        oci_execute($stid);

        if ($stid) {
            echo "<script>alert('Data Successfully Added');</script>";
        }

    }
  /* Trigger 2*/

            if(isset($_POST['trigger2'])) {
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

            /* trigger3 */

            if(isset($_POST['trigger3'])) {
                $spec_id = $_POST['spec_id'];
                $spec_m_ap_id = $_POST['spec_m_ap_id'];
                $rover_id = $_POST['rover_id'];
                $chemical_mes = $_POST['chemical_mes'];
                $Temp_me = $_POST['Temp_me'];
                $opt_mes = $_POST['opt_mes'];
                $time = $_POST['time'];
                $location = $_POST['location'];

                $query = "INSERT INTO SPECTROMETERAPXS
            VALUES (' $spec_id','$spec_m_ap_id','$rover_id','$chemical_mes','$Temp_me','$opt_mes','$time','$location')";

                $stid = oci_parse($conn, $query);

                oci_execute($stid);

                if ($stid) {
                    echo "<script>alert('Data Successfully Added');</script>";
                }

            }

            /*trigger 4*/
            if(isset($_POST['trigger4'])) {
                $img_id = $_POST['img_id'];
                $im_a_id = $_POST['im_a_id'];
                $cam_id = $_POST['cam_id'];
                $m_cam_id = $_POST['m_cam_id'];
                $pa_c_id = $_POST['pa_c_id'];
                $c_c_id = $_POST['c_c_id'];
                $uhf_t_id = $_POST['uhf_t_id'];
                $signi = $_POST['signi'];
                $density = $_POST['density'];
                $contrast = $_POST['contrast'];
                $algorithm = $_POST['algorithm'];
                $significance_range = $_POST['significance_range'];
                $aimg = $_POST['aimg'];


                $query = "INSERT INTO IMAGETYPEA
            VALUES (' $img_id','$im_a_id','$cam_id','$m_cam_id','$pa_c_id','$c_c_id','$uhf_t_id','$signi','$density','$contrast','$algorithm','$significance_range','$aimg')";

                $stid = oci_parse($conn, $query);

                oci_execute($stid);

                if ($stid) {
                    echo "<script>alert('Data Successfully Added');</script>";
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
