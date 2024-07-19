<?php
include 'db.php';
$m = new monogd();
$destination_cursor = $m->destination(["_id" => ['$ne' => null]], 2);
$cruiseLength_cursor = $m->cruiseLength(["_id" => ['$ne' => null]], 2);
$departPort_cursor = $m->departPort(["_id" => ['$ne' => null]], 2);
$cruiseShipData_cursor = $m->cruiseShipData(["_id" => ['$ne' => null]], 2);
$topcruiseline_cursor = $m->topcruiseline(["_id" => ['$ne' => null]], 2);
$popularDestination_cursor = $m->popularDestination(["_id" => ['$ne' => null]], 2);
$greatcruiseleaving_cursor = $m->greatcruiseleaving(["_id" => ['$ne' => null]], 2);
$FindBestCruise_cursor = $m->FindBestCruise(["_id" => ['$ne' => null]], 2);

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

    <style>

    </style>
</head>

<body>

    <div id="main_ctr">
        <div class="cfgInner">
            <?php include_once "header.php"; ?>
            <div class="main_section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 p_lrzero">
                            <div class="form-left">
                                <!-- //* FORM  -->
                                <form class="needs-validation" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                                    method="post" id="cruiseForm">
                                    <div class="upperside">
                                        <h2 class="mb-2 form_heding">Book Cruises Online And Save</h2>
                                        <div class="form-row row m_bottom">
                                            <!-- //* NAME FIELD -->
                                            <div
                                                class="form-group col-md-6 p_lzero form-floating form-floating-custom star">
                                                <input type="text" class="form-control input-sm" id="name" name="name"
                                                    onkeyup="show_name(this.value);" required=""
                                                    oninvalid="this.setCustomValidity('Please enter your name.')"
                                                    oninput="setCustomValidity('')">
                                                <label for="name">Name</label>
                                            </div>
                                            <!-- //* EMAIL FIELD  -->
                                            <div class="form-group col-md-6 form-floating form-floating-custom star">
                                                <input type="email" class="form-control input-sm" id="email"
                                                    name="email" required=""
                                                    oninvalid="this.setCustomValidity('Please enter a valid email.')"
                                                    oninput="setCustomValidity('')" onkeyup="checkEmail(this.value);">
                                                <label for="email">Email</label>
                                            </div>
                                        </div>

                                        <div class="form-row row mb-1">
                                            <!-- //* PHONE FIELD -->
                                            <div
                                                class="form-group col-md-6 mb-2 p_lzero form-floating form-floating-custom star">
                                                <input type="tel" class="form-control input-sm" id="number"
                                                    name="number" pattern="[0-9]{10}" maxlength="10" required=""
                                                    oninvalid="this.setCustomValidity('Please enter your phone number.')"
                                                    oninput="setCustomValidity('')"
                                                    onkeyup="checkValidateMobile(this.value)">
                                                <label for="number">Number</label>
                                            </div>
                                            <!-- //* TRAVELERS FIELD -->
                                            <div class="form-group col-md-6 mb-2 form-floating star">
                                                <select class="floating-select form-select input-sm input-sm2"
                                                    id="travelers" name="travelers" required=""
                                                    oninvalid="this.setCustomValidity('Please select the number of travelers.')"
                                                    oninput="setCustomValidity('')">
                                                    <option value disabled selected>
                                                    </option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                                <label for="travelers">Travelers</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="downside">
                                        <div class="form-row row m_bottom">

                                            <!-- //* DESTINATION DROPDOWN -->
                                            <div class="form-group col-md-6 mt-2 p_lzero form-floating">
                                                <select class="floating-select form-select input-sm" id="destination"
                                                    name="destination" required=""
                                                    oninvalid="this.setCustomValidity('Please select a destination.')"
                                                    oninput="setCustomValidity('')">
                                                    <!-- <option value="" >Destination (Any)</option> -->
                                                    <option value="Destination (Any)">Destination (Any)</option>
                                                    <?php foreach ($destination_cursor as $value): ?>
                                                        <option class="" value="<?php echo $value['destination']; ?>">
                                                            <?php echo $value['destination']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label for="destination">Destination</label>
                                            </div>
                                            <!-- //* CRUISE LENGTH -->
                                            <div class="form-group col-md-6 mt-2 form-floating">
                                                <select class="floating-select form-select input-sm" id="cruise-length"
                                                    name="cruise-length" required=""
                                                    oninvalid="this.setCustomValidity('Please select a cruise length.')"
                                                    oninput="setCustomValidity('')">
                                                    <option value="Cruise Length (Any)">Cruise Length (Any)</option>
                                                    <?php foreach ($cruiseLength_cursor as $cruiseLength): ?>
                                                        <option value="<?php echo $cruiseLength['cruiselength']; ?>">
                                                            <?php echo $cruiseLength['cruiselength']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label for="destination">Cruise Length</label>
                                            </div>
                                        </div>

                                        <div class="form-row row m_bottom ">
                                            <!-- //* DEPART DATE -->
                                            <div
                                                class="form-group col-md-6 position-relative p_lzero form-floating form-floating-custom">
                                                <input type="text" id="depart_date" name="depart_date"
                                                    class="form-control input-sm" autocomplete="off" required
                                                    oninvalid="this.setCustomValidity('Please enter a Date.')">
                                                <img class="ui-datepicker-trigger" src="images/cal.png"
                                                    alt="Click here for calendar" title="Click here for calendar">
                                                <label for="depart_date">Depart Date</label>
                                                <input type="hidden" id="depart" name="depart">
                                                <input type="hidden" id="return" name="return">
                                            </div>

                                            <!-- //* CRUISE LINE -->

                                            <div class="form-group col-md-6 form-floating">
                                                <select id="cruise-line" name="cruise-line" required
                                                    oninvalid="this.setCustomValidity('Please select a cruise line.')"
                                                    class="floating-select form-select input-sm"
                                                    data-minimum-results-for-search="Infinity">
                                                    <option data-img_src="" value="Cruise Line (Any)">Cruise Line (Any)
                                                    </option>
                                                    <?php foreach ($cruiseShipData_cursor as $cruiseshipLineData): ?>
                                                        <option
                                                            data-img_src="<?php echo $cruiseshipLineData["cruiselogo"] ?>">
                                                            <?php echo $cruiseshipLineData["cruisename"] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="new_label">
                                                    <label>Cruise Line</label>
                                                </div>
                                            </div>

                                            <!-- //* this is without image on input field -->
                                            <!-- <div class="form-group col-md-6 form-floating">
                                                <input class="floating-select form-select input-sm"
                                                    type="text" id="cruise-line" name="cruise-line" required oninvalid="this.setCustomValidity('Please select a cruise line.')">
                                                <ul id="cruise-line-img" style="display: none;">
                                                    <li data-value=""></li>
                                                    <li data-value="Cruise Line (Any)">Cruise Line (Any)</li>
                                                    <?php //foreach ($results['cruiseshipLineData'] as $cruiseshipLineData): ?>
                                                        <li data-value="<?php //echo $cruiseshipLineData->cruisename ?>">
                                                            <img src="<?php //echo $cruiseshipLineData->cruiselogo ?>"
                                                                alt="cruise line logo" >
                                                            <p><?php //echo $cruiseshipLineData->cruisename ?></p>
                                                        </li>
                                                    <?php //endforeach; ?>
                                                </ul>
                                                <label for="cruise-line">Cruise Line</label>
                                                
                                            </div> -->

                                        </div>

                                        <div class=" form-row row m_bottom">
                                            <!-- //* CRUISE SHIP -->
                                            <div class="form-group col-md-6 p_lzero form-floating">
                                                <select class="floating-select form-select input-sm" id="cruise-ship"
                                                    name="cruise-ship" required=""
                                                    oninvalid="this.setCustomValidity('Please select a cruise ship.')"
                                                    oninput="setCustomValidity('')">
                                                    <option value="Cruise Ship (Any)">Cruise Ship (Any)</option>
                                                    <?php foreach ($cruiseShipData_cursor as $cruisedata): ?>
                                                        <?php foreach ($cruisedata["cruiseShips"] as $cruiseShips): ?>
                                                            <option value="<?php echo $cruiseShips["shipname"]; ?>">
                                                                <?php
                                                                echo $cruiseShips["shipname"]; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label for="cruise-ship">Cruise Ship</label>

                                            </div>

                                            <div class="form-group col-md-6 form-floating">
                                                <!-- //* DEPARTURE PORTS -->
                                                <select class="floating-select form-select input-sm" id="departure-port"
                                                    name="departure-port" required=""
                                                    oninvalid="this.setCustomValidity('Please select a departure port.')"
                                                    oninput="setCustomValidity('')">
                                                    <option value="Departure Ports(Any)">Departure Ports(Any)</option>
                                                    <?php foreach ($departPort_cursor as $departurePorts): ?>
                                                        <option class=""
                                                            value="<?php echo $departurePorts["departports"]; ?>">
                                                            <?php echo $departurePorts["departports"]; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label for="departure-port">departure port</label>

                                            </div>
                                        </div>
                                        <!-- //* ADDITIONAL DISCOUNT -->
                                        <div class="form-row row m_bottom">
                                            <div class="form-group col-md-6 p_lzero" style="cursor: not-allowed;">
                                                <a id="pop_up" tabindex="0" class="lock_btn_page" data-placement="top"
                                                    role="button" data-bs-toggle="popover" title=""
                                                    style="pointer-events: none;color: #8080805e;">Additional
                                                    Discounts
                                                    <img class="arrow-down" src="images/add_arrow.svg"></a>
                                                <!-- <div> -->
                                                <div data-name="popover-content">
                                                    <div class="add_body">
                                                        <span>Discount $ <input type="number">
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                            <input type="hidden" name="uniqueId" value="<?php echo $num; ?>" />
                                            <div class="form-group custombtn col-md-6">
                                                <button type="submit" id="submit1"
                                                    class="btn btn_submit">Submit</button>
                                                <div class="spinner-border" id="loading" role="status"
                                                    style="margin: 0 auto;display:none;">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                                <div id="f">
                                                    <p id="formSubmitted"
                                                        style="color: green;font-size: 17px;font-weight: 900;display:none;">
                                                        <img width="38" height="38"
                                                            src="https://img.icons8.com/fluency/48/checked.png"
                                                            alt="checked" /> successfully Submitted
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- //*Get Great Flight Prices from Our Travel Experts 24x7x365 -->
                            <div class="form-right ">
                                <div class="upto_main">
                                    <div class="uptotxt">
                                        <div class="Up_to">Up to</div>
                                        <div class="OFF">37% OFF</div>
                                        <div class="Cheap_Cruises">Cheap Cruises</div>
                                    </div>
                                    <div class="banner_sec_por text-center">
                                        <h1>Need Help Booking?</h1>
                                        <p class="banner_deal">It's Free! <span><br>Call Experts 24x7x365</span></p>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="banner_call"><i class="fas fa fa-phone"
                                                        aria-hidden="true"></i>
                                                    1-844-313-1111</div>
                                            </div>
                                        </div>
                                        <h1 class="world_lar">World’s Largest Cruise Agency</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="sa-icnInfo">
                            <div class="row">

                                <div class="col-4 col-md-4">
                                    <img role="img" alt="Easier Than Ever Booking Icon" class="s_booking img-fluid"
                                        src="images/eaiser_than.png">
                                    <h2>Easier Than Ever Booking</h2>
                                </div>

                                <div class="col-4 col-md-4">
                                    <img role="img" alt="Available 24x7x365 Icon" class="s_24hr img-fluid"
                                        src="images/available_24.png">
                                    <h2>Available 24x7x365</h2>
                                </div>

                                <div class="col-4 col-md-4">
                                    <img role="img" alt="Flight Expert Since 1990 Icon" class="s_expert img-fluid"
                                        src="images/flight_expert.png">
                                    <h2>Flight Expert Since 1990</h2>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="row polDest">
                    <div class="col-sm-12 col-xs-12 no-paddLF">

                        <div class="sa-call-now-section">

                            <div class="sa-for-new">

                                <div class="sa-top-callbox">
                                    <div class="sa-call-inner-sec">
                                        <h2>Get Great Flight Prices from Our Travel Experts 24x7x365</h2>
                                    </div>
                                    <!-- <div class="sa-supersale">Super Sale</div> -->
                                    <div class="getcl-blk">
                                        <img role="img" alt="Call Icon" class="get-phnimg"
                                            src="https://cdn.airfuture.com/img/res/simPhn.svg">
                                        <span class="sa-call-new" role="heading">Call</span>
                                        <span class="sa-phno-txt">
                                            <a role="button" aria-label="call 1-213-225-9867" href="tel:1-213-225-9867"
                                                class="hidden-xs">1-213-225-9867</a>
                                            <a role="button" aria-label="call 1-213-955-9695" href="tel:+1213-955-9695"
                                                class="visible-xs">1-213-955-9695</a>
                                        </span>
                                    </div>
                                    <div class="sa-or">or</div>
                                    <a role="button" aria-label="Get a Call" href="javascript:void(0)"
                                        class="sa-clnowbtn" onclick="MobGetCall();">Get a Call</a>
                                </div>
                                <div class="sa-assist-img-desk">
                                    <img role="img" alt="Call Assist Icon" src="images/call-center-girl1.jpg">
                                </div>

                            </div>

                            <div class="clearfix"></div>
                            <div class="mob_get_form" id="mob_getcall_form"></div>
                        </div>



                    </div>
                </div>
            </div>
            <!--  -->

            <!--//*Top cruise line -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 top_heading">Top Cruise Line</div>
                </div>
                <div class="row popular_top">
                    <?php
                    foreach ($topcruiseline_cursor as $cruise) {
                        ?>
                        <div class="col-12 col-md-4 mt-4">
                            <div class="box_shadow">
                                <img class="w-100 img-fluid" src="<?php echo $cruise["ship_image"]; ?>" alt="Cuise">
                                <div class="priceTagConainer">
                                    <div class="priceTag">
                                        <p>From</p>
                                        <span><?php echo $cruise["ship_price"]; ?></span>
                                    </div>
                                </div>
                                <div class="card-content ">
                                    <!-- <div class="card-heading"><img src="images/cruise-logo-2.jpg" alt="Top Cruise Logo"> -->
                                    <div class="card-heading"><img src="<?php echo $cruise["ship_logo"]; ?>"
                                            alt="Top Cruise Logo">
                                    </div>
                                    <ul class="list">
                                        <?php foreach ($cruise["ship_desription"] as $description) { ?>
                                            <li>
                                                <h4 class="text-truncate"><?php echo $description["title"] ?></h4>
                                                <p class="text-truncate"> <?php echo $description["text"] ?></p>&nbsp;
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <div class="actionButton"><a href="#"><?php echo $cruise["ship_name"]; ?><img
                                                src="images/price-arrow.jpg" alt="Price arrow icon"></a></div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>


            <!-- //*Popular Crumise Destination -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 top_heading2">Popular Cruise Destination</div>
                </div>
                <!-- Slider -->
                <div class="carousel-container">
                    <div id="new-slider" class="owl-carousel owl-theme">
                        <?php foreach ($popularDestination_cursor as $popularCruise) { ?>
                            <div class="slider-wrapper ">
                                <div class="imgCard ">
                                    <div class="imgtext">
                                        <?php echo $popularCruise["title"]; ?>
                                    </div>
                                    <img src="<?php echo $popularCruise["img"]; ?>" alt="Popular Cruise Image1">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- //* Departure Port with Great Cruises Leaving from -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 top_heading3">Departure Port with Great Cruises Leaving from</div>
                </div>
                <!-- Slider -->
                <div class="carousel-container">
                    <div id="new-slider2" class="owl-carousel owl-theme">
                        <?php foreach ($greatcruiseleaving_cursor as $bestDepartData) { ?>

                            <div class="slider-wrapper">
                                <div class="imgCard imgCard2">
                                    <div class="imgtext">
                                        <?php echo $bestDepartData["title"]; ?>
                                    </div>
                                    <img src="<?php echo $bestDepartData["img"]; ?>" alt="Popular Cruise Image1">
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>

            <!-- //*Find the Best Cruise Vacation for you  -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 top_heading3">Find the Best Cruise Vacation for you</div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="accordion accordion_mine" id="accordionExample">
                            <?php foreach ($FindBestCruise_cursor as $index => $findBestCruise) { ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading_<?php echo $index; ?>">
                                        <button class="accordion-button <?php echo $index === 0 ? 'active' : ''; ?>"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse_<?php echo $index; ?>"
                                            aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>"
                                            aria-controls="collapse_<?php echo $index; ?>">
                                            <?php echo $findBestCruise["question"]; ?>
                                        </button>
                                    </h2>
                                    <div id="collapse_<?php echo $index; ?>"
                                        class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>"
                                        aria-labelledby="heading_<?php echo $index; ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?php echo $findBestCruise["answer"]; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

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