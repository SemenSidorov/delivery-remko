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

<ul class="menu">
  <li><a href="/catalog/?all=1"><img src="<?=SITE_TEMPLATE_PATH?>/img/menu1.png"><img src="<?=SITE_TEMPLATE_PATH?>/img/menu1h.png">Все</a></li>
  <?foreach ($arResult["SECTIONS"] as $section) {?>
  <li><a href="<?=$section["SECTION_PAGE_URL"]?>"><img src="<?=$section["PICTURE"]["SRC"]?>"><img src="<?=$section["DETAIL_PICTURE"]["SRC"]?>"><?=$section["NAME"]?></a></li>
  <?}?>
</ul>
