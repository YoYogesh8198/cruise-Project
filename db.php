<!-- <?php
// $client = new MongoDB\Driver\Manager("mongodb://localhost:27017");
// $database = 'cruiseTable';
// $destination = 'destination';
// $cruiseLength = 'cruiseLength';
// $cruiselineData = 'cruiselineData';
// $departure_ports = 'departure_ports';
// $TopCruiseLine = 'TopCruiseLine';
// $popularDestination = 'popularDestination';
// $departPortGreatCruise = 'departPortswithGreat';
// $findBestCruiseQA = 'findBestCruiseQA';
// $details = 'details';

// $query = new MongoDB\Driver\Query([]);
// $destination_a = $client->executeQuery("$database.$destination", $query);
// $cruiseLength_a = $client->executeQuery("$database.$cruiseLength", $query);
// $TopCruiseLine_a = $client->executeQuery("$database.$TopCruiseLine", $query);
// $popularDestination_a = $client->executeQuery("$database.$popularDestination", $query);
// $departPortGreatCruise_a = $client->executeQuery("$database.$departPortGreatCruise", $query);
// $findBestCruiseQA_a = $client->executeQuery("$database.$findBestCruiseQA", $query);
// $cruiselineData_a = $client->executeQuery("$database.$cruiselineData", $query)->toArray();
// $departure_ports_a = $client->executeQuery("$database.$departure_ports", $query)->toArray();
// $details_a = $client->executeQuery("$database.$details", $query)->toArray();


// $results = [];
// foreach ($destination_a as $document) {
//     $results['destination'] = $document;
// }
// foreach ($cruiseLength_a as $document) {
//     $results['cruiseLength'] = $document;
// }
// foreach ($departure_ports_a as $document) {
//     $results['departure_ports'] = $document;
// }
// $results['cruiseshipLineData'] = [];
// $results['cruiseshipLineData'] = $cruiselineData_a;
// $results['TopcruiseLine'] = $TopCruiseLine_a->toArray();
// $results['popularDestination'] = $popularDestination_a->toArray();
// $results['departPortGreatCruise'] = $departPortGreatCruise_a->toArray();
// $results['findBestCruiseQA'] = $findBestCruiseQA_a->toArray();
// $results['details'] = $details_a;
// // var_dump($results['cruiseshipLineData']->cruisename);

// $destinationData = $results['destination']->destination;
// $cruiseLengthData = $results['cruiseLength']->cruiseLength;
// $departure_portsData = $results['departure_ports']->departure_ports;

// ?> -->




<?php
require 'vendor/autoload.php';

$mon_options = ["typeMap" => ['root' => 'array', 'document' => 'array']];

class monogd
{
    var $m;
    var $db;
    protected $mon_opt;

    function __construct()
    {
        global $mon_options;

        $this->m = new MongoDB\Client();
        $this->db = $this->m->cruise;
        $this->mon_opt =& $mon_options;
    }

