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
<div class="more-items">
  <?foreach ($arResult["ITEMS"] as $item) {?>
  <div class="product-item">
    <a href="<?=$item["DETAIL_PAGE_URL"]?>" class="link"></a>
    <div class="image">
      <img src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>">
    </div>
    <div class="name"><?=$item["NAME"]?></div>
    <p><?=$item["PROPERTIES"]["COMPOSITION"]["VALUE"]?></p>
    <div class="price"><?=number_format($item["PROPERTIES"]["PRICE"]["VALUE"], 2, ',', ' ')?> ₽</div>
    <a data-id="<?=$item["ID"]?>" class="tocart"><span></span> В корзину</a>
  </div>
  <?}?>
</div>
