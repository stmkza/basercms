<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [ADMIN] テンプレートウィジェット設定
 */
$title = __d('baser', 'PHPテンプレート');
$description = __d('baser', 'PHPコードが書かれたテンプレートの読み込みが行えます。');
?>


<?php echo $this->BcForm->label($key . '.template', __d('baser', 'PHPテンプレート名')) ?> 
<?php echo $this->BcForm->text($key . '.template', ['size' => 14]) ?> <?php echo $this->ext ?>
<p style="text-align:left"><small>
	<?php
	$webroot = preg_replace('/' . preg_quote(docRoot(), '/') . '/', '', WWW_ROOT, 1);
	echo sprintf(__d('baser', 'テンプレートを利用中のテーマ内の次のパスに保存してください。<br />%stheme/{テーマ名}/Elements/widgets/'), $webroot);
	?>
</small></p>
