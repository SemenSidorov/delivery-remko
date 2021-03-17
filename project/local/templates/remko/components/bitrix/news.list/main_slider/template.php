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
<div class="index-page-slider">
	<?foreach ($arResult["ITEMS"] as $item) {?>
	<div class="item" style="background: url('<?=$item['PREVIEW_PICTURE']['SRC']?>') center/cover;">
		<div class="wrap">
			<div class="name"><?=$item['NAME']?></div>
			<p><?=$item['PREVIEW_TEXT']?></p>
			<a href="<?=$item['PROPERTIES']['LINK']['VALUE']?>"><span></span> Подробнее</a>
		</div>
	</div>
	<?}?>
</div>
