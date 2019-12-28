<?php $this->load->view('admin/catalog/header', $this->data); ?>
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
					<td style="width:10px;"><img src="<?= public_url() ?>admin/images/icons/tableArrows.png" /></td>
					<td style="width:50px;">Mã số</td>
					<td>Tên danh mục</td>
					<td style="width:70px;">Cấp</td>
					<td style="width:80px;">Thứ tự</td>
					<td style="width:130px;">Trạng thái / Nổi bật</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
 			<tfoot>
				<tr>
					<td colspan="7">
					    <div class="list_action itemActions">
							<a href="#submit" id="submit" class="button blueB" url="<?= admin_url('catalog/del_all')?>">
								<span style='color:white;'>Xóa hết</span>
							</a>
						</div>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<!-- Filter -->
					<?php if($catalogcha):?>
					<?php foreach ($catalogcha as $row) : ?>
					<tr class='row_<?= $row->id ?>'>
						<td><input type="checkbox" name="id[]" value="<?= $row->id; ?>" /></td>
						<td class="textC"><?= $row->id; ?></td>
						<td>
							<a href="<?=site_url($row->url.'-c'.$row->id)?>" target="_blank"><span title="<?= $row->name; ?>" class="tipS">
							<b>
								<?=$row->name;?> 
								<?php if($infosetting->ngonngu != 0):?>
								(<?= $row->name_en; ?>)
								<?php endif;?>
							</b>
							</span></a>
						</td>
						<td><span class="tipS">Cấp 1</span></td>
						<td><span title="<?= $row->sort_order ?>" class="tipS"><?= $row->sort_order; ?></span></td>
						<td class="textC">
							<a id="anhienajax<?=$row->id?>" class="anhienajax" data-id="<?=$row->id?>" href="javascript:void(0)">
							<?php if($row->status == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
							<?php if($row->status == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
							</a>
							<span style="margin-right: 15px"></span>
							<a id="noibatajax<?=$row->id?>" class="noibatajax" data-idnoibat="<?=$row->id?>" href="javascript:void(0)">
							<?php if($row->noibat == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
							<?php if($row->noibat == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
							</a>
						</td>
						<td class="option">
							 <a href="<?= admin_url('catalog/edit/'.$row->id) ?>" title="Chỉnh sửa" class="tipS ">
							<img src="<?= public_url() ?>admin/images/icons/color/edit.png" />
							</a>
							<a href="<?= admin_url('catalog/delete/'.$row->id) ?>" title="Xóa" class="tipS verify_action" >
							    <img src="<?= public_url() ?>admin/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
						<?php if(count($this->catalog_model->menucon($row->id)) > 0):?>
							<?php foreach($this->catalog_model->menucon($row->id) as $con):?>
							<tr class='row_<?= $con->id ?>'>
							<td><input type="checkbox" name="id[]" value="<?= $con->id; ?>" /></td>
							<td class="textC"><?= $con->id; ?></td>
							<td>
								<a href="<?=site_url($con->url.'-c'.$con->id)?>" target="_blank"><span title="<?= $con->name; ?>" class="tipS">
								<?= '--|'.$con->name; ?> 
								<?php if($infosetting->ngonngu != 0):?>
								(<?= '--|'.$con->name_en; ?>)
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
								<span style="margin-right: 15px"></span>
								<a id="noibatajax<?=$con->id?>" class="noibatajax" data-idnoibat="<?=$con->id?>" href="javascript:void(0)">
								<?php if($con->noibat == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
								<?php if($con->noibat == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
								</a>
							</td>
							<td class="option">
								<a href="<?= admin_url('catalog/edit/'.$con->id) ?>" title="Chỉnh sửa" class="tipS ">
								<img src="<?= public_url() ?>admin/images/icons/color/edit.png" />
								</a>
								<a href="<?= admin_url('catalog/delete/'.$con->id) ?>" title="Xóa" class="tipS verify_action" >
								    <img src="<?= public_url() ?>admin/images/icons/color/delete.png" />
								</a>
							</td>
							</tr>
								<?php if(count($this->catalog_model->menucon($con->id)) > 0):?>
								<?php foreach($this->catalog_model->menucon($con->id) as $con1):?>
								<tr class='row_<?= $con1->id ?>'>
								<td><input type="checkbox" name="id[]" value="<?= $con1->id; ?>" /></td>
								<td class="textC"><?= $con1->id; ?></td>
								<td>
									<a href="<?=site_url($con1->url.'-c'.$con1->id)?>" target="_blank"><span title="<?= $con1->name; ?>" class="tipS">
									<?= '--|--|'.$con1->name; ?> 
									<?php if($infosetting->ngonngu != 0):?>
									(<?= '--|--|'.$con1->name_en; ?>)
									<?php endif;?>
									</span></a>
								</td>
								<td><span class="tipS">Cấp 3</span></td>
								<td><span title="<?= $con1->sort_order ?>" class="tipS"><?= $con1->sort_order; ?></span></td>
								<td class="textC">
									<a id="anhienajax<?=$con1->id?>" class="anhienajax" data-id="<?=$con1->id?>" href="javascript:void(0)">
									<?php if($con1->status == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
									<?php if($con1->status == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
									</a>
									<span style="margin-right: 15px"></span>
									<a id="noibatajax<?=$con1->id?>" class="noibatajax" data-idnoibat="<?=$con1->id?>" href="javascript:void(0)">
									<?php if($con1->noibat == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
									<?php if($con1->noibat == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
									</a>
								</td>
								<td class="option">
									 <a href="<?= admin_url('catalog/edit/'.$con1->id) ?>" title="Chỉnh sửa" class="tipS ">
									<img src="<?= public_url() ?>admin/images/icons/color/edit.png" />
									</a>
									<a href="<?= admin_url('catalog/delete/'.$con1->id) ?>" title="Xóa" class="tipS verify_action" >
									    <img src="<?= public_url() ?>admin/images/icons/color/delete.png" />
									</a>
								</td>
								</tr>
									<?php if(count($this->catalog_model->menucon($con1->id)) > 0):?>
									<?php foreach($this->catalog_model->menucon($con1->id) as $con2):?>
									<tr class='row_<?= $con2->id ?>'>
									<td><input type="checkbox" name="id[]" value="<?= $con2->id; ?>" /></td>
									<td class="textC"><?= $con2->id; ?></td>
									<td>
										<a href="<?=site_url($con2->url.'-c'.$con2->id)?>" target="_blank"><span title="<?= $con2->name; ?>" class="tipS">
										<?= '--|--|--|'.$con2->name; ?> 
										<?php if($infosetting->ngonngu != 0):?>
										(<?= '--|--|--|'.$con2->name_en; ?>)
										<?php endif;?>
										</span></a>
									</td>
									<td><span class="tipS">Cấp 4</span></td>
									<td><span title="<?= $con2->sort_order ?>" class="tipS"><?=$con2->sort_order; ?></span></td>
									<td class="textC">
										<a id="anhienajax<?=$con2->id?>" class="anhienajax" data-id="<?=$con2->id?>" href="javascript:void(0)">
										<?php if($con2->status == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
										<?php if($con2->status == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
										</a>
										<span style="margin-right: 15px"></span>
										<a id="noibatajax<?=$con2->id?>" class="noibatajax" data-idnoibat="<?=$con2->id?>" href="javascript:void(0)">
										<?php if($con2->noibat == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
										<?php if($con2->noibat == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
										</a>
									</td>
									<td class="option">
										 <a href="<?= admin_url('catalog/edit/'.$con2->id) ?>" title="Chỉnh sửa" class="tipS ">
										<img src="<?= public_url() ?>admin/images/icons/color/edit.png" />
										</a>
										<a href="<?= admin_url('catalog/delete/'.$con2->id) ?>" title="Xóa" class="tipS verify_action" >
										    <img src="<?= public_url() ?>admin/images/icons/color/delete.png" />
										</a>
									</td>
									</tr>				
									<?php endforeach;?>
									<?php endif;?>					
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
          url:"<?= admin_url('catalog/an_hien') ?>",
          data:{idajax:id},
          success:function(data){
            $('#anhienajax'+id).html(data);
          }
        }); 
    });
</script>
<script type="text/javascript">
    $(".noibatajax").click(function(){
        var id = $(this).attr('data-idnoibat');
        $.ajax({
          type:"post",
          url:"<?= admin_url('catalog/noi_bat') ?>",
          data:{idnoibatajax:id},
          success:function(data){
            $('#noibatajax'+id).html(data);
          }
        }); 
    });
</script>