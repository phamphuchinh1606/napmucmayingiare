<?php $this->load->view('admin/slide/header', $this->data); ?>
<div class="wrapper" id="main_slide">
	<div class="widget">
		<?php $this->load->view('admin/message', $this->data); ?>
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6>Danh sách slide	</h6>
		 	<div class="num f12">Số lượng: <b><?= $total_rows ?></b></div>
		</div>
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?= public_url()?>admin/images/icons/tableArrows.png" /></td>
					<td style="width:50px;">Mã số</td>
					<td>Tiêu đề</td>
					<td style="width:50px;"> Thứ tự</td>
					<td style="width:75px;">Hành động</td>
				</tr>
			</thead>
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="7">
						 <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?= admin_url('slide/del_all')?>">
									<span style='color:white;'>Xóa hết</span>
								</a>
						 </div>
							
					     <div class='pagination'></div>
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
						<img width="300px" src="<?= base_url('uploads/images/slide/'.$row->image_link) ?>">
						<div class="clear"></div>
					</div>
					<a href="#" class="tipS" title="" target="_blank">
					<b>
						<?= $row->name ?> 
						<?php if($infosetting->ngonngu != 0):?>
						(<?=$row->name_en?>)
						<?php endif;?>
					</b>
					</a>
						
					</td>
					<td class="textR">
						<p><?= $row->sort_order; ?></p>	
					</td>
					<td class="option textC">
						<a href="<?= admin_url('slide/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS">
							<img src="<?= public_url()?>admin/images/icons/color/edit.png" />
						</a>
						<a href="<?= admin_url('slide/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
						    <img src="<?= public_url()?>admin/images/icons/color/delete.png" />
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		    </tbody>
			
		</table>
	</div>
</div><div class="clear mt30"></div>