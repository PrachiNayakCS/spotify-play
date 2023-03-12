<?php
$spotify_track = getenv('SPOTIFY_TRACKID_CSV');
$client_id = getenv('SPOTIFY_CLIENT_ID');
$client_secret = getenv('SPOTIFY_CLIENT_SECRET');

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . base64_encode($client_id . ':' . $client_secret), 'Content-Type: application/x-www-form-urlencoded'));
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

$response = curl_exec($curl);
$token = json_decode($response)->access_token;
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  print "cURL Error #:" . $err;
  curl_close($curl);
} else {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, 'https://api.spotify.com/v1/audio-features?ids=' . $spotify_track);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer ' . $token));
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  $track_info = curl_exec($curl);
  curl_close($curl);
  print $track_info;
}
?>