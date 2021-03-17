<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<nav class="top-menu">
	<a class="close"><i class="fa fa-close"></i></a>
	<div class="wrap">
		<ul>
<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
		continue;
?>
		<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>

<?endforeach?>

		</ul>
	</div>
</nav>
<?endif?>
