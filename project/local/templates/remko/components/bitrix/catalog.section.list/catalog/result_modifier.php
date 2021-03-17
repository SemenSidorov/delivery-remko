<?
foreach ($arResult["SECTIONS"] as $key => $section) {
	$arResult["SECTIONS"][$key]["DETAIL_PICTURE"] = CFile::GetFileArray($section["DETAIL_PICTURE"]);
}
