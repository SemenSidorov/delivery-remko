<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");

global $USER;

if($USER->IsAuthorized()){
  $data = CUser::GetList(($by="ID"), ($order="ASC"), array('ID' => $USER->GetID()), array("SELECT" => array("UF_BASKET")));
  $data = $data->Fetch();
  $GLOBALS["arrFilter"] = ["ID" => json_decode($data["UF_BASKET"], 1)];
}else{
  $GLOBALS["arrFilter"] = ["ID" => json_decode($_COOKIE["UF_BASKET"], 1)];
}
?>

<div class="basket-catalog">
	<div class="wrap">
		<div class="block-name">
			<span>Корзина</span>
		</div>
<?if($GLOBALS["arrFilter"]["ID"]){?>
  <?$APPLICATION->IncludeComponent(
  	"bitrix:catalog.section",
  	"basket",
  	Array(
  		"ACTION_VARIABLE" => "action",
  		"ADD_PICT_PROP" => "-",
  		"ADD_PROPERTIES_TO_BASKET" => "Y",
  		"ADD_SECTIONS_CHAIN" => "N",
  		"ADD_TO_BASKET_ACTION" => "ADD",
  		"AJAX_MODE" => "N",
  		"AJAX_OPTION_ADDITIONAL" => "",
  		"AJAX_OPTION_HISTORY" => "N",
  		"AJAX_OPTION_JUMP" => "N",
  		"AJAX_OPTION_STYLE" => "Y",
  		"BACKGROUND_IMAGE" => "-",
  		"BASKET_URL" => "/personal/basket.php",
  		"BROWSER_TITLE" => "-",
  		"CACHE_FILTER" => "N",
  		"CACHE_GROUPS" => "Y",
  		"CACHE_TIME" => "36000000",
  		"CACHE_TYPE" => "N",
  		"COMPATIBLE_MODE" => "Y",
  		"CONVERT_CURRENCY" => "N",
  		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
			"DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
			"BY_LINK" => "Y",
  		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
  		"DISPLAY_BOTTOM_PAGER" => "Y",
  		"DISPLAY_COMPARE" => "N",
  		"DISPLAY_TOP_PAGER" => "N",
  		"ELEMENT_SORT_FIELD" => "sort",
  		"ELEMENT_SORT_FIELD2" => "id",
  		"ELEMENT_SORT_ORDER" => "asc",
  		"ELEMENT_SORT_ORDER2" => "desc",
  		"ENLARGE_PRODUCT" => "STRICT",
  		"FILTER_NAME" => "arrFilter",
  		"HIDE_NOT_AVAILABLE" => "N",
  		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
  		"IBLOCK_ID" => "5",
  		"IBLOCK_TYPE" => "catalog",
  		"INCLUDE_SUBSECTIONS" => "Y",
  		"LABEL_PROP" => array(),
  		"LAZY_LOAD" => "N",
  		"LINE_ELEMENT_COUNT" => "3",
  		"LOAD_ON_SCROLL" => "N",
  		"MESSAGE_404" => "",
  		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
  		"MESS_BTN_BUY" => "Купить",
  		"MESS_BTN_DETAIL" => "Подробнее",
  		"MESS_BTN_SUBSCRIBE" => "Подписаться",
  		"MESS_NOT_AVAILABLE" => "Нет в наличии",
  		"META_DESCRIPTION" => "-",
  		"META_KEYWORDS" => "-",
  		"OFFERS_LIMIT" => "5",
  		"PAGER_BASE_LINK_ENABLE" => "N",
  		"PAGER_DESC_NUMBERING" => "N",
  		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
  		"PAGER_SHOW_ALL" => "N",
  		"PAGER_SHOW_ALWAYS" => "N",
  		"PAGER_TEMPLATE" => "new",
  		"PAGER_TITLE" => "Товары",
  		"PAGE_ELEMENT_COUNT" => "18",
  		"PARTIAL_PRODUCT_PROPERTIES" => "N",
  		"PRICE_CODE" => array("RUB"),
  		"PRICE_VAT_INCLUDE" => "Y",
  		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
  		"PRODUCT_ID_VARIABLE" => "id",
  		"PRODUCT_PROPS_VARIABLE" => "prop",
  		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
  		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
  		"PRODUCT_SUBSCRIPTION" => "Y",
  		"PROPERTY_CODE_MOBILE" => array(),
  		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
  		"RCM_TYPE" => "personal",
  		"SECTION_CODE" => "",
  		"SECTION_ID" => "",
  		"SECTION_ID_VARIABLE" => "SECTION_ID",
  		"SECTION_URL" => "",
  		"SECTION_USER_FIELDS" => array("", ""),
  		"SEF_MODE" => "Y",
  		"SET_BROWSER_TITLE" => "N",
  		"SET_LAST_MODIFIED" => "N",
  		"SET_META_DESCRIPTION" => "N",
  		"SET_META_KEYWORDS" => "N",
  		"SET_STATUS_404" => "N",
  		"SET_TITLE" => "N",
  		"SHOW_404" => "N",
  		"SHOW_ALL_WO_SECTION" => "N",
  		"SHOW_CLOSE_POPUP" => "N",
  		"SHOW_DISCOUNT_PERCENT" => "N",
  		"SHOW_FROM_SECTION" => "N",
  		"SHOW_MAX_QUANTITY" => "N",
  		"SHOW_OLD_PRICE" => "N",
  		"SHOW_PRICE_COUNT" => "1",
  		"SHOW_SLIDER" => "Y",
  		"SLIDER_INTERVAL" => "3000",
  		"SLIDER_PROGRESS" => "N",
  		"TEMPLATE_THEME" => "blue",
  		"USE_ENHANCED_ECOMMERCE" => "N",
  		"USE_MAIN_ELEMENT_SECTION" => "N",
  		"USE_PRICE_COUNT" => "N",
  		"USE_PRODUCT_QUANTITY" => "N"
  	)
  );?>
<?}else{?>
  <h3>Ваша корзина пуста!</h3>
<?}?>
    <div class="order-form">
      <form id="basket_form">
        <div class="col">
          <input class="name-basket-form" type="text" placeholder="Ваше имя*">
          <input class="test-input-form test-basket-form" type="text">
          <input class="phone-basket-form" type="text" placeholder="Ваш телефон/E-mail*">
          <input class="address-basket-form" type="text" placeholder="Ваш адрес">
          <input class="time-basket-form" type="text" placeholder="Желаемое время доставки">
          <textarea class="message-basket-form" placeholder="Ваше сообщение"></textarea>
        </div>
        <div class="col last">
          <input type="submit" value="Отправить">
        </div>
      </form>
    </div>
  </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
