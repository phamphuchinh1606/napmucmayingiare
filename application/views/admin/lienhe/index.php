<br/><br/><br/>
<div class="wrapper">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data); ?>
		<div class="title">
			<h6>Danh sách khách hàng liên hệ</h6>
		 	<div class="num f12">Tổng số: <b><?= $total_rows; ?></b></div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>

					<td style="width:80px;">Mã số</td>
					<td>Họ và tên</td>
					<td>Email </td>
					<td>Địa chỉ</td>
					<td style="width:80px;">Số điện thoại</td>
					<td style="width:80px;">Ngày gửi</td>
					<td style="width:80px;">Hành động</td>
				</tr>
			</thead>
			
			<tbody>
				<!-- Filter -->
				 	<?php foreach ($list as $row): ?>
					<tr>
						<td class="textC"><?= $row->id; ?></td>
						<td><span title="<?= $row->name ?>" class="tipS"><?= $row->name; ?></span></td>
						<td><span title="<?= $row->email ?>" class="tipS"><?= $row->email; ?></span></td>
						<td><span title="<?= $row->address ?>" class="tipS"><?= $row->address; ?></span></td>
						<td><span title="<?= $row->phone ?>" class="tipS"><?= $row->phone; ?></span></td>
						<td><span title="<?= get_date($row->created) ?>" class="tipS"><?= get_date($row->created) ?></span></td>
						<td class="option textC">
						<a href="<?= admin_url('lienhe/traloi/'.$row->id)?>" title="Trả lời" >Trả lời</a>
						<a href="<?= admin_url('lienhe/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
						    <img src="<?= public_url()?>/admin/images/icons/color/delete.png" />
						</a>
					</td>
					</tr>
					<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>