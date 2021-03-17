<?require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include.php");
global $USER;

if($_POST["id_basket"]){
  if($_POST["method"] == 'add'){
    if($USER->IsAuthorized()){
      $user_id = $USER->GetID();
      $data = CUser::GetList(($by="ID"), ($order="ASC"), array('ID' => $user_id), array("SELECT" => array("UF_BASKET")));
      $data = $data->Fetch();
      $data = json_decode($data["UF_BASKET"], 1);
      $data[] = $_POST["id_basket"];
      $arFields = array(
          'UF_BASKET' => json_encode(array_unique($data))
      );

      $USER->Update($user_id, $arFields);

      echo "success";
    }else{
      $data = json_decode($_COOKIE["UF_BASKET"], 1);
      $data[] = $_POST["id_basket"];

      echo json_encode(["set" => array_unique($data)]);
    }
  }elseif($_POST["method"] == 'remove'){
    if($USER->IsAuthorized()){
      $user_id = $USER->GetID();
      $data = CUser::GetList(($by="ID"), ($order="ASC"), array('ID' => $user_id), array("SELECT" => array("UF_BASKET")));
      $data = $data->Fetch();
      $data = json_decode($data["UF_BASKET"], 1);
      $bool = false;
      foreach ($data as $key => $value) {
        if($_POST["id_basket"] == $value){
          unset($data[$key]);
          $bool = true;
        }
      }
      if($bool){
        $arFields = array(
            'UF_BASKET' => json_encode(array_unique($data))
        );
        $USER->Update($user_id, $arFields);
      }
      echo "success";

    }else{
      $data = json_decode($_COOKIE["UF_BASKET"], 1);
      $bool = false;
      foreach ($data as $key => $value) {
        if($_POST["id_basket"] == $value){
          unset($data[$key]);
          $bool = true;
        }
      }
      if($bool){
        echo json_encode(["set" => array_unique($data)]);
      }else{
        echo "success";
      }
    }
  }else{
    echo "error method: " . $_POST["method"];
  }
}else{
  echo "error POST: " . json_encode($_POST);
}
