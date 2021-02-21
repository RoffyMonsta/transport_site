<?php
$msgs = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "comfy_trans";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    
    $token = "1614286885:AAEhEJD7vXkExtI5o9Z2GkkT50KcOZRC94Y";
    $chat_id = "-567032433";
    
    $msg_ok ="";
    $msg_err="";
    $msg_field="";
    $sqlbio="No";
    $sqllicence="No";
    $sqlliving="No";
    $sqlpassport="No";
    $sqlvisa="No";
    if (isset($_POST['lang'])) {
      if (!empty($_POST['lang'])){
        $serv_lang = strip_tags($_POST['lang']);
      }
    }
    if($serv_lang == 'ua'){
      $msg_ok="Дякуємо за Ваше повідомлення!";
      $msg_err="Помилка. Повідомлення не надіслано! ";
      $msg_field="Помилка. Ви заповнили не всі обов’язкові поля!";
    }
    if($serv_lang == 'en'){
      $msg_ok="Thanks for sending your message!";
      $msg_err=" Mistake. Message not sent! ";
      $msg_field="Mistake. You did not fill in all required fields!";
    }
    if($serv_lang == 'ru'){
      $msg_ok="Спасибо за отправку вашего сообщения!";
      $msg_err=" Ошибка. Сообщение не отправлено! ";
      $msg_field="Ошибка. Вы заполнили не все обязательные поля!";
    }
    if($serv_lang == 'pl'){
      $msg_ok="Dziękujemy za przesłanie wiadomości!";
      $msg_err=" Błąd. Wiadomość nie została wysłana! ";
      $msg_field="Błąd. Nie wypełniłeś wszystkich wymaganych pól!";
    }
    if (!empty($_POST['name']) && !empty($_POST['phone']) && ((!empty($_POST['age']) && !empty($_POST['skills']) &&  !empty($_POST['edu'])) || (!empty($_POST['depart']) && !empty($_POST['destination'])))){
        $bot_url = "https://api.telegram.org/bot{$token}/";
        $documents = "Документы: " . "%0A";
        
        if (isset($_POST['name'])) {
          if (!empty($_POST['name'])){
            $sqlname = strip_tags($_POST['name']);
            $name = "Имя пославшего: " . strip_tags($_POST['name']) . "%0A";
            
          }
        }
        if (isset($_POST['phone'])) {
          if (!empty($_POST['phone'])){
            $sqlphone = strip_tags($_POST['phone']);
            $phone = "Телефон: " . strip_tags($_POST['phone']) . "%0A";
          }
        }
        if (isset($_POST['depart'])) {
          if (!empty($_POST['depart'])){
            $sqldepart =  strip_tags($_POST['depart']);
            $depart = "Место отправления: " . strip_tags($_POST['depart']) . "%0A";
          }
        }
        if (isset($_POST['destination'])) {
          if (!empty($_POST['destination'])){
            $sqldestination = strip_tags($_POST['destination']);
            $destination = "Место назначения: " . strip_tags($_POST['destination']) . "%0A";
          }
        }
        if (isset($_POST['age'])) {
          if (!empty($_POST['age'])){
            $sqlage = strip_tags($_POST['age']);
            $age = "Возраст: "  . strip_tags($_POST['age']) . "%0A";
          }
        }
        if (isset($_POST['edu'])) {
          if (!empty($_POST['edu'])){
            $sqledu = strip_tags($_POST['edu']);
            $edu = "Образование: " . strip_tags($_POST['edu']) . "%0A";
          }
        }
        if (isset($_POST['skills'])) {
          if (!empty($_POST['skills'])){
            $sqlskills = strip_tags($_POST['skills']);
            $skills = "Проф. умения: " . strip_tags($_POST['skills']) . "%0A";
          }
        }
        if (isset($_POST['bio'])) {
          if (!empty($_POST['bio'])){
            $sqlbio = "Yes";
            $documents = $documents . "Биометрический паспорт" . "%0A";
          }
        }
        if (isset($_POST['visa'])) {
          if (!empty($_POST['visa'])){
            $sqlvisa = "Yes";
            $documents = $documents . "Виза" . "%0A";
          }
        }
        if (isset($_POST['licence'])) {
          if (!empty($_POST['licence'])){
            $sqllicence = "Yes";
            $documents = $documents . "Водительское удостоверение" . "%0A";
          }
        }
        if (isset($_POST['living'])) {
          if (!empty($_POST['living'])){
            $sqlliving = "Yes";
            $documents = $documents . "Вид на жительство" . "%0A";
          }
        }
        if (isset($_POST['passport'])) {
          if (!empty($_POST['passport'])){
            $sqlpassport = "Yes";
            $documents = $documents . "Паспорт ЕС" . "%0A";
        }
      }
        if (isset($_POST['bio2'])) {
          if (!empty($_POST['bio2'])){
            $sqlbio = "Yes";
            $documents = $documents . "Биометрический паспорт" . "%0A";
          }
        }
        if (isset($_POST['visa2'])) {
          if (!empty($_POST['visa2'])){
            $sqlvisa = "Yes";
            $documents = $documents . "Виза" . "%0A";
          }
        }
        if (isset($_POST['licence2'])) {
          if (!empty($_POST['licence2'])){
            $sqllicence = "Yes";
            $documents = $documents . "Водительское удостоверение" . "%0A";
          }
        }
        if (isset($_POST['living2'])) {
          if (!empty($_POST['living2'])){
            $sqlliving = "Yes";
            $documents = $documents . "Вид на жительство" . "%0A";
          }
        }
        if (isset($_POST['passport2'])) {
          if (!empty($_POST['passport2'])){
            $sqlpassport = "Yes";
            $documents = $documents . "Паспорт ЕС" . "%0A";
        }
      }
      
        if (isset($_POST['theme'])) {
          if (!empty($_POST['theme'])){
            $sqltheme = strip_tags($_POST['theme']);
            $theme = "Тема: " . strip_tags($_POST['theme']) . "%0A";
          }
        }
        // Формируем текст сообщения
        $txt =  $theme . $name . $phone . $age . $depart . $destination . $edu . $skills . $documents;
        $sendTextToTelegram = file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}");

        if ($output && $sendTextToTelegram) {
            $msgs['okSend'] = $msg_ok;
            echo json_encode($msgs);
        } elseif ($sendTextToTelegram) {
          if($sqltheme == "Працевлаштування"){
            $work_query = "INSERT into clients(name, phone, age, education, skills, biopassport, visa, drivinglicence, vnj, espassport, theme) VALUES ('$sqlname', '$sqlphone', $sqlage, '$sqledu', '$sqlskills', '$sqlbio', '$sqlvisa', '$sqllicence', '$sqlliving', '$sqlpassport', '$sqltheme')";
            if ($conn->query($work_query) === TRUE) {
             
            } else {
              echo "Error: " . $work_query . "<br>" . $conn->error;
            }
         }
         elseif($sqltheme == "Перевезення"){
           $transport_query = "INSERT into clients(name, phone, departure, destination, biopassport, visa, drivinglicence, vnj, espassport, theme) VALUES ('$sqlname', '$sqlphone',  '$sqldepart', '$sqldestination', '$sqlbio', '$sqlvisa', '$sqllicence', '$sqlliving', '$sqlpassport', '$sqltheme')";
           if ($conn->query($transport_query) === TRUE) {
            
          } else {
            echo "Error: " . $transport_query . "<br>" . $conn->error;
          }
         }
            $msgs['okSend'] = $msg_ok;
            echo json_encode($msgs);
           
          return true;
        } else {
            $msgs['err'] = $msg_err;
            echo json_encode($msgs);
            die($msg_err);
        }
    } else {
        $msgs['err'] = $msg_field;
        echo json_encode($msgs);;
    }
    $conn->close();
} 
else {
  header ("Location: /");
}
?>
