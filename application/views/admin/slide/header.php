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
			<h5>Slide</h5>
			<span>Quản lý slide</span>
		</div>
		<div class="horControlB menu_action">
			<ul>
				<li><a href="<?= admin_url('slide/add') ?>">
					<img src="<?= public_url() ?>admin/images/icons/control/16/add.png" />
					<span>Thêm mới</span>
				</a></li>
				<li><a href="<?= admin_url('slide') ?>">
					<img src="<?= public_url() ?>admin/images/icons/control/16/list.png" />
					<span>Danh sách</span>
				</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="line"></div>