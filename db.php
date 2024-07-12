<?php
$client = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$database = 'cruiseTable';
$destination = 'destination';
$cruiseLength = 'cruiseLength';
$cruiselineData = 'cruiselineData';
$departure_ports = 'departure_ports';
$TopCruiseLine = 'TopCruiseLine';
$popularDestination = 'popularDestination';
$departPortGreatCruise = 'departPortswithGreat';
$findBestCruiseQA = 'findBestCruiseQA';
$details = 'details';

$query = new MongoDB\Driver\Query([]);
$destination_a = $client->executeQuery("$database.$destination", $query);
$cruiseLength_a = $client->executeQuery("$database.$cruiseLength", $query);
$TopCruiseLine_a = $client->executeQuery("$database.$TopCruiseLine", $query);
$popularDestination_a = $client->executeQuery("$database.$popularDestination", $query);
$departPortGreatCruise_a = $client->executeQuery("$database.$departPortGreatCruise", $query);
$findBestCruiseQA_a = $client->executeQuery("$database.$findBestCruiseQA", $query);
$cruiselineData_a = $client->executeQuery("$database.$cruiselineData", $query)->toArray();
$departure_ports_a = $client->executeQuery("$database.$departure_ports", $query)->toArray();
$details_a = $client->executeQuery("$database.$details", $query)->toArray();


$results = [];
foreach ($destination_a as $document) {
    $results['destination'] = $document;
}
foreach ($cruiseLength_a as $document) {
    $results['cruiseLength'] = $document;
}
foreach ($departure_ports_a as $document) {
    $results['departure_ports'] = $document;
}
$results['cruiseshipLineData'] = [];
$results['cruiseshipLineData'] = $cruiselineData_a;
$results['TopcruiseLine'] = $TopCruiseLine_a->toArray();
$results['popularDestination'] = $popularDestination_a->toArray();
$results['departPortGreatCruise'] = $departPortGreatCruise_a->toArray();
$results['findBestCruiseQA'] = $findBestCruiseQA_a->toArray();
$results['details'] = $details_a;
// var_dump($results['cruiseshipLineData']->cruisename);

$destinationData = $results['destination']->destination;
$cruiseLengthData = $results['cruiseLength']->cruiseLength;
$departure_portsData = $results['departure_ports']->departure_ports;





// $TopcruiseLineData = isset($results['TopcruiseLine']->topcruiseline);
// $popularDestinationData = isset($results['popularDestination']->popularDestination);
// $departPortGreatCruiseData = isset($results['departPortGreatCruise']->departPortGreatCruise);


// var_dump($destinationData);

// var_dump($results['destination']);

// $client = new MongoDB\Driver\Manager("mongodb://localhost:27017");
// 
// $database = 'Tables';
// $regions = 'regions';
// $cruise_line = 'cruise_lines';
// $all_departure_ports = 'all_departure_ports';
// $total_night = 'number_of_nights';
// $placeVisit = 'places_to_visit';
// $TopCruiseLine = 'TopCruiseLine';
// $popularCruiseDest = 'popularCruiseDest';
// $bestDepartPorts = 'bestDepartPorts';
// $findbestcruise = 'findbestcruise';
// $cruiselineData = 'cruiselineData';
// 
// $query = new MongoDB\Driver\Query([]);
// 
// $regions_a = $client->executeQuery("$database.$regions", $query);
// $cruise_a = $client->executeQuery("$database.$cruise_line", $query);
// $all_departure_ports_a = $client->executeQuery("$database.$all_departure_ports", $query);
// $totalNight_a = $client->executeQuery("$database.$total_night", $query);
// $visitPlace_a = $client->executeQuery("$database.$placeVisit", $query);
// $TopCruiseLine_a = $client->executeQuery("$database.$TopCruiseLine", $query);
// $popularCruiseDest_a = $client->executeQuery("$database.$popularCruiseDest", $query);
// $bestDepartPorts_a = $client->executeQuery("$database.$bestDepartPorts", $query);
// $findbestcruise_a = $client->executeQuery("$database.$findbestcruise", $query);
// $cruiselineData_a = $client->executeQuery("$database.$cruiselineData", $query)->toArray();
// 
// 
// $results = [];
// foreach ($regions_a as $document) {
// $results['region'] = $document;
// }
// foreach ($cruise_a as $document) {
// $results['cruise'] = $document;
// }
// foreach ($all_departure_ports_a as $document) {
// $results['departure_ports'] = $document;
// }
// 
// $results['cruiseshipLineData'] = [];
// $results['cruiseshipLineData'] = $cruiselineData_a;
// 
// foreach ($totalNight_a as $document) {
// $results['TotalNights'] = $document;
// }
// foreach ($visitPlace_a as $document) {
// $results['visitPlace'] = $document;
// }
// $results['cruiseLine'] = $TopCruiseLine_a->toArray();
// $results['popularCruiseLine'] = $popularCruiseDest_a->toArray();
// $results['bestDepartPortsLine'] = $bestDepartPorts_a->toArray();
// $results['findbest'] = $findbestcruise_a->toArray();
// 
// 
// 
// $regionsData = $results['region']->region;
// $cruiseData = $results['cruise']->cruiselines;
// $departurePorts = $results['departure_ports']->alldepartureports;
// $nightsData = $results['TotalNights']->numberofnights;
// $visitPlaceData = $results['visitPlace']->placestovisit;
// $topcruiseData = isset($results['cruiseLine']->topcruiseline);
// 
// ?>