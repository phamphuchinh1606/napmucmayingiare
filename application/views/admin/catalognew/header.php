<script type="text/javascript">
(function($)
{
	$(document).ready(function()
	{
		var main = $('#form');
		main.contentTabs();
	});
})(jQuery);
</script>
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Danh mục bài viết</h5>
			<span>Quản lý danh mục bài viết</span>
		</div>
		<div class="horControlB menu_action">
			<ul>
				<li><a href="<?=admin_url('catalognew/add'); ?>">
					<img src="<?=public_url()?>admin/images/icons/control/16/add.png">
					<span>Thêm mới</span>
				</a></li>
				
				<li><a href="<?=admin_url('catalognew/index'); ?>">
					<img src="<?=public_url()?>admin/images/icons/control/16/list.png">
					<span>Danh sách</span>
				</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="line"></div>