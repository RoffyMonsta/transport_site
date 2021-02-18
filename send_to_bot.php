<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $secret_token = "1614286885:AAEhEJD7vXkExtI5o9Z2GkkT50KcOZRC94Y";
    $telegram_id = "471922503";
    $pesan_teks = $_POST ['pesan_teks'];

function sendMessage($telegram_id, $pesan_teks, $secret_token) {
    $url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($pesan_teks);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

sendMessage($telegram_id, $pesan_teks, $secret_token);
echo "<script>window.location.href = 'thank_you.html'; </script>";
}
?>