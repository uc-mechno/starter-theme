<?php

/**
 * ************************************************************************
 *
 * ショートコード
 *
 * 作成したショートコード
 *
 * ************************************************************************
 */

/**
 * 何も返さない（コメントアウト代わり）
 * ************************************************************************
 * @see https://www.u-1.net/2009/11/07/1963/
 *
 * @param string null
 * @return string null
 *
 * [ignore][/ignore]で囲む
 */
function ignore_shortcode($atts, $content = null)
{
  return null;
}
add_shortcode('ignore', 'ignore_shortcode');

/**
 * 時限を仕込むショートコード
 * ************************************************************************
 * @see https://www.a-in-hello.world/limit_code.html
 *
 * @param string null
 * @return string null
 *
 * [limit start='2019-09-14 12:00']ここだけ2019年9月14日の12時に表示されます。[/limit]
 * [limit end='2019-09-14 12:00']ここだけ2019年9月14日の12時に消えます。[/limit]
 * [limit start='2019-09-14 12:00' end='2019-09-15 0:00']ここだけ2019年9月14日の12時から2019年9月15日の0時まで表示されます。[/limit]
 */
function limit_code($atts, $content = null)
{
  $atts = shortcode_atts(array(
    "start" => null,
    "end" => null
  ), $atts);

  date_default_timezone_set("Asia/Tokyo");
  $today = strtotime(date('Y-m-d H:i'));

  if (($atts[start]) && ($atts[end] == null)) {
    if ($today >= strtotime('' . $atts[start] . '')) {
      return $content;
    }
  } elseif ($atts[start] && $atts[end]) {
    if (($today >= strtotime('' . $atts[start] . '')) && ($today < strtotime('' . $atts[end] . ''))) {
      return $content;
    }
  } elseif (($atts[start] == null) && ($atts[end])) {
    if ($today < strtotime('' . $atts[end] . '')) {
      return $content;
    }
  } else {
    return $content;
  }
}
add_shortcode('limit', 'limit_code');
