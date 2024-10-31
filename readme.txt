=== MZSlugs Translator ===
Contributors: Adam Cai
Tags: SEO Slugs, Clean SEO Slugs, Chinese to English or Pinyin Slugs
Requires at least: 2.5
Tested up to: 3.4
Stable tag: 1.1.2
License: GPLv2 or later

由于Google已经逐步淘汰免费的翻译API，本插件在Google API不支持时，自动将中文标题转换成拼音Slugs。

== Description ==

由于Google已经逐步淘汰免费的翻译API，本插件在Google API不支持时，自动将中文标题转换成拼音Slugs。此外还有去除英文搜索禁用词的功能。

This plug-in will translate chinese post title to english slugs using Google translate API, if failed, then convert it to Chinese PinYin.
(note that Google will be shut off completely on 12/1/2011, http://code.google.com/intl/zh/apis/language/translate/v1/getting_started.html). 
And it also works with english title, in which the common words will be removed from slugs.

 
== Installation ==

1. 上传'mz-slugs-translator'到'/wp-content/plugins/'。 
2. 在wordpress插件页面激活插件。
3. 修改固定链接，例如:把固定链接改为"/%year%/%postname%/"格式 (具体操作请参考：http://codex.wordpress.org/Using_Permalinks)。当你添加文章或者帖子时，本插件会自动把你的标题转换成英文或者拼音。注意：如果你要编辑文章，已经存在的slug不会被修改，这时你只有通过手工修改。

== Changelog ==

= 1.1.0 =
* New Plugin.
= 1.1.1 =
* Fixed encoding of readme.txt
= 1.1.2 =
* Removed google pinyin api part, since it's no long supported
== Frequently Asked Questions ==

请访问 http://blog.61dh.com/mzslugs-translator/

