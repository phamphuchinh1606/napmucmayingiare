<?php $this->load->view('admin/menu/header', $this->data); ?>
<div class="wrapper">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data); ?>
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách danh mục</h6>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?= public_url() ?>/admin/images/icons/tableArrows.png" /></td>
					<td style="width:80px;">Mã số</td>
					<td>Tên danh mục</td>
					<td>Cấp</td>
					<td>Thứ tự hiển thị</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
 			<tfoot>
				<tr>
					<td colspan="7">
					     <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?= admin_url('menu/del_all')?>">
									<span style='color:white;'>Xóa hết</span>
								</a>
						 </div>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach ($menucha as $row) : ?>
				<tr class='row_<?= $row->id ?>'>
					<td><input type="checkbox" name="id[]" value="<?= $row->id; ?>" /></td>	
					<td class="textC"><?= $row->id; ?></td>
					<td><span title="<?= $row->name; ?>" class="tipS"><?= $row->name; ?> <?=($infosetting->ngonngu != 0)?'('.$row->name_en.')':''?></span></td>
					<td><span class="tipS">Cấp 1</span></td>
					<td><span title="<?= $row->sort_order ?>" class="tipS"><?= $row->sort_order; ?></span></td>
					<td class="option">
					<a href="<?= admin_url('menu/edit/'.$row->id) ?>" title="Chỉnh sửa" class="tipS "><img src="<?= public_url() ?>/admin/images/icons/color/edit.png" /></a>
					<a href="<?= admin_url('menu/delete/'.$row->id) ?>" title="Xóa" class="tipS verify_action" ><img src="<?= public_url() ?>/admin/images/icons/color/delete.png" />
						</a>
					</td>
				</tr>
					<?php if(count($this->menu_model->menucon($row->id)) > 0):?>
					<?php foreach($this->menu_model->menucon($row->id) as $con):?>
					<tr class='row_<?= $con->id ?>'>
					<td><input type="checkbox" name="id[]" value="<?= $con->id; ?>" /></td>
					<td class="textC"><?= $con->id; ?></td>
					<td><span title="<?= $con->name; ?>" class="tipS"><?= '--|'.$con->name; ?> <?=($infosetting->ngonngu != 0)?'('.$con->name_en.')':''?></span></td>
					<td><span class="tipS">Cấp 2</span></td>
					<td><span title="<?= $con->sort_order ?>" class="tipS"><?= $con->sort_order; ?></span></td>
					<td class="option">
					<a href="<?= admin_url('menu/edit/'.$con->id) ?>" title="Chỉnh sửa" class="tipS "><img src="<?= public_url() ?>/admin/images/icons/color/edit.png" /></a>
					<a href="<?= admin_url('menu/delete/'.$con->id) ?>" title="Xóa" class="tipS verify_action" ><img src="<?= public_url() ?>/admin/images/icons/color/delete.png" /></a>
					</td>
					</tr>
						<?php if(count($this->menu_model->menucon($con->id)) > 0):?>
						<?php foreach($this->menu_model->menucon($con->id) as $con1):?>
						<tr class='row_<?= $con1->id ?>'>
							<td><input type="checkbox" name="id[]" value="<?= $con1->id; ?>" /></td>
							<td class="textC"><?= $con1->id; ?></td>
							<td><span title="<?= $con1->name; ?>" class="tipS">
								<?= '--|--|'.$con1->name; ?> <?=($infosetting->ngonngu != 0)?'('.$con1->name_en.')':''?></span></td>
							<td><span class="tipS">Cấp 3</span></td>
							<td><span title="<?= $con1->sort_order ?>" class="tipS"><?= $con1->sort_order; ?></span></td>
							<td class="option">
								<a href="<?= admin_url('menu/edit/'.$con1->id) ?>" title="Chỉnh sửa" class="tipS "><img src="<?= public_url() ?>/admin/images/icons/color/edit.png" /></a>
								<a href="<?= admin_url('menu/delete/'.$con1->id) ?>" title="Xóa" class="tipS verify_action"><img src="<?= public_url() ?>/admin/images/icons/color/delete.png" /></a>
							</td>
						</tr>
						<?php endforeach;?>
						<?php endif;?>
					<?php endforeach;?>
					<?php endif;?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>