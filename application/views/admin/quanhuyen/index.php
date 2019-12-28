<?php $this->load->view('admin/quanhuyen/header', $this->data); ?>
<div class="wrapper" id="main_product">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data); ?>
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách quận/huyện</h6>
		 	<div class="num f12">Số lượng: <b><?= $total_rows ?></b></div>
		</div>		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			<thead class="filter">
			<tr><td colspan="8">
				<form class="list_filter form" action="<?= admin_url('quanhuyen') ?>" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>
						<tr>
							<td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
							<td class="item" style="width:155px;" ><input name="name" value="<?= $this->input->get('name')?>" id="filter_iname" type="text" style="width:155px;" /></td>
							<td class="label" style="width:60px;"><label for="filter_status">Tỉnh thành</label></td>
							<td class="item">
							<select name="catalog">
								<option value="">-- Chọn tỉnh thành --</option>
								<?php if($catalog): ?>
								<?php foreach($catalog as $row) : ?>
									<option value="<?= $row->id ?>" <?= ($this->input->get('catalog') == $row->id)? 'selected' : ''?>><?= $row->name ?></option>
								<?php endforeach ;?>
								<?php endif;?>
							</select>
							</td>
							<td style='width:150px'>
							<input type="submit" class="button blueB" value="Lọc" />
							<input type="reset" class="basic" value="Làm mới" onclick="window.location.href = '<?= admin_url('quanhuyen')?>'; ">
							</td>
						</tr>
					</tbody></table>
				</form>
			</td></tr>
			</thead>
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?= public_url()?>admin/images/icons/tableArrows.png" /></td>
					<td style="width:40px;">Mã số</td>
					<td>Tên</td>
					<td style="width:110px;">Tỉnh thành</td>
					<td style="width:160px;">Thứ tự</td>
					<td style="width:160px;">Trạng thái</td>
					<td style="width:90px;">Hành động</td>
				</tr>
			</thead>
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="8">
						 <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?= admin_url('quanhuyen/del_all')?>">
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
					<td><b><?=$row->name?></b></td>
					<td><?=$this->tinhthanh_model->get_info($row->tinhthanh_id)->name;?></td>
					<td class="textC"><?=$row->sort_order; ?></td>
					<td class="textC">
						<a id="anhienajax<?=$row->id?>" class="anhienajax" data-idanhien="<?=$row->id?>" href="javascript:void(0)">
						<?php if($row->status == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
						<?php if($row->status == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
						</a>
					</td>
					<td class="option textC">
						<a href="<?= admin_url('quanhuyen/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS">
							<img src="<?= public_url()?>admin/images/icons/color/edit.png" />
						</a>
						<a href="<?= admin_url('quanhuyen/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
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
<script type="text/javascript">
    $(".anhienajax").click(function(){
        var idanhien = $(this).attr('data-idanhien');
        $.ajax({
          type:"post",
          url:"<?= admin_url('quanhuyen/an_hien') ?>",
          data:{idanhien:idanhien},
          success:function(data){
            $('#anhienajax'+idanhien).html(data);
          }
        }); 
    });
</script>