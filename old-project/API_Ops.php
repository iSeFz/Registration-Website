<?php
function getActors() {
    if (!isset($_POST["birthdate"])) {
        echo json_encode(["error" => "birthdate is not set"]);
        return;
    }

    $birthDate = $_POST["birthdate"];
    list($year, $month, $day) = explode("-", $birthDate);
    $url = "https://online-movie-database.p.rapidapi.com/actors/list-born-today?month={$month}&day={$day}";

    $headers = [
	    "X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
	    "X-RapidAPI-Key: 830acb4aaemsh6ab7a107a30a1a6p1378efjsnfee22c84416a"
	    ];

    $actorIds = fetchDataWithDelay($url, $headers);
    $actorIds = array_slice($actorIds, 0, 5);
    $names = array_map('getActorNameById', $actorIds);

    echo json_encode($names);
}

function fetchDataWithDelay($url, $headers) {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $headers
    ]);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);
    $actorIds = array_map(function($actor) {
        return explode("/", $actor)[2];
    }, $data);

    return $actorIds;
}

function getActorNameById($actorId) {
    $url = "https://online-movie-database.p.rapidapi.com/actors/get-bio?nconst={$actorId}";
    $headers = [
        "X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
	"X-RapidAPI-Key: 830acb4aaemsh6ab7a107a30a1a6p1378efjsnfee22c84416a"
    ];

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $headers
    ]);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    return $data['name'] ?? "Unknown";
}

getActors();
?>
