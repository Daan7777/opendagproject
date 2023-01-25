<?php

$curl = curl_init();


$post = [];
$post['to'] = 'test@test.com';
$post['from'] = ['name' => 'Test', 'email' => 'mailtrap@beroepenevent.nl'];
$post['subject'] = 'Test';
$post['html'] = '<h2>This is a test</h2><p>It works!</p>';

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://send.api.mailtrap.io/api/send',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{"from":{"email":"mailtrap@beroepenevent.nl","name":"Mailtrap Test"},"to":[{"email":"tandrae@rockopnh.nl"}],"subject":"$subject !","html":"Congrats for sending test email with Mailtrap! <br><br>test","category":"Integration Test"}',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer 3c9c83829882515bfe3996b22b217508',
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>