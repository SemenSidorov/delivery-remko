<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |	Attention!
 * |	The following comments are for system use
 * |	and are required for the component to work correctly in ajax mode:
 * |	<!-- items-container -->
 * |	<!-- pagination-container -->
 * |	<!-- component-end -->
 */

$this->setFrameMode(true);
$this->addExternalCss('/bitrix/css/main/bootstrap.css');
?>

<div class="index-catalog">
	<div class="wrap">
		<div class="block-name">
			<span>Наша продукция</span>
		</div>
		<div class="tabs">
			<ul class="tabNavigation">
				<li><a href="#t1"><img src="<?=SITE_TEMPLATE_PATH?>/img/menu1.png"><img src="<?=SITE_TEMPLATE_PATH?>/img/menu1h.png">Все</a></li>
				<?foreach ($arResult["SECTIONS"] as $section) {?>
				<li><a href="#t<?=$section["ID"]?>"><img src="<?=$section["PICTURE"]["SRC"]?>"><img src="<?=$section["DETAIL_PICTURE"]["SRC"]?>"><?=$section["NAME"]?></a></li>
				<?}?>
			</ul>
			<div id="t1">
				<div class="flex">

					<?foreach ($arResult["ITEMS"] as $item) {?>

					<div class="product-item">
						<a href="<?=$item["DETAIL_PAGE_URL"]?>" class="link"></a>
						<div class="badges">
							<?if(isset($item["PROPERTIES"]["NEW"]["VALUE"]) && !empty($item["PROPERTIES"]["NEW"]["VALUE"]) && $item["PROPERTIES"]["NEW"]["VALUE"] == "Y"){?>
							<span class="color1">Новинка</span> <br/>
							<?}?>
							<?if(isset($item["PROPERTIES"]["HIT"]["VALUE"]) && !empty($item["PROPERTIES"]["HIT"]["VALUE"]) && $item["PROPERTIES"]["HIT"]["VALUE"] == "Y"){?>
							<span class="color2">Хит</span>
							<?}?>
						</div>
						<div class="image">
							<img src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>">
						</div>
						<div class="name"><?=$item["NAME"]?></div>
						<p><?=$item["PROPERTIES"]["COMPOSITION"]["VALUE"]?></p>
						<div class="price"><?=number_format($item["PROPERTIES"]["PRICE"]["VALUE"], 2, ',', ' ')?> ₽</div>
						<a class="tocart" data-id="<?=$item["ID"]?>"><span></span> В корзину</a>
					</div>

					<?}?>

				</div>
				<div class="bottom-button">
					<a href="/catalog/?all=1">Смотреть все меню</a>
				</div>
			</div>
			<?foreach ($arResult["SECTIONS_ITEMS"] as $key => $value) {?>
			<div id="t<?=$key?>">
				<div class="flex">

				<?foreach ($value as $item) {?>

				<div class="product-item">
					<a href="<?=$item["DETAIL_PAGE_URL"]?>" class="link"></a>
					<div class="badges">
						<?if(isset($item["PROPERTIES"]["NEW"]["VALUE"]) && !empty($item["PROPERTIES"]["NEW"]["VALUE"]) && $item["PROPERTIES"]["NEW"]["VALUE"] == "Y"){?>
						<span class="color1">Новинка</span> <br/>
						<?}?>
						<?if(isset($item["PROPERTIES"]["HIT"]["VALUE"]) && !empty($item["PROPERTIES"]["HIT"]["VALUE"]) && $item["PROPERTIES"]["HIT"]["VALUE"] == "Y"){?>
						<span class="color2">Хит</span>
						<?}?>
					</div>
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
				<div class="bottom-button">
					<a href="/catalog/<?=$arResult["SECTIONS"][$key]["CODE"]?>/">Смотреть все <?=$arResult["SECTIONS"][$key]["NAME"]?></a>
				</div>
			</div>
			<?}?>
		</div>
	</div>
</div>
