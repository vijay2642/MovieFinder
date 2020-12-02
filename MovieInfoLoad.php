<?php
function getOMDBInfo($title) {
	$apikey = '5f7d40f1';
	$apiURL = 'http://www.omdbapi.com/?apikey=' . $apikey . '&t=' . urlencode($title);

	$curl = curl_init();
	// echo ('http://www.omdbapi.com/?apikey=' . $apikey . '&t=' . urlencode($title));
	echo ($apiURL);
	echo ("\n");

	curl_setopt_array($curl, [
		CURLOPT_URL => $apiURL,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		return $response;
	}

}

// getOMDBInfo('Aakasa Ramanna');
// getOMDBInfo('Kabali');