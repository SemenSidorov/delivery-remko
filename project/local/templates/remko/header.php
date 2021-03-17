<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

  <?$APPLICATION->ShowHead();?>

  <title><?$APPLICATION->ShowTitle()?></title>

  <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/style.css", true);?>
  <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/slick.css", true);?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

  <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery-3.2.1.min.js');?>
  <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.cookie.js');?>
  <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/slick.min.js');?>
  <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/common.js');?>
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
</head>

<body id="top">
<?$APPLICATION->ShowPanel()?>

	<a href="#top" class="totop"></a>
	<div class="menubg"></div>
	<header class="header">
		<div class="wrap flex">
			<div class="logo">
				<a href="/"><img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png"></a>
			</div>
			<div class="hours">
				Пн.-Пт. с 08:00 до 17:00  Сб.-Вс. - выходной
			</div>
			<a href="tel:+78005501458" class="phone">8 (800) <span>550-14-58</span></a>
			<a href="/personal/basket/" class="header-cart">
        <span>
          <?if($USER->IsAuthorized()){
            $user_id = $USER->GetID();
            $data = CUser::GetList(($by="ID"), ($order="ASC"), array('ID' => $user_id), array("SELECT" => array("UF_BASKET")));
            $data = $data->Fetch();
            $data = json_decode($data["UF_BASKET"], 1);
            echo count($data);
          }else{
            $data = json_decode($_COOKIE["UF_BASKET"], 1);
            echo count($data);
          }?>
        </span>
			</a>
			<div class="social">
				<a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/social1.png"></a>
				<a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/img/social2.png"></a>
			</div>
			<div class="menu-button"><i class="fa fa-bars"></i></div>
		</div>
	</header>
	<?$APPLICATION->IncludeComponent(
		"bitrix:menu",
		"new",
		Array(
			"ALLOW_MULTI_SELECT" => "N",
			"CHILD_MENU_TYPE" => "left",
			"DELAY" => "N",
			"MAX_LEVEL" => "1",
			"MENU_CACHE_GET_VARS" => array(0=>"",),
			"MENU_CACHE_TIME" => "3600",
			"MENU_CACHE_TYPE" => "N",
			"MENU_CACHE_USE_GROUPS" => "Y",
			"ROOT_MENU_TYPE" => "top",
			"USE_EXT" => "N"
		)
	);?>
	<?if($APPLICATION->GetCurPage() !== '/'){?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:breadcrumb",
			"new",
			Array(
				"PATH" => "",
				"SITE_ID" => "s1",
				"START_FROM" => "0"
			)
		);?>
	<?}?>
