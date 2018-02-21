<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Blog.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [ADMIN] ブログカテゴリ 一覧　テーブル
 */
?>


<!-- list -->
<table cellpadding="0" cellspacing="0" class="list-table bca-table-listup" id="ListTable">
	<thead class="bca-table-listup__thead">
		<tr>
			<th style="width:160px" class="list-tool bca-table-listup__thead-th">
	<div>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_add.png', array('width' => 69, 'height' => 18, 'alt' => '新規追加', 'class' => 'btn bca-table-listup__img', 'hidden' => 'hidden')) . '新規追加', array('action' => 'add', $blogContent['BlogContent']['id']),array('class'=>' bca-table-listup__a bca-btn', 'data-bca-btn-type' => 'add')) ?>
	</div>
	<?php if ($this->BcBaser->isAdminUser()): ?>
		<div>
			<?php echo $this->BcForm->checkbox('ListTool.checkall', array('title' => '一括選択')) ?>
			<?php echo $this->BcForm->input('ListTool.batch', array('type' => 'select', 'options' => array('del' => '削除'), 'empty' => '一括処理')) ?>
			<?php echo $this->BcForm->button('適用', array('id' => 'BtnApplyBatch', 'disabled' => 'disabled', 'class' => 'bca-btn')) ?>
		</div>
	<?php endif ?>
</th>
<th class="bca-table-listup__thead-th">NO</th>
<th class="bca-table-listup__thead-th">ブログカテゴリ名
	<?php if ($this->BcBaser->siteConfig['category_permission']): ?>
		<br />管理グループ
	<?php endif ?>
</th>
<th class="bca-table-listup__thead-th">ブログカテゴリタイトル</th>
<th class="bca-table-listup__thead-th">登録日<br />更新日</th>
</tr>
</thead>
<tbody class="bca-table-listup__tbody">
	<?php if (!empty($dbDatas)): ?>
		<?php $currentDepth = 0 ?>
		<?php foreach ($dbDatas as $data): ?>
			<?php
			$rowIdTmps[$data['BlogCategory']['depth']] = $data['BlogCategory']['id'];
			// 階層が上がったタイミングで同階層よりしたのIDを削除
			if ($currentDepth > $data['BlogCategory']['depth']) {
				$i = $data['BlogCategory']['depth'] + 1;
				while (isset($rowIdTmps[$i])) {
					unset($rowIdTmps[$i]);
					$i++;
				}
			}
			$currentDepth = $data['BlogCategory']['depth'];
			$rowGroupId = array();
			foreach ($rowIdTmps as $rowIdTmp) {
				$rowGroupId[] = 'row-group-' . $rowIdTmp;
			}
			$rowGroupClass = ' class="depth-' . $data['BlogCategory']['depth'] . ' ' . implode(' ', $rowGroupId) . '"';
			?>
			<?php $currentDepth = $data['BlogCategory']['depth'] ?>
			<?php $this->BcBaser->element('blog_categories/index_row', array('data' => $data, 'rowGroupClass' => $rowGroupClass)) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="6" class="bca-table-listup__tbody-td"><p class="no-data">データが見つかりませんでした。</p></td>
		</tr>
	<?php endif; ?>
</tbody>
</table>