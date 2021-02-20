<?php
$msgs = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = "1614286885:AAEhEJD7vXkExtI5o9Z2GkkT50KcOZRC94Y";
    $chat_id = "-567032433";
    if (!empty($_POST['name']) && !empty($_POST['phone']) && ((!empty($_POST['age']) && !empty($_POST['skills']) &&  !empty($_POST['edu'])) || (!empty($_POST['depart']) && !empty($_POST['destination'])))){
        $bot_url = "https://api.telegram.org/bot{$token}/";
        $documents = "Документы: " . "%0A";
        
        if (isset($_POST['name'])) {
          if (!empty($_POST['name'])){
            $name = "Имя пославшего: " . strip_tags($_POST['name']) . "%0A";
          }
        }
        if (isset($_POST['phone'])) {
          if (!empty($_POST['phone'])){
            $phone = "Телефон: " . strip_tags($_POST['phone']) . "%0A";
          }
        }
        if (isset($_POST['depart'])) {
          if (!empty($_POST['depart'])){
            $depart = "Место отправления: " . strip_tags($_POST['depart']) . "%0A";
          }
        }
        if (isset($_POST['destination'])) {
          if (!empty($_POST['destination'])){
            $destination = "Место назначения: " . strip_tags($_POST['destination']) . "%0A";
          }
        }
        if (isset($_POST['age'])) {
          if (!empty($_POST['age'])){
            $age = "Возраст: "  . strip_tags($_POST['age']) . "%0A";
          }
        }
        if (isset($_POST['edu'])) {
          if (!empty($_POST['edu'])){
            $edu = "Образование: " . strip_tags($_POST['edu']) . "%0A";
          }
        }
        if (isset($_POST['skills'])) {
          if (!empty($_POST['skills'])){
            $skills = "Проф. умения: " . strip_tags($_POST['skills']) . "%0A";
          }
        }
        if (isset($_POST['bio'])) {
          if (!empty($_POST['bio'])){
            $documents = $documents . "Биометрический паспорт" . "%0A";
          }
        }
        if (isset($_POST['visa'])) {
          if (!empty($_POST['visa'])){
            $documents = $documents . "Виза" . "%0A";
          }
        }
        if (isset($_POST['licence'])) {
          if (!empty($_POST['licence'])){
            $documents = $documents . "Водительское удостоверение" . "%0A";
          }
        }
        if (isset($_POST['living'])) {
          if (!empty($_POST['living'])){
            $documents = $documents . "Вид на жительство" . "%0A";
          }
        }
        if (isset($_POST['passport'])) {
          if (!empty($_POST['passport'])){
            $documents = $documents . "Паспорт ЕС" . "%0A";
        }
      }
        if (isset($_POST['bio2'])) {
          if (!empty($_POST['bio2'])){
            $documents = $documents . "Биометрический паспорт" . "%0A";
          }
        }
        if (isset($_POST['visa2'])) {
          if (!empty($_POST['visa2'])){
            $documents = $documents . "Виза" . "%0A";
          }
        }
        if (isset($_POST['licence2'])) {
          if (!empty($_POST['licence2'])){
            $documents = $documents . "Водительское удостоверение" . "%0A";
          }
        }
        if (isset($_POST['living2'])) {
          if (!empty($_POST['living2'])){
            $documents = $documents . "Вид на жительство" . "%0A";
          }
        }
        if (isset($_POST['passport2'])) {
          if (!empty($_POST['passport2'])){
            $documents = $documents . "Паспорт ЕС" . "%0A";
        }
      }
        if (isset($_POST['theme'])) {
          if (!empty($_POST['theme'])){
            $theme = "Тема: " . strip_tags($_POST['theme']). "%0A";
          }
        }
        // Формируем текст сообщения
        $txt =  $theme . $name . $phone . $age . $depart . $destination . $edu . $skills . $documents;
        $sendTextToTelegram = file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}");
        if ($output && $sendTextToTelegram) {
            $msgs['okSend'] = 'Спасибо за отправку вашего сообщения!';
            echo json_encode($msgs);
        } elseif ($sendTextToTelegram) {
            $msgs['okSend'] = 'Спасибо за отправку вашего сообщения!';
            echo json_encode($msgs);
          return true;
        } else {
            $msgs['err'] = 'Ошибка. Сообщение не отправлено!';
            echo json_encode($msgs);
            die('Ошибка. Сообщение не отправлено!');
        }
    } else {
        $msgs['err'] = 'Ошибка. Вы заполнили не все обязательные поля!';
        echo json_encode($msgs);;
    }
} else {
  header ("Location: /");
}
?>