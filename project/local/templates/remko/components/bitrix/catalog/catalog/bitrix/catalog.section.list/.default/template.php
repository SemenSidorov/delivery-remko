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
	<div class="menu-page">
		<div class="block-name">
			<span>Наша продукция</span>
		</div>
		<div class="flex2">

			<div class="item">
				<div class="icon">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/menu-image1.png">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/menu-image1h.png">
				</div>
				<div class="link">
					<p>Все</p>
				</div>
				<a href="#"></a>
			</div>

			<?foreach ($arResult["SECTIONS"] as $section) {?>

			<div class="item">
				<div class="icon">
					<img src="<?=$section["PICTURE"]["SRC"]?>">
					<img src="<?=$section["DETAIL_PICTURE"]["SRC"]?>">
				</div>
				<div class="link">
					<p><?=$section["NAME"]?></p>
				</div>
				<a href="<?=$section["SECTION_PAGE_URL"]?>"></a>
			</div>

			<?}?>
		</div>
	</div>
</div>
