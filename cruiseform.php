<?php
$destination_cursor = $m->destination(["_id" => ['$ne' => null]], 2);
$cruiseLength_cursor = $m->cruiseLength(["_id" => ['$ne' => null]], 2);
$departPort_cursor = $m->departPort(["_id" => ['$ne' => null]], 2);
$cruiseShipData_cursor = $m->cruiseShipData(["_id" => ['$ne' => null]], 2);
?>
<div class="form-left">
    <!-- //* FORM  -->
    <form class="needs-validation" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="cruiseForm">
        <div class="upperside">
            <h2 class="mb-2 form_heding">Book Cruises Online And Save</h2>
            <div class="form-row row m_bottom">
                <!-- //* NAME FIELD -->
                <div class="form-group col-md-6 p_lzero form-floating form-floating-custom star">
                    <input type="text" class="form-control input-sm" id="name" name="name"
                        onkeyup="show_name(this.value);" autocomplete="off">
                    <label for="name" class="label">Name</label>
                    <div class="tooltip-error error1" style="display: none;"><img width="20" height="20"
                            src="https://img.icons8.com/tiny-color/25/error.png" alt="error" />Please Enter Your Name.
                    </div>
                </div>
                <!-- //* EMAIL FIELD  -->
                <div class="form-group col-md-6 form-floating form-floating-custom star">
                    <input type="email" class="form-control input-sm" id="email" name="email"
                        onkeyup="checkEmail(this.value);" autocomplete="off">
                    <label for="email">Email</label>
                    <div class="tooltip-error error2" style="display: none;"><img width="20" height="20"
                            src="https://img.icons8.com/tiny-color/25/error.png" alt="error" />Please Enter Your Email.
                    </div>
                </div>
            </div>

            <div class="form-row row mb-1">
                <!-- //* PHONE FIELD -->
                <div class="form-group col-md-6 mb-2 p_lzero form-floating form-floating-custom star">
                    <input type="tel" class="form-control input-sm" id="number" name="number" pattern="[0-9]{10}"
                        maxlength="10" required="" onkeyup="checkValidateMobile(this.value)" autocomplete="off">
                    <label for="number">Phone Number</label>
                    <div class="tooltip-error error3" style="display: none;"><img width="20" height="20"
                            src="https://img.icons8.com/tiny-color/25/error.png" alt="error" />Please Enter Your Number.
                    </div>
                </div>
                <!-- //* TRAVELERS FIELD -->
                <div class="form-group col-md-6 mb-2 form-floating star">
                    <select class="floating-select form-select input-sm input-sm2" id="travelers" name="travelers">
                        <option value disabled selected>Select Travelers
                        </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    <label for="travelers">Travelers</label>
                    <div class="tooltip-error error4" style="display: none;"><img width="20" height="20"
                            src="https://img.icons8.com/tiny-color/25/error.png" alt="error" />Please Choose Travelers.
                    </div>
                </div>
            </div>
        </div>

        <div class="downside">
            <div class="form-row row m_bottom">

                <!-- //* DESTINATION DROPDOWN -->
                <div class="form-group col-md-6 mt-2 p_lzero form-floating">
                    <select class="floating-select form-select input-sm" id="destination" name="destination">
                        <!-- <option value="" selected disabled></option> -->
                        <option value="Destination (Any)">Destination (Any)</option>
                        <?php foreach ($destination_cursor as $value): ?>
                            <option class="" value="<?php echo $value['destination']; ?>">
                                <?php echo $value['destination']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label for="destination">Destination</label>
                    <div class="tooltip-error error5" style="display: none;"><img width="20" height="20"
                            src="https://img.icons8.com/tiny-color/25/error.png" alt="error" />Please Choose Your
                        Destination.</div>
                </div>
                <!-- //* CRUISE LENGTH -->
                <div class="form-group col-md-6 mt-2 form-floating">
                    <select class="floating-select form-select input-sm" id="cruise-length" name="cruise-length"
                        required="" oninvalid="this.setCustomValidity('Please select a cruise length.')"
                        oninput="setCustomValidity('')">
                        <option value="Cruise Length (Any)">Cruise Length (Any)</option>
                        <?php foreach ($cruiseLength_cursor as $cruiseLength): ?>
                            <option value="<?php echo $cruiseLength['cruiselength']; ?>">
                                <?php echo $cruiseLength['cruiselength']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label for="destination">Cruise Length</label>
                    <div class="tooltip-error error6" style="display: none;"><img width="20" height="20"
                            src="https://img.icons8.com/tiny-color/25/error.png" alt="error" />Please Choose Your
                        Length.</div>
                </div>
            </div>

            <div class="form-row row m_bottom ">
                <!-- //* DEPART DATE -->
                <div class="form-group col-md-6 position-relative p_lzero form-floating form-floating-custom">
                    <input type="text" id="depart_date" name="depart_date" class="form-control input-sm"
                        autocomplete="off" required oninvalid="this.setCustomValidity('Please enter a Date.')">
                    <img class="ui-datepicker-trigger" src="images/cal.png" alt="Click here for calendar"
                        title="Click here for calendar">
                    <label for="depart_date">Depart Date</label>
                    <input type="hidden" id="depart" name="depart">
                    <input type="hidden" id="return" name="return">
                    <div class="tooltip-error error7" style="display: none;"><img width="20" height="20"
                            src="https://img.icons8.com/tiny-color/25/error.png" alt="error" />Please Select Your Date.
                    </div>
                </div>

                <!-- //* CRUISE LINE -->

                <div class="form-group col-md-6 form-floating">
                    <select id="cruise-line" name="cruise-line" required
                        oninvalid="this.setCustomValidity('Please select a cruise line.')"
                        class="floating-select form-select input-sm" data-minimum-results-for-search="Infinity">
                        <!-- <option data-img_src="" value="">Cruise Line (Any)</option> -->
                        <option data-img_src="" value="Cruise Line (Any)">Cruise Line (Any)</option>
                        <?php foreach ($cruiseShipData_cursor as $cruiseshipLineData): ?>
                            <option data-img_src="<?php echo $cruiseshipLineData["cruiselogo"] ?>">
                                <?php echo $cruiseshipLineData["cruisename"] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="new_label">
                        <label>Cruise Line</label>
                    </div>
                    <div class="tooltip-error error8" style="display: none;"><img width="20" height="20"
                            src="https://img.icons8.com/tiny-color/25/error.png" alt="error" />Please Choose your Cruise
                        line.</div>
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
                    <select class="floating-select form-select input-sm" id="cruise-ship" name="cruise-ship" required=""
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
                    <div class="tooltip-error error9" style="display: none;"><img width="20" height="20"
                            src="https://img.icons8.com/tiny-color/25/error.png" alt="error" />Please Choose Your Cruise
                        Ships.</div>
                </div>

                <div class="form-group col-md-6 form-floating">
                    <!-- //* DEPARTURE PORTS -->
                    <select class="floating-select form-select input-sm" id="departure-port" name="departure-port"
                        required="" oninvalid="this.setCustomValidity('Please select a departure port.')"
                        oninput="setCustomValidity('')">
                        <option value="Departure Ports(Any)">Departure Ports(Any)</option>
                        <?php foreach ($departPort_cursor as $departurePorts): ?>
                            <option class="" value="<?php echo $departurePorts["departports"]; ?>">
                                <?php echo $departurePorts["departports"]; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label for="departure-port">Departure Port</label>
                    <div class="tooltip-error error10" style="display: none;"><img width="20" height="20"
                            src="https://img.icons8.com/tiny-color/25/error.png" alt="error" />Please Choose Departure
                        Ports.</div>
                </div>
            </div>
            <!-- //* ADDITIONAL DISCOUNT -->
            <div class="form-row row m_bottom">
                <div class="form-group col-md-6 p_lzero" style="cursor: not-allowed;">
                    <a id="pop_up" tabindex="0" class="lock_btn_page" data-placement="top" role="button"
                        data-bs-toggle="popover" title="" style="pointer-events: none;color: #8080805e;">Additional
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
                    <button type="submit" id="submit1" class="btn btn_submit">Submit</button>
                    <div class="spinner-border" id="loading" role="status" style="margin: 0 auto;display:none;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div id="f">
                        <p id="formSubmitted" style="color: green;text-align: center;display:none;">
                            <img width="25" height="25" src="https://img.icons8.com/fluency/48/checked.png"
                                alt="checked" /> Congratulation! Your Request Successfully Submitted.
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
                    <div class="banner_call"><i class="fas fa fa-phone" aria-hidden="true"></i>
                        1-844-313-1111</div>
                </div>
            </div>
            <h1 class="world_lar">World’s Largest Cruise Agency</h1>
        </div>
    </div>
</div>