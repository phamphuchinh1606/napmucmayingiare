<?php $this->load->view('admin/catalognew/header', $this->data); ?>
<div class="wrapper">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data); ?>
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách danh mục</h6>
			<!--<div class="num f12">Tổng số: <b>44</b></div>-->
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?= public_url()?>admin/images/icons/tableArrows.png" /></td>
					<td style="width:50px;">Mã số</td>
					<td>Tên danh mục</td>
					<td style="width:70px;">Cấp</td>
					<td style="width:80px;">Thứ tự</td>
					<td style="width:100px;">Trạng thái</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
 			<tfoot>
				<tr>
					<td colspan="7">
					     <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?= admin_url('catalognew/del_all')?>">
									<span style='color:white;'>Xóa hết</span>
								</a>
						 </div>
							
					     <div class='pagination'></div>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<!-- Filter -->
					<?php if($catalogcha):?>
					<?php foreach ($catalogcha as $row) : ?>
					<tr class='row_<?= $row->id ?>'>
						<td>
							<input type="checkbox" name="id[]" value="<?= $row->id; ?>" />
						</td>
						<td class="textC"><?= $row->id; ?></td>
						<td>
							<a href="<?=site_url($row->url.'-tt'.$row->id)?>" target="_blank">
								<b>
									<?= $row->name; ?>
									<?php if($infosetting->ngonngu != 0):?> 
									(<?=$row->name_en?>)
									<?php endif;?>
								</b>
							</a>
						</td>
						<td><span class="tipS">Cấp 1</span></td>
						<td><span title="<?= $row->sort_order ?>" class="tipS"><?= $row->sort_order; ?></span></td>
						<td class="textC">
							<a id="anhienajax<?=$row->id?>" class="anhienajax" data-id="<?=$row->id?>" href="javascript:void(0)">
							<?php if($row->status == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
							<?php if($row->status == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
							</a>
						</td>
						<td class="option">
							 <a href="<?= admin_url('catalognew/edit/'.$row->id) ?>" title="Chỉnh sửa" class="tipS ">
							<img src="<?= public_url() ?>admin/images/icons/color/edit.png" />
							</a>
							<a href="<?= admin_url('catalognew/delete/'.$row->id) ?>" title="Xóa" class="tipS verify_action" >
							    <img src="<?= public_url() ?>admin/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
						<?php if(count($this->catalognew_model->menucon($row->id)) > 0):?>
							<?php foreach($this->catalognew_model->menucon($row->id) as $con):?>
							<tr class='row_<?= $con->id ?>'>
							<td><input type="checkbox" name="id[]" value="<?= $con->id; ?>" /></td>
							<td class="textC"><?= $con->id; ?></td>
							<td>
								<a href="<?=site_url($con->url.'-tt'.$con->id)?>" target="_blank"><span title="<?= $con->name; ?>" class="tipS">
								<?= '--|'.$con->name; ?>
								<?php if($infosetting->ngonngu != 0):?> 
								<?= '--|'.$con->name_en; ?>
								<?php endif;?>
								</span></a>
							</td>
							<td><span class="tipS">Cấp 2</span></td>
							<td><span title="<?= $con->sort_order ?>" class="tipS"><?= $con->sort_order; ?></span></td>
							<td class="textC">
								<a id="anhienajax<?=$con->id?>" class="anhienajax" data-id="<?=$con->id?>" href="javascript:void(0)">
								<?php if($con->status == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
								<?php if($con->status == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
								</a>
							</td>
							<td class="option">
								 <a href="<?= admin_url('catalognew/edit/'.$con->id) ?>" title="Chỉnh sửa" class="tipS ">
								<img src="<?= public_url() ?>admin/images/icons/color/edit.png" />
								</a>
								
								<a href="<?= admin_url('catalognew/delete/'.$con->id) ?>" title="Xóa" class="tipS verify_action" >
								    <img src="<?= public_url() ?>admin/images/icons/color/delete.png" />
								</a>
							</td>
							
							</tr>
								<?php if(count($this->catalognew_model->menucon($con->id)) > 0):?>
								<?php foreach($this->catalognew_model->menucon($con->id) as $con1):?>
								<tr class='row_<?= $con1->id ?>'>
								<td><input type="checkbox" name="id[]" value="<?= $con1->id; ?>" /></td>
								<td class="textC"><?= $con1->id; ?></td>
								<td>
									<a href="<?=site_url($con1->url.'-tt'.$con1->id)?>" target="_blank"><span title="<?= $con1->name; ?>" class="tipS">
									<?= '--|--|'.$con1->name; ?>
									<?php if($infosetting->ngonngu != 0):?>
									<?= '--|--|'.$con1->name_en; ?>
									<?php endif;?>
									</span>
								</td>
								<td><span class="tipS">Cấp 3</span></td>
								<td><span title="<?= $con1->sort_order ?>" class="tipS"><?= $con1->sort_order; ?></span></td>
								<td class="textC">
									<a id="anhienajax<?=$con1->id?>" class="anhienajax" data-id="<?=$con1->id?>" href="javascript:void(0)">
									<?php if($con1->status == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
									<?php if($con1->status == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
									</a>
								</td>
								<td class="option">
									 <a href="<?= admin_url('catalognew/edit/'.$con1->id) ?>" title="Chỉnh sửa" class="tipS ">
									<img src="<?= public_url() ?>admin/images/icons/color/edit.png" />
									</a>
									<a href="<?= admin_url('catalognew/delete/'.$con1->id) ?>" title="Xóa" class="tipS verify_action" >
									    <img src="<?= public_url() ?>admin/images/icons/color/delete.png" />
									</a>
								</td>
								</tr>				
								<?php endforeach;?>
								<?php endif;?>	
							<?php endforeach;?>
						<?php endif;?>
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
          url:"<?= admin_url('catalognew/an_hien') ?>",
          data:{idajax:id},
          success:function(data){
            $('#anhienajax'+id).html(data);
          }
        }); 
    });
</script>