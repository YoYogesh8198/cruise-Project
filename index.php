<?php
include 'db.php';
$m = new monogd();
// $destination_cursor = $m->destination(["_id" => ['$ne' => null]], 2);
// $cruiseLength_cursor = $m->cruiseLength(["_id" => ['$ne' => null]], 2);
// $departPort_cursor = $m->departPort(["_id" => ['$ne' => null]], 2);
// $cruiseShipData_cursor = $m->cruiseShipData(["_id" => ['$ne' => null]], 2);
// $topcruiseline_cursor = $m->topcruiseline(["_id" => ['$ne' => null]], 2);
// $popularDestination_cursor = $m->popularDestination(["_id" => ['$ne' => null]], 2);
// $greatcruiseleaving_cursor = $m->greatcruiseleaving(["_id" => ['$ne' => null]], 2);
// $FindBestCruise_cursor = $m->FindBestCruise(["_id" => ['$ne' => null]], 2);

$num = mt_rand(100000, 999999);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="images/airtkt.svg" type="image/x-icon">
    <title>Airtkt Cruise</title>
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <script src="js/select2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/daterangepicker.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>

    <div id="main_ctr">
        <div class="cfgInner">
            <?php include_once "header.php"; ?>
            <div class="main_section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 p_lrzero">
                            <?php include_once "form.php" ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once 'enquiry.php' ?>
            <!--  -->

            <!--//*Top cruise line -->
            <?php include_once "topcruise.php" ?>

            <!-- //* Departure Port with Great Cruises Leaving from -->
            <?php include_once "departports.php" ?>

        </div>
        <?php include_once "footer.php" ?>
        <!--Responsive menu css end here-->


        <!-- form -->

    </div>
    <!-- end -->

    <!-- <script src="js/index.js"></script> -->
    <script src="js/jquery.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/validation.js"></script>

    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/select2.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script> -->
    <script src="js/customscript.js"></script>
    <script type="text/javascript" src="js/moment.min.js"></script>
    <script type="text/javascript" src="js/daterangepicker.min.js"></script>


    <script>
        $("#cruise-line").change(function () {
            console.log($("#cruise-line").val())
            var cruisedata = <?php echo json_encode($cruiseShipData_cursor) ?>;
            console.log(cruisedata)
            var selectedCruise = $("#cruise-line").val();
            $("#cruise-ship").empty();

            var selectedCruiseData = cruisedata.find(function (cruise) {
                return cruise.cruisename === selectedCruise;
            });
            $("#cruise-ship").append('<option value="Cruise Ship (Any)">Cruise Ship (Any)</option>')
            if (selectedCruiseData) {
                selectedCruiseData.cruiseShips.forEach(function (ship) {
                    $("#cruise-ship").append(
                        '<option value="' + ship.shipname + '">' + ship.shipname + "</option>"
                    );
                });
            }
            $("cruise").on('Tap', function () {
                console.log("tap")
            })
        });

    </script>


    <!-- <script src="js/guru-new.js"></script> -->
</body>

</html>