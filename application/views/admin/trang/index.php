<?php $this->load->view('admin/trang/header', $this->data); ?>
<div class="wrapper" id="main_product">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data); ?>
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách trang</h6>
		 	<div class="num f12">Số lượng: <b><?= $total_rows ?></b></div>
		</div>		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?= public_url()?>admin/images/icons/tableArrows.png" /></td>
					<td style="width:40px;">Mã số</td>
					<td>Tên</td>
					<td style="width:75px;">Ngày tạo</td>
					<td style="width:160px;">Trạng thái / Nổi bật</td>
					<td style="width:90px;">Hành động</td>
				</tr>
			</thead>
 			<tfoot class="auto_check_pages">
				<tr>
				<td colspan="8">
					 <div class="list_action itemActions">
						<a href="#submit" id="submit" class="button blueB" url="<?= admin_url('news/del_all')?>">
							<span style='color:white;'>Xóa hết</span>
						</a>
					 </div>
				</td>
				</tr>
			</tfoot>
			<tbody class="list_item">
					<?php foreach ($list as $row) : ?>
			      	<tr class='row_<?= $row->id?>'>
					<td><input type="checkbox" name="id[]" value="<?= $row->id ?>" /></td>
					<td class="textC"><?= $row->id ?></td>
					<td>
					<div class="image_thumb">
						<?php if($row->image_link):?>
						<img src="<?= base_url('uploads/images/news/'.$row->image_link)?>">
						<?php endif;?>
						<div class="clear"></div>
					</div>
					<a href="<?=site_url($row->url.'-t'.$row->id)?>" class="tipS" target="_blank"><b>
						<?= $row->name?> 
						<?php if($infosetting->ngonngu != 0):?>
						(<?= $row->name_en?>)
						<?php endif;?>
					</b></a>
					</td>
					<td class="textC"><?= get_date($row->created); ?></td>
					<td class="textC">
						<a href="<?= admin_url('trang/an_hien/'.$row->id) ?>">
						<?php if($row->status == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
						<?php if($row->status == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
						</a>
						<span style="margin-right: 15px"></span>
						<a href="<?= admin_url('trang/noi_bat/'.$row->id) ?>">
						<?php if($row->noibat == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
						<?php if($row->noibat == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
						</a>
					</td>
					<td class="option textC">
						<a href="<?= admin_url('trang/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS">
							<img src="<?= public_url()?>admin/images/icons/color/edit.png" />
						</a>
						<a href="<?= admin_url('trang/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
						    <img src="<?= public_url()?>admin/images/icons/color/delete.png" />
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		    </tbody>
		</table>
	</div>
</div>		
<div class="clear mt30"></div>