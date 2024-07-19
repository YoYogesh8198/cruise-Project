
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: application/json');

$response = array("success" => false, "message" => "some error occured");
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $travelers = $_POST['travelers'];
        $destination = $_POST['destination'];
        $cruise_length = $_POST['cruise-length'];
        // $add_hold_time = $_POST['add_hold_time'];
        $depart = $_POST['depart'];
        $return = $_POST['return'];
        $cruise_line = $_POST['cruise-line'];
        $cruise_ship = $_POST['cruise-ship'];
        $departure_port = $_POST['departure-port'];
        $uniqueId = $_POST['uniqueId'];

        $filter = ['uniqueId' => $uniqueId];
        $options = [];

        $query = new MongoDB\Driver\Query($filter, $options);
        $rows = $client->executeQuery('cruiseTable.details', $query);

        if (count($rows->toArray()) == 0) {
            $insert = new MongoDB\Driver\BulkWrite;
            $insert->insert(
                [
                    'uniqueId' => $uniqueId,
                    'name' => $name,
                    'email' => $email,
                    'number' => $number,
                    'travelers' => $travelers,
                    'destination' => $destination,
                    'cruise_length' => $cruise_length,
                    // 'add_hold_time' => $add_hold_time,
                    'depart' => $depart,
                    'return' => $return,
                    'cruise_line' => $cruise_line,
                    'cruise_ship' => $cruise_ship,
                    'departure_port' => $departure_port,
                ]
            );
            $result = $client->executeBulkWrite('cruiseTable.details', $insert);
            if ($result) {
                $response = array("success" => true, "message" => "✔ successfully Submitted ");
            }
        }
    } catch (\Throwable $th) {
        //
    }
}
$num = mt_rand(100000, 999999);
echo json_encode($response);
?>