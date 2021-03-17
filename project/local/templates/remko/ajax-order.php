<?
  $result = '';

  $test = $_POST["test"] ? $_POST["test"] : '';
  if($test !== ''){
    echo "success";
    die;
  }

  $name = $_POST["name"] ? $_POST["name"] : '';
  $phone = $_POST["phone"] ? $_POST["phone"] : '';
  $message = $_POST["message"] ? $_POST["message"] : '';
  $data_arr = $_POST["data_arr"] ? $_POST["data_arr"] : '';
  $address = $_POST["address"] ? $_POST["address"] : '';
  $time = $_POST["time"] ? $_POST["time"] : '';

  $flag = true;

  if($name === ''){
    $result .= 'Ошибка! Не заполнено обязательное поле "Ваше имя"!';
    $flag = false;
  }
  if($phone === ''){
    $result .= 'Ошибка! Не заполнено обязательное поле "Ваш телефон"!';
    $flag = false;
  }
  if($data_arr === ''){
    $result .= 'Произошел как-то сбой! Попробуйте еще раз!';
    $flag = false;
  }

  if(!$flag) die;

  $data_arr = str_replace('<br>', "\n", $data_arr);

  require_once ($_SERVER['DOCUMENT_ROOT'].'/include/phpmailer/PHPMailerAutoload.php');

  $output = "Имя пользователя: " . $name . "\n";
  $output .= "Телефон или email: " . $phone . "\n";
  $output .= "Адрес: " . $address . "\n";
  $output .= "Желаемое время доставки: " . $time . "\n";
  $output .= "Сообщение: " . $message . "\n";
  $output .= "Заказ: \n";
  $output .= $data_arr . "\n";

  $mail = new PHPMailer;

  $mail->CharSet = 'UTF-8';
  $mail->From      = 'info@delivery-rem.brevis.pro';
  $mail->FromName  = 'test';
  $mail->Subject   = 'Новый заказ';
  $mail->Body      = $output;

  $mail->AddAddress( 'lol.testmail.kek@mail.ru' );

  if ($mail->Send()) {
    require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include.php");
    global $USER;
    if($USER->IsAuthorized()){
      $user_id = $USER->GetID();
      $USER->Update($user_id, ["UF_BASKET" => '']);
      echo "success";
    }else{
      echo "set";
    }
  } else {
    echo "Произошел как-то сбой! Попробуйте еще раз!";
  }
?>
