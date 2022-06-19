<?php

/**
 * ************************************************************************
 *  Contact Form 7の設定
 * ************************************************************************
 */

/**
 * ContactForm7で自動挿入されるPタグ、brタグを削除
 * ************************************************************************
 */
function wpcf7_autop_return_false()
{
  return false;
}
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
/**
 * post成功時にセッションをセット
 * サンクスページアクセス時、このセッションが無いとTOPへリダイレクトさせる（URL直打ちのアクセス対策）
 * ************************************************************************
 */
// add_action('wpcf7_mail_sent', 'my_wpcf7_mail_sent_session_start');
// function my_wpcf7_mail_sent_session_start()
// {
//   session_start();
//   $_SESSION['thanks_judge'] = true;
// }

// TODO：；https://hisa-himi.site/coding/wordpress/wp-mail-smtp/
// メール送信テストする
