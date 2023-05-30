<?php
// Discord webhook URL from environment variable
$webhookUrl = getenv('APP_WEBHOOKURL');


// Retrieve form data
$email = $_POST['email'];
$system = $_POST['system'];
$description = $_POST['description'];
$steps = $_POST['steps'];
$expected = $_POST['expected'];
$used_system = $_POST['used_system'];
$used_os = $_POST['used_os'];
$used_touch = $_POST['touch'];
$internet = $_POST['connection'];
$info = $_POST['info'];

// Random Color
$color = dechex(rand(0x000000, 0xFFFFFF));

$message = array(
    'username' => 'Bug Report',
    "content" => "**A new Bug report has been submitted**",
    'embeds' => array(
        array(
            'color' => hexdec($color),
            'fields' => array(
                array(
                    'name' => '**Email**',
                    'value' => $email,
                    'inline' => false
                ),
                array(
                    'name' => '**Betroffenes System**',
                    'value' => $system,
                    'inline' => false
                ),
                array(
                    'name' => '**Beschreibung des Fehlers**',
                    'value' => $description,
                    'inline' => false
                ),
                array(
                    'name' => '**Schritte um den Fehler zu reproduzieren**',
                    'value' => $steps,
                    'inline' => false
                ),
                array(
                    'name' => '**Das Erwartete Verhalten**',
                    'value' => $expected,
                    'inline' => false
                ),
                array(
                    'name' => '**Genutztes System**',
                    'value' => $used_system,
                    'inline' => true
                ),
                array(
                    'name' => '**Genutztes Betriebssystem**',
                    'value' => $used_os,
                    'inline' => true
                ),
                array(
                    'name' => '**Wurde Touch genutzt?**',
                    'value' => $used_touch,
                    'inline' => true
                ),
                array(
                    'name' => '**Internetverbindung**',
                    'value' => $internet,
                    'inline' => true
                ),
                array(
                    'name' => '**Weiterführende Informationen**',
                    'value' => $info,
                    'inline' => false
                )
            )
        )

    )

);

// Send message to Discord
$payload = json_encode($message);
$ch = curl_init($webhookUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

// Display response for debugging 
echo $response;
curl_close($ch);

// Redirect back to the form
header("Location: index.html");
exit();
?>