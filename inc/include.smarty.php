<?
/*******************************************
'�ļ�����include.smarty.php
'��Ҫ���ܣ�Smarty�����ļ�
'˵����
'*******************************************/
	$group_root=".";
	include_once( $group_root."/smarty/Smarty.class.php" );
	$smarty = new Smarty;
	$smarty->template_dir = '..\tpl';
	$smarty->compile_dir = $group_root."/smarty/templates_c";
	$smarty->cache_dir = $group_root."/smarty/cache";

	$smarty->left_delimiter = "{|";
	$smarty->right_delimiter = "|}";
	$smarty->compile_check = true;
	$smarty->debugging = false;
	$smarty->force_compile = true;
	$smarty->caching = 2;
	$smarty->cache_lifetime = 0;
?>
