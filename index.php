<?php
include 'db.php';
$m = new monogd();
$num = mt_rand(100000, 999999);
?>

<!DOCTYPE html>
<html lang="en">
<!-- head file -->
<?php include_once 'headTag.php'; ?>

<body>
    <div id="main_ctr">
        <div class="cfgInner">
            <!-- cruise header -->
            <?php include_once "header.php"; ?>
            <div class="main_section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 p_lrzero">
                            <!-- cruise FORM -->
                            <?php include_once "cruiseform.php" ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cruise ENQUIRY -->
            <?php include_once 'enquiry.php' ?>
            <!-- Top cruise line -->
            <?php include_once "topcruise.php" ?>
            <!--  Departure Port with Great Cruises Leaving from -->
            <?php include_once "departports.php" ?>
        </div>
        <!-- cruise FOOTER -->
        <?php include_once "footer.php" ?>
    </div>
    <!-- cruise script -->
    <?php include_once 'cruisescript.php' ?>
</body>

</html>