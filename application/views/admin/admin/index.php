
<?php $this->load->view('admin/admin/header', $this->data); ?>

<div class="wrapper">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data); ?>
		<div class="title">
			<h6>Danh sách Thành viên</h6>
		 	<div class="num f12">Tổng số: <b><?php echo $total; ?></b></div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>

					<td style="width:80px;">Mã số</td>
					<td>Tên đăng nhập</td>
					<td>Tên </td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			

 			
			<tbody>
				<!-- Filter -->
				 	<?php foreach ($list as $row): ?>
					<tr>

						
						<td class="textC"><?php echo $row->id; ?></td>
						
						
						<td><span title="<?php echo $row->username ?>" class="tipS">
							<?php echo $row->username; ?></span></td>
						
						
						<td><span title="<?php echo $row->name ?>" class="tipS">
							<?php echo $row->name; ?>						</span></td>
						
						
						<td class="option">
							 <a href="<?php echo admin_url('admin/edit/'.$row->id) ?>" title="Chỉnh sửa" class="tipS ">
							<img src="<?php echo public_url() ?>/admin/images/icons/color/edit.png" />
							</a>
							<?php 
							$admin_root = $this->config->item('root_admin');
							if($row->id != $admin_root):?>
							<a href="<?php echo admin_url('admin/delete/'.$row->id) ?>" title="Xóa" class="tipS verify_action" >
							    <img src="<?php echo public_url() ?>/admin/images/icons/color/delete.png" />
							</a>
							<?php endif?>
						</td>
					</tr>
					<?php endforeach; ?>
				
			</tbody>
		</table>
	</div>
</div>