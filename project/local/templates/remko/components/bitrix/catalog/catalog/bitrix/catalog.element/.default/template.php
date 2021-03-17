<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="wrap">
	<div class="item-page">
		<div class="block-name">
			<span>Наша продукция</span>
		</div>
    <?$APPLICATION->IncludeComponent(
    	"bitrix:catalog.section.list",
    	"catalog",
    	Array(
    		"ADD_SECTIONS_CHAIN" => "N",
    		"CACHE_FILTER" => "N",
    		"CACHE_GROUPS" => "Y",
    		"CACHE_TIME" => "36000000",
    		"CACHE_TYPE" => "A",
    		"COUNT_ELEMENTS" => "N",
    		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
    		"FILTER_NAME" => "sectionsFilter",
    		"IBLOCK_ID" => "5",
    		"IBLOCK_TYPE" => "catalog",
    		"SECTION_CODE" => "",
    		"SECTION_FIELDS" => array("",""),
    		"SECTION_ID" => "",
    		"SECTION_URL" => "",
    		"SECTION_USER_FIELDS" => array("",""),
    		"SHOW_PARENT_NAME" => "Y",
    		"TOP_DEPTH" => "2",
    		"VIEW_MODE" => "LINE"
    	)
    );?>
		<div class="item-name"><?=$arResult["NAME"]?></div>
		<div class="flex">
			<div class="photo">
				<div><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"></div>
			</div>
			<div class="info">
				<p><?=$arResult["PROPERTIES"]["COMPOSITION"]["VALUE"]?></p>
				<div class="params">
					<div class="name">
						Параметры
					</div>
          <?foreach ($arResult["PROPERTIES"]["PARAMS"]["VALUE"] as $key => $value) {?>
					<div class="item">
						<div><?=$arResult["PROPERTIES"]["PARAMS"]["DESCRIPTION"][$key]?></div><div><?=$value?></div>
					</div>
          <?}?>
				</div>
        <div class="price"><?=number_format($arResult["PROPERTIES"]["PRICE"]["VALUE"], 2, ',', ' ')?> ₽</div>
				<input data-id="<?=$arResult["ID"]?>" class="tocart" type="button" value="Добавить в корзину">
				<div class="number">
					<span class="minus"></span>
					<input class="quantity-input" data-id="<?=$arResult["ID"]?>" type="text" value="1"/>
					<span class="plus"></span>
				</div>
			</div>
		</div>
		<div class="text">
			<div class="name">
				<span>Описание</span>
			</div>
			<p><?=$arResult["DETAIL_TEXT"]?></p>
		</div>
		<div class="block-name">
			<span>Похожие блюда</span>
		</div>

    <?$GLOBALS['arrFilter'] = ["IBLOCK_SECTION_ID" => $arResult["IBLOCK_SECTION_ID"], "!ID" => $arResult["ID"]];?>
    <?$APPLICATION->IncludeComponent(
    	"bitrix:catalog.section",
    	"catalog",
    	array(
    		"ACTION_VARIABLE" => "action",
    		"ADD_PICT_PROP" => "-",
    		"ADD_PROPERTIES_TO_BASKET" => "N",
    		"ADD_SECTIONS_CHAIN" => "N",
    		"AJAX_MODE" => "N",
    		"AJAX_OPTION_ADDITIONAL" => "",
    		"AJAX_OPTION_HISTORY" => "N",
    		"AJAX_OPTION_JUMP" => "N",
    		"AJAX_OPTION_STYLE" => "Y",
    		"BACKGROUND_IMAGE" => "-",
    		"BASKET_URL" => "",
    		"BROWSER_TITLE" => "-",
    		"CACHE_FILTER" => "N",
    		"CACHE_GROUPS" => "Y",
    		"CACHE_TIME" => "36000000",
    		"CACHE_TYPE" => "A",
    		"COMPATIBLE_MODE" => "Y",
    		"DETAIL_URL" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
    		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
    		"DISPLAY_BOTTOM_PAGER" => "N",
    		"DISPLAY_COMPARE" => "N",
    		"DISPLAY_TOP_PAGER" => "N",
    		"ELEMENT_SORT_FIELD" => "sort",
    		"ELEMENT_SORT_FIELD2" => "id",
    		"ELEMENT_SORT_ORDER" => "asc",
    		"ELEMENT_SORT_ORDER2" => "desc",
    		"ENLARGE_PRODUCT" => "STRICT",
    		"FILTER_NAME" => "arrFilter",
    		"IBLOCK_ID" => "5",
    		"IBLOCK_TYPE" => "catalog",
    		"INCLUDE_SUBSECTIONS" => "Y",
    		"LABEL_PROP" => array(
    		),
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
    		"PAGER_TEMPLATE" => ".default",
    		"PAGER_TITLE" => "Товары",
    		"PAGE_ELEMENT_COUNT" => "18",
    		"PARTIAL_PRODUCT_PROPERTIES" => "N",
    		"PRICE_CODE" => array(
    		),
    		"PRICE_VAT_INCLUDE" => "N",
    		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
    		"PRODUCT_ID_VARIABLE" => "id",
    		"PRODUCT_PROPS_VARIABLE" => "prop",
    		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
    		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
    		"PROPERTY_CODE_MOBILE" => array(
    			0 => "PRICE",
    			1 => "PARAMS",
    			2 => "HIT",
    			3 => "NEW",
    			4 => "MAIN",
    		),
    		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
    		"RCM_TYPE" => "personal",
    		"SECTION_CODE" => "",
    		"SECTION_CODE_PATH" => $_REQUEST["SECTION_CODE_PATH"],
    		"SECTION_ID" => "",
    		"SECTION_ID_VARIABLE" => "SECTION_CODE",
    		"SECTION_URL" => "",
    		"SECTION_USER_FIELDS" => array(
    			0 => "",
    			1 => "",
    		),
    		"SEF_MODE" => "Y",
    		"SEF_RULE" => "#SECTION_CODE_PATH#",
    		"SET_BROWSER_TITLE" => "N",
    		"SET_LAST_MODIFIED" => "N",
    		"SET_META_DESCRIPTION" => "N",
    		"SET_META_KEYWORDS" => "N",
    		"SET_STATUS_404" => "N",
    		"SET_TITLE" => "N",
    		"SHOW_404" => "N",
    		"SHOW_ALL_WO_SECTION" => "N",
    		"SHOW_FROM_SECTION" => "N",
    		"SHOW_PRICE_COUNT" => "1",
    		"SHOW_SLIDER" => "N",
    		"SLIDER_INTERVAL" => "3000",
    		"SLIDER_PROGRESS" => "N",
    		"TEMPLATE_THEME" => "blue",
    		"USE_ENHANCED_ECOMMERCE" => "N",
    		"USE_MAIN_ELEMENT_SECTION" => "N",
    		"USE_PRICE_COUNT" => "N",
    		"USE_PRODUCT_QUANTITY" => "N",
    		"COMPONENT_TEMPLATE" => "main"
    	),
    	false
    );?>
    <?unset($GLOBALS['arrFilter']);?>
	</div>
</div>
