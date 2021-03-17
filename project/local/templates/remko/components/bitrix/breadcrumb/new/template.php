<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

if(empty($arResult))
	return "";

$strReturn = '<div class="navi"><div class="wrap">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '<a href="'.$arResult[$index]["LINK"].'">'.$title.'</a>	<span>/</span> ';
	}
	else
	{
		$strReturn .= $title;
	}
}

$strReturn .= '</div></div>';

return $strReturn;
