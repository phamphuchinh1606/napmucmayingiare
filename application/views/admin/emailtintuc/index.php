
<?php $this->load->view('admin/emailtintuc/header', $this->data); ?>

<div class="wrapper" id="main_news">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data); ?>
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>
				Danh sách email khách hàng đăng ký nhận tin</h6>
		 	<div class="num f12">Số lượng: <b><?= $total_rows ?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			<thead class="filter"><tr><td colspan="10">
				<form class="list_filter form" action="<?= admin_url('emailtintuc') ?>" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>
					
						<tr>
							<td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
							<td class="item"><input name="id" value="<?= $this->input->get('id')?>" id="filter_id" type="text" style="width:55px;" /></td>
							
							<td class="label" style="width:40px;"><label for="filter_id">Email</label></td>
							<td class="item" style="width:155px;" ><input name="email" value="<?= $this->input->get('email;')?>" id="filter_iname" type="text" style="width:155px;" /></td>							
							
							<td style='width:150px'>
							<input type="submit" class="button blueB" value="Lọc" />
							<input type="reset" class="basic" value="Làm mới" onclick="window.location.href = '<?= admin_url('emailtintuc')?>'; ">
							</td>
							
						</tr>
					</tbody></table>
				</form>
			</td></tr></thead>
			
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?= public_url()?>/admin/images/icons/tableArrows.png" /></td>
					<td style="width:30px;">Mã số</td>
					<td>Tên</td>
					<td>SĐT</td>
					<td>Email</td>
					<td>Sản Phẩm</td>
					<td>Ngày đăng ký</td>
					<td style="width:40px;">Xóa</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="4">
						 <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?= admin_url('emailtintuc/del_all')?>">
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
					
					<td class="textC"><?= $row->id ?></td>
					<td class="textR"><p><?= $row->name; ?></p></td>
					<td class="textR"><p><?= $row->phone; ?></p></td>
					<td class="textR"><p><?= $row->email; ?></p></td>
					<td class="textR"><p><?= $row->content; ?></p></td>
					<td class="textR"><p><?= get_date($row->created) ?></p></td>
					<td class="option textC">
						<a href="<?= admin_url('emailtintuc/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
						    <img src="<?= public_url()?>/admin/images/icons/color/delete.png" />
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		    </tbody>
			
		</table>
	</div>
</div>		<div class="clear mt30"></div>