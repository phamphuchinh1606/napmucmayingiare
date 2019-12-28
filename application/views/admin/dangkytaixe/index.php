<?php $this->load->view('admin/dangkytaixe/header', $this->data); ?>
<div class="wrapper" id="main_news">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data); ?>
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách</h6>
		 	<div class="num f12">Số lượng: <b><?= $total_rows ?></b></div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			<thead class="filter"><tr><td colspan="10">
				<form class="list_filter form" action="<?= admin_url('dangkytaixe') ?>" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>
						<tr>
							<td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
							<td class="item"><input name="id" value="<?= $this->input->get('id')?>" id="filter_id" type="text" style="width:55px;" /></td>
							<td class="label" style="width:40px;"><label for="filter_id">Email</label></td>
							<td class="item" style="width:155px;" ><input name="email" value="<?= $this->input->get('email;')?>" id="filter_iname" type="text" style="width:155px;" /></td>							
							<td style='width:150px'>
							<input type="submit" class="button blueB" value="Lọc" />
							<input type="reset" class="basic" value="Làm mới" onclick="window.location.href = '<?= admin_url('dangkytaixe')?>'; ">
							</td>
						</tr>
					</tbody></table>
				</form>
			</td></tr></thead>
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?= public_url()?>/admin/images/icons/tableArrows.png" /></td>
					<td style="width:100px;">Họ tên</td>
					<td>Email</td>
					<td>Di động</td>
					<td>Khu vực hoạt động</td>
					<td>Loại xe</td>
					<td>Giới thiệu/Mã</td>
					<td>Ngày đăng ký</td>
					<td style="width:40px;">Xóa</td>
				</tr>
			</thead>
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="9">
						 <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?= admin_url('dangkytaixe/del_all')?>">
									<span style='color:white;'>Xóa hết</span>
								</a>
						 </div>
					     <div class='pagination'> <?= $phantrang ?> </div>
					</td>
				</tr>
			</tfoot>
			<tbody class="list_item">
					<?php foreach ($list as $row) : ?>
			      	<tr class='row_<?= $row->id?>'>
					<td><input type="checkbox" name="id[]" value="<?= $row->id ?>" /></td>
					
					<td class="textL"><?= $row->hoten ?></td>
					<td class="textL"><?= $row->email ?></td>
					<td class="textR"><?= $row->didong; ?></td>
					<td class="textL"><?= $row->quanhuyen; ?> - <?= $row->thanhpho; ?></td>
					<td class="textL"><?= $row->loaixe; ?> - <?= $row->tinhtrang; ?></td>
					<td class="textL">
						<?= $row->nguongioithieu; ?>
						<?php if($row->magioithieu):?>
						<?= ' - '.$row->magioithieu; ?>
						<?php endif;?>
					</td>
					<td class="textL"><p><?= get_date($row->created) ?></p></td>
					<td class="option textC">
						<a href="<?= admin_url('dangkytaixe/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
						    <img src="<?= public_url()?>/admin/images/icons/color/delete.png" />
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		    </tbody>
			
		</table>
	</div>
</div>		<div class="clear mt30"></div>