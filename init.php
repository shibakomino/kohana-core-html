<?php

/**
* Converts text email addresses and anchors into links. Existing links
* will not be altered.
*
*     echo Text::auto_link($text);
*
* [!!] This method is not foolproof since it uses regex to parse HTML.
*
* @param   string $text text to auto link
* @return  string
* @uses    Text::auto_link_urls
* @uses    Text::auto_link_emails
*/
/*public static function auto_link($text)
{
// Auto link emails first to prevent problems with "www.domain.com@example.com"
return static::auto_link_urls(static::auto_link_emails($text));
}
*/
/**
* Converts text anchors into links. Existing links will not be altered.
*
*     echo Text::auto_link_urls($text);
*
* [!!] This method is not foolproof since it uses regex to parse HTML.
*
* @param   string $text text to auto link
* @return  string
* @uses    HTML::anchor
*/
/*public static function auto_link_urls($text)
{
// Find and replace all http/https/ftp/ftps links that are not part of an existing html anchor
$text = preg_replace_callback('~\b(?<!href="|">)(?:ht|f)tps?://[^<\s]+(?:/|\b)~i', 'static::_auto_link_urls_callback1', $text);

// Find and replace all naked www.links.com (without http://)
return preg_replace_callback('~\b(?<!://|">)www(?:\.[a-z0-9][-a-z0-9]*+)+\.[a-z]{2,6}[^<\s]*\b~i', 'static::_auto_link_urls_callback2', $text);
}

protected static function _auto_link_urls_callback1($matches)
{
return HTML::anchor($matches[0]);
}

protected static function _auto_link_urls_callback2($matches)
{
return HTML::anchor('http://' . $matches[0], $matches[0]);
}
*/
/**
* Converts text email addresses into links. Existing links will not
* be altered.
*
*     echo Text::auto_link_emails($text);
*
* [!!] This method is not foolproof since it uses regex to parse HTML.
*
* @param   string $text text to auto link
* @return  string
* @uses    HTML::mailto
*/
/*
public static function auto_link_emails($text)
{
// Find and replace all email addresses that are not part of an existing html mailto anchor
// Note: The "58;" negative lookbehind prevents matching of existing encoded html mailto anchors
//       The html entity for a colon (:) is &#58; or &#058; or &#0058; etc.
return preg_replace_callback('~\b(?<!href="mailto:|58;)(?!\.)[-+_a-z0-9.]++(?<!\.)@(?![-.])[-a-z0-9.]+(?<!\.)\.[a-z]{2,6}\b(?!</a>)~i', 'static::_auto_link_emails_callback', $text);
}

protected static function _auto_link_emails_callback($matches)
{
return HTML::mailto($matches[0]);
}
*/
/**
* Automatically applies "p" and "br" markup to text.
* Basically [nl2br](http://php.net/nl2br) on steroids.
*
*     echo Text::auto_p($text);
*
* [!!] This method is not foolproof since it uses regex to parse HTML.
*
* @param   string $str subject
* @param   boolean $br convert single linebreaks to <br />
* @return  string
*/
/*public static function auto_p($str, $br = true)
{
// Trim whitespace
if (($str = trim($str)) === '')
return '';

// Standardize newlines
$str = str_replace(array("\r\n", "\r"), "\n", $str);

// Trim whitespace on each line
$str = preg_replace('~^[ \t]+~m', '', $str);
$str = preg_replace('~[ \t]+$~m', '', $str);

// The following regexes only need to be executed if the string contains html
if ($html_found = (strpos($str, '<') !== false)) {
// Elements that should not be surrounded by p tags
$no_p = '(?:p|div|h[1-6r]|ul|ol|li|blockquote|d[dlt]|pre|t[dhr]|t(?:able|body|foot|head)|c(?:aption|olgroup)|form|s(?:elect|tyle)|a(?:ddress|rea)|ma(?:p|th))';

// Put at least two linebreaks before and after $no_p elements
$str = preg_replace('~^<' . $no_p . '[^>]*+>~im', "\n$0", $str);
$str = preg_replace('~</' . $no_p . '\s*+>$~im', "$0\n", $str);
}

// Do the <p> magic!
    $str = '<p>' . trim($str) . '</p>';
$str = preg_replace('~\n{2,}~', "</p>\n\n<p>", $str);

    // The following regexes only need to be executed if the string contains html
    if ($html_found !== false) {
    // Remove p tags around $no_p elements
    $str = preg_replace('~<p>(?=</?' . $no_p . '[^>]*+>)~i', '', $str);
$str = preg_replace('~(</?' . $no_p . '[^>]*+>)</p>~i', '$1', $str);
}

// Convert single linebreaks to <br />
if ($br === true) {
$str = preg_replace('~(?<!\n)\n(?!\n)~', "<br />\n", $str);
}

return $str;
}*/