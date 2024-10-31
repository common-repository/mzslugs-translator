<?php
/*
 * Plugin Name: MZSlugs Translator
 * Plugin URI: http://blog.61dh.com/mzslugs-translator/
 * Description: 
 * Chinese:
 * 由于Google已经逐步淘汰免费的翻译API，本插件在Google API不支持时，自动将中文标题转换成拼音Slugs。此外还有去除英文搜索禁用词的功能。在V1.1.2里，我们彻底移除Google翻译部分，因为Google翻译API不再是免费的了。
 * English:
 * This plug-in will translate chinese post title to english slugs using Google translate API, if failed, then convert it to Chinese PinYin. (note that Google will be shut off completely on 12/1/2011, http://code.google.com/intl/zh/apis/language/translate/v1/getting_started.html). 
 * And it also works with english title, in which the common words will be removed from slugs.
 * Start from V1.1.2, we removed google pinyin api part, since it's no long supported
 * Version: 1.1.2
 * Author: adam c.
 * Author URI: http://www.mzsites.com
 * License: GPL
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

*/

require_once('lib/pinYin.php');
require_once('lib/removeCommonWords.php'); 


add_filter('name_save_pre', 'mzslugs_translator', 0);

function mz_tranlate($text){
	$ret = '';
	if(!preg_match("/^[\w\d\s.,-]*$/", $text)) { //if contain non english character, do translate. 
   	$ret = Pinyin($text);
	}
	else $ret = $text;
	
  $ret = removeCommonWords($ret);

	return $ret;
}

function mzslugs_translator($slug){
	global $wpdb;
	// 如果已经有slug直接跳过
	if ($slug) return $slug;

	$post_title  = strtolower(stripslashes($_POST['post_title']));

	$tran_title = mz_tranlate($post_title);
	$slug = $tran_title;
	if(function_exists("sanitize_title") ) {
		$slug = sanitize_title( $slug);
	}
	else{
		$slug = preg_replace("/\s+/", "-", trim(strtolower($slug)));
	}
	return $slug;
	
}

