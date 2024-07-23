<!-- <script src="js/jquery.min.js"></script> -->
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/select2.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/validation.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/index.js"></script>
<script src="js/select2.js"></script>
<script src="js/customscript.js"></script>
<script type="text/javascript" src="js/moment.min.js"></script>
<script type="text/javascript" src="js/daterangepicker.min.js"></script>


<script>
    $("#cruise-line").change(function () {
        console.log($("#cruise-line").val())
        var cruisedata = <?php echo json_encode($cruiseShipData_cursor); ?>;
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