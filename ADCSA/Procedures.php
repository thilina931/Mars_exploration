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

        <li ><a href="Trigger.php"><i class="icon icon-tint"></i> <span>X-Band Transmitter </span></a></li>
        <li class="active"><a href="Procedures.php"><i class="icon icon-pencil"></i> <span> Power Generator  </span></a></li>



    </ul>
</div>

<!--close-left-menu-stats-sidebar-->

<div id="content">
    <div id="content-header">
        <!--<div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>-->
        <h1>Increase Power Output  </h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5> Increase Power Output By ID  </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Enter Generator ID  :</label>
                                <div class="controls">
                                    <input type="text" id="generator_id" name="generator_id" class="span11" placeholder="Enter  Generator ID HERE " />
                                </div>
                            </div>


                    </div>
                    <div class="form-actions" align="center">
                        <button type="submit" id="add" class="btn btn-success" name="add">Submit</button>

                    </div>
                    </form>
                </div>
            </div>

            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Power Generator Information</h5>
                    </div>
                    <!--Table-->
                    <div class="table-responsive">
                        <form method="post">

                            <table id="table" class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">GENERATOR_ID </th>
                                    <th scope="col">Rover ID</th>
                                    <th scope="col">GENERATOR NAME</th>
                                    <th scope="col"> CONSUMEMATERIAL</th>
                                    <th scope="col">POWEROUTPUT</th>

                                </thead>
                                <tbody>
                                <?php

                                include('DBConn.php');
                                $stid = oci_parse($conn, 'SELECT * FROM POWERGENERATOR');
                                oci_execute($stid);

                                while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                                    // Use the uppercase column names for the associative array indices
                                    echo "<tr>\n";
                                    echo "    <td class='align-middle'>" . $row['GENERATORID']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['ROVERID']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['GENERATORNAME']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['CONSUMEMATERIAL']   . "</td>\n";
                                    echo "    <td class='align-middle'>" . $row['POWEROUTPUT']   . "</td>\n";
                                    echo "</tr>\n";
                                }

                                ?>
                                </tbody>
                            </table>



                        </form>
                    </div>
                    <!--Table-->
                </div>
            </div>
        </div>


    </div>

    <?php


    include 'DBConn.php';

    if(isset($_POST['add'])) {

        $generator_id = $_POST['generator_id'];


        $query = "BEGIN INCREASEPOWER($generator_id);END;";

        $stid = oci_parse($conn, $query);

        oci_execute($stid);

        if ($stid) {
            echo "<script>alert('Data Successfully Added');</script>";
        }

    }





    ?>



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
