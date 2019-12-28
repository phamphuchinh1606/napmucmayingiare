<?php $this->load->view('admin/tinhthanh/header', $this->data); ?>
<div class="wrapper">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data); ?>
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách danh mục</h6>
			<div class="num f12">Tổng số: <b><?=$tongso?></b></div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?= public_url()?>admin/images/icons/tableArrows.png" /></td>
					<td style="width:50px;">Mã số</td>
					<td>Tên tỉnh thành</td>
					<td style="width:80px;">Thứ tự</td>
					<td style="width:100px;">Trạng thái</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
 			<tfoot>
				<tr>
					<td colspan="7">
					     <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?= admin_url('tinhthanh/del_all')?>">
									<span style='color:white;'>Xóa hết</span>
								</a>
						 </div>
							
					     <div class='pagination'></div>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<!-- Filter -->
					<?php if($tinhthanh):?>
					<?php foreach ($tinhthanh as $row) : ?>
					<tr class='row_<?= $row->id ?>'>
						<td>
							<input type="checkbox" name="id[]" value="<?= $row->id; ?>" />
						</td>
						<td class="textC"><?= $row->id; ?></td>
						<td><b><?=$row->name;?> (<?=$row->name_en;?>)</b></td>
						<td><span title="<?= $row->sort_order ?>" class="tipS"><?=$row->sort_order;?></span></td>
						<td class="textC">
							<a id="anhienajax<?=$row->id?>" class="anhienajax" data-id="<?=$row->id?>" href="javascript:void(0)">
							<?php if($row->status == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
							<?php if($row->status == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
							</a>
						</td>
						<td class="option">
							 <a href="<?= admin_url('tinhthanh/edit/'.$row->id) ?>" title="Chỉnh sửa" class="tipS ">
							<img src="<?= public_url() ?>admin/images/icons/color/edit.png" />
							</a>
							<a href="<?= admin_url('tinhthanh/delete/'.$row->id) ?>" title="Xóa" class="tipS verify_action" >
							    <img src="<?= public_url() ?>admin/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
					<?php endforeach; ?>
				<?php endif?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
    $(".anhienajax").click(function(){
        var id = $(this).attr('data-id');
        $.ajax({
          type:"post",
          url:"<?= admin_url('tinhthanh/an_hien') ?>",
          data:{idajax:id},
          success:function(data){
            $('#anhienajax'+id).html(data);
          }
        }); 
    });
</script>