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
<?$cookie = json_decode($_COOKIE["UF_QUANTITY"], 1);?>
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
				<div class="number">
					<span class="minus"></span>
					<input class="quantity-input" data-id="<?=$item["ID"]?>" data-name="<?=$item["NAME"]?>" type="text" value="<?=$cookie["id".$item["ID"]] ? $cookie["id".$item["ID"]] : 1;?>"/>
					<span class="plus"></span>
				</div>
  			<a data-id="<?=$item["ID"]?>" class="remove-cart"><span></span>X</a>
  		</div>

		<?}?>

		</div>
