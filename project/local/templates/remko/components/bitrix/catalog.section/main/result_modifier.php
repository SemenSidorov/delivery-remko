<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

foreach ($arResult["ITEMS"] as $item) {
  $arResult["SECTIONS_ITEMS"][$item["IBLOCK_SECTION_ID"]][] = $item;
}

$arResult["SECTIONS"] = [];
foreach ($arResult["SECTIONS_ITEMS"] as $key => $value) {
  $res = CIBlockSection::GetList([], ["ID" => $key, "IBLOCK_ID" => 5], false, [], false);
  if($res = $res->GetNext()){
    $res["PICTURE"] = CFile::GetFileArray($res["PICTURE"]);
    $res["DETAIL_PICTURE"] = CFile::GetFileArray($res["DETAIL_PICTURE"]);
    $arResult["SECTIONS"][$res["ID"]] = $res;
  }
}