    function destination($s, $t)
    {
        $destination = $this->db->destination;
        if ($t == 1) {
            return $destination->count($s);
        }
        if ($t == 2) {
            // $this->mon_opt['sort'] = ['_id' => 1];
            // unset($this->mon_opt['projection']);
            return $destination->find(array(), $this->mon_opt)->toArray();
        }
        if ($t == 3) {
            // $this->mon_opt['projection']=array('_id'=>0,"rg"=>1,"search_id"=>1,"complete"=>1);
            return $destination->findOne($s, $this->mon_opt);
        }
        if ($t == 4) {
            return $destination->updateOne(array("_id" => new MongoDB\BSON\ObjectId($s['mid']), "e" => $s['e']), array('$set' => $s));
        }
        if ($t == 5) {
            $destination->insertOne($s);
        }
        if ($t == 6) {
            $destination->insertMany($s);
        }

    }
    function cruiseLength($s, $t)
    {
        $cruiselength = $this->db->cruiselength;
        if ($t == 1) {
            return $cruiselength->count($s);
        }
        if ($t == 2) {
            // $this->mon_opt['sort'] = ['_id' => 1];
            // unset($this->mon_opt['projection']);
            return $cruiselength->find(array(), $this->mon_opt)->toArray();
        }
        if ($t == 3) {
            // $this->mon_opt['projection']=array('_id'=>0,"rg"=>1,"search_id"=>1,"complete"=>1);
            return $cruiselength->findOne($s, $this->mon_opt);
        }
        if ($t == 4) {
            return $cruiselength->updateOne(array("_id" => new MongoDB\BSON\ObjectId($s['mid']), "e" => $s['e']), array('$set' => $s));
        }
        if ($t == 5) {
            $cruiselength->insertOne($s);
        }
        if ($t == 6) {
            $cruiselength->insertMany($s);
        }
    }
    function departPort($s, $t)
    {
        $departureport = $this->db->departureport;
        if ($t == 1) {
            return $departureport->count($s);
        }
        if ($t == 2) {
            return $departureport->find(array(), $this->mon_opt)->toArray();
        }
        if ($t == 3) {
            return $departureport->findOne($s, $this->mon_opt);
        }
        if ($t == 4) {
            return $departureport->updateOne(array("_id" => new MongoDB\BSON\ObjectId($s['mid']), "e" => $s['e']), array('$set' => $s));
        }
        if ($t == 5) {
            $departureport->insertOne($s);
        }
        if ($t == 6) {
            $departureport->insertMany($s);
        }
    }
    function cruiseShipData($s, $t)
    {
        $cruiselineShip = $this->db->cruiselineShip;
        if ($t == 1) {
            return $cruiselineShip->count($s);
        }
        if ($t == 2) {
            return $cruiselineShip->find(array(), $this->mon_opt)->toArray();
        }
        if ($t == 3) {
            return $cruiselineShip->findOne($s, $this->mon_opt);
        }
        if ($t == 4) {
            return $cruiselineShip->updateOne(array("_id" => new MongoDB\BSON\ObjectId($s['mid']), "e" => $s['e']), array('$set' => $s));
        }
        if ($t == 5) {
            $cruiselineShip->insertOne($s);
        }
        if ($t == 6) {
            $cruiselineShip->insertMany($s);
        }
    }
    function topcruiseline($s, $t)
    {
        $topcruiseline = $this->db->topcruiseline;
        if ($t == 1) {
            return $topcruiseline->count($s);
        }
        if ($t == 2) {
            return $topcruiseline->find(array(), $this->mon_opt)->toArray();
        }
        if ($t == 3) {
            return $topcruiseline->findOne($s, $this->mon_opt);
        }
        if ($t == 4) {
            return $topcruiseline->updateOne(array("_id" => new MongoDB\BSON\ObjectId($s['mid']), "e" => $s['e']), array('$set' => $s));
        }
        if ($t == 5) {
            $topcruiseline->insertOne($s);
        }
        if ($t == 6) {
            $topcruiseline->insertMany($s);
        }
    }
    function popularDestination($s, $t)
    {
        $popularDestination = $this->db->popularDestination;
        if ($t == 1) {
            return $popularDestination->count($s);
        }
        if ($t == 2) {
            return $popularDestination->find(array(), $this->mon_opt)->toArray();
        }
    }

    function greatcruiseleaving($s, $t)
    {
        $greatcruiseleaving = $this->db->greatcruiseleaving;
        if ($t == 1) {
            return $greatcruiseleaving->count($s);
        }
        if( $t == 2) {
            return $greatcruiseleaving->find(array(), $this->mon_opt)->toArray();
        }
    }
    function FindBestCruise($s, $t)
    {
        $FindBestCruise = $this->db->FindBestCruise;
        if ($t == 1) {
            return $FindBestCruise->count($s);
        }
        if( $t == 2) {
            return $FindBestCruise->find(array(), $this->mon_opt)->toArray();
        }
    }

    function details($s, $t){
        $details = $this->db->details;
        if ($t == 1) {
            return $details->count($s);
        }
        if ($t == 2) {
            return $details->find(array(), $this->mon_opt)->toArray();
        }
        if ($t == 3) {
            $details->insertMany($s);
        }
    }
    function getAllCollections()
    {
        return $this->db->listCollections();
    }
}




?>