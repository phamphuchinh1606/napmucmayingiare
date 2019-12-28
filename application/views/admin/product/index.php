<?php $this->load->view('admin/product/header', $this->data); ?>
<div class="wrapper" id="main_product">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data); ?>
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách sản phẩm</h6>
		 	<div class="num f12">Số lượng: <b><?= $total_rows ?></b></div>
		</div>		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			<thead class="filter"><tr><td colspan="9">
				<form class="list_filter form" action="<?= admin_url('product') ?>" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>
						<tr>
							<td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
							<td class="item"><input name="id" value="<?= $this->input->get('id')?>" id="filter_id" type="text" style="width:55px;" /></td>
							
							<td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
							<td class="item" style="width:155px;" ><input name="name" value="<?= $this->input->get('name')?>" id="filter_iname" type="text" style="width:155px;" /></td>
							
							<td class="label" style="width:60px;"><label for="filter_status">Thể loại</label></td>
							<td class="item">
							<select name="catalog">
								<option value="">-- Chọn danh mục --</option>
								<?php if($catalog): ?>
								<?php foreach($catalog as $row) : ?>
									<option value="<?= $row->id ?>" <?= ($this->input->get('catalog') == $row->id)? 'selected' : ''?>>
										<?=$row->name?>
										<?=($infosetting->ngonngu != 0)?'('.$row->name_en.')':''?>	
										</option>
									<?php if(count($this->catalog_model->menucon($row->id)) > 0):?>
									<?php foreach ($this->catalog_model->menucon($row->id) as $con): ?>
									<option value="<?= $con->id ?>" <?= ($this->input->get('catalog') == $con->id)? 'selected' : ''?>> 
										<?= '--|'.$con->name ?>
										<?=($infosetting->ngonngu != 0)?'('.$con->name_en.')':''?>
										</option>
										<?php if(count($this->catalog_model->menucon($con->id)) > 0):?>
										<?php foreach ($this->catalog_model->menucon($con->id) as $con1): ?>
										<option value="<?= $con1->id ?>" <?= ($this->input->get('catalog') == $con1->id)? 'selected' : ''?>> 
											<?= '--|--|'.$con1->name ?>
											<?=($infosetting->ngonngu != 0)?'('.$con1->name_en.')':''?>	
											</option>
											<?php if(count($this->catalog_model->menucon($con1->id)) > 0):?>
											<?php foreach ($this->catalog_model->menucon($con1->id) as $con2): ?>
												<option value="<?= $con2->id ?>" <?= ($this->input->get('catalog') == $con2->id)? 'selected' : ''?>> 
													<?= '--|--|--|'.$con2->name ?>
													<?=($infosetting->ngonngu != 0)?'('.$con2->name_en.')':''?>
													</option>
											<?php endforeach ;?>
											<?php endif; ?>
										<?php endforeach ;?>
										<?php endif; ?>
									<?php endforeach ;?>
									<?php endif; ?>
								<?php endforeach ;?>
								<?php endif;?>
							</select>
							</td>
							<td style='width:150px'>
							<input type="submit" class="button blueB" value="Lọc" />
							<input type="reset" class="basic" value="Làm mới" onclick="window.location.href = '<?= admin_url('product')?>'; ">
							</td>
							
						</tr>
					</tbody></table>
				</form>
			</td>
			</tr></thead>
			
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?= public_url()?>/admin/images/icons/tableArrows.png" /></td>
					<td style="width:40px;">Mã số</td>
					<td style="width:40px;">Mã SP</td>
					<td>Tên</td>
					<td style="width:110px;">Danh mục</td>
					<td style="width:120px;">Giá</td>
					<td style="width:75px;">Ngày tạo</td>
					<td style="width:160px;">Trạng thái / Mới / Nổi bật</td>
					<td style="width:90px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="9">
						 <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?= admin_url('product/del_all')?>">
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
					<td class="textL"><?= $row->ma_sp ?></td>
					<td>
					<div class="image_thumb">
						<img src="<?= base_url('uploads/images/products-images/'.$row->image_link) ?>">
						<div class="clear"></div>
					</div>
					
					<a href="<?=site_url($row->url.'-sp'.$row->id)?>" class="tipS" title="" target="_blank">
						<b>
						<?= $row->name ?>
						<?php if($infosetting->ngonngu != 0):?>
						(<?= $row->name_en ?>)
						<?php endif;?>
						</b>
					</a>
					</td>

					<td>
						<?= $this->catalog_model->get_info($row->catalog_id)->name;?>
						<?php if($infosetting->ngonngu != 0):?>
						(<?= $this->catalog_model->get_info($row->catalog_id)->name_en;?>)
						<?php endif;?>	
					</td>
					<td class="textR">
						<p>VNĐ: </p>
						<?php if($row->price > 0):?>
							<?php if($row->discount > 0) : ?>
								<?=number_format(($row->price)-($row->discount));?>đ
								<p style="text-decoration:line-through"><?= number_format($row->price);?>đ</p>
							<?php else:?>
	                        	<p><?= number_format($row->price);?>đ</p> 
	                        <?php endif ;?> 	
						<?php else:?>
							<p>Liên hệ</p>
						<?php endif;?>		
						<?php if($infosetting->ngonngu != 0):?>
						<p>USD: </p>
							<?php if($row->price_en > 0):?>
								<?php if($row->discount_en > 0) : ?>
									<?=number_format(($row->price_en)-($row->discount_en));?>$
									<p style="text-decoration:line-through"><?= number_format($row->price_en);?>$</p>
								<?php else:?>
		                        	<p><?= number_format($row->price_en);?>$</p> 
		                        <?php endif ;?> 	
							<?php else:?>
								<p>Contact</p>
							<?php endif;?>	
						<?php endif;?>	
					</td>
					
					<td class="textC"><?= get_date($row->created); ?></td>
					<td class="textC">
						<a id="anhienajax<?=$row->id?>" class="anhienajax thea" data-idanhien="<?=$row->id?>" href="javascript:void(0)">
							<?php if($row->status == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
							<?php if($row->status == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
						</a>
						<span style="margin-right: 15px"></span>
						<a id="newajax<?=$row->id?>" class="newajax thea" data-idnew="<?=$row->id?>" href="javascript:void(0)">
							<?php if($row->new == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
							<?php if($row->new == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
						</a>
						<span style="margin-right: 15px"></span>
						<a id="noibatajax<?=$row->id?>" class="noibatajax thea" data-idnoibat="<?=$row->id?>" href="javascript:void(0)">
							<?php if($row->noibat == 0): ?><img src="<?=public_url('admin/images/uncheck.png')?>"><?php endif?>
							<?php if($row->noibat == 1): ?><img src="<?=public_url('admin/images/check.png')?>"><?php endif?>
						</a>
					</td>
					<td class="option textC">
						<a href="<?= admin_url('product/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS">
							<img src="<?= public_url()?>/admin/images/icons/color/edit.png" />
						</a>
						<a href="<?= admin_url('product/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
						    <img src="<?= public_url()?>/admin/images/icons/color/delete.png" />
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
          url:"<?= admin_url('product/sp_an_hien') ?>",
          data:{idanhien:idanhien},
          success:function(data1){
            $('#anhienajax'+idanhien).html(data1);
          }
        }); 
    });
    $(".newajax").click(function(){
        var idnew = $(this).attr('data-idnew');
        $.ajax({
          type:"post",
          url:"<?= admin_url('product/sp_new') ?>",
          data:{idnew:idnew},
          success:function(data2){
            $('#newajax'+idnew).html(data2);
          }
        }); 
    });
    $(".noibatajax").click(function(){
        var idnoibat = $(this).attr('data-idnoibat');
        $.ajax({
          type:"post",
          url:"<?= admin_url('product/sp_noi_bat') ?>",
          data:{idnoibat:idnoibat},
          success:function(data3){
            $('#noibatajax'+idnoibat).html(data3);
          }
        }); 
    });
</script>