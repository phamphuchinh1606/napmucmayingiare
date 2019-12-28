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
<script>
    // Wait until the DOM has loaded before querying the document
    $(document).ready(function(){
        $('ul.tabcons').each(function(){
            var $active, $content, $links = $(this).find('a');

            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
            $content = $($active.attr('href'));
 
            $links.not($active).each(function () {
                $($(this).attr('href')).hide();
            });
 
            $(this).on('click', 'a', function(e){
                // Make the old tab inactive.
                $active.removeClass('active');
                $content.hide();
 
                $active = $(this);
                $content = $($(this).attr('href'));
 
                $active.addClass('active');
                $content.show();
 
                e.preventDefault();
            });
        });
    });
</script>
<style type="text/css">
	.tabcons li {
        list-style:none;
        display:inline;
    }
    .tabcons a {
        padding:5px 10px;
        display:inline-block;
        background:#666;
        color:#fff;
        text-decoration:none;
    }
    .tabcons a.active {
	    background: #f9f9f9;
	    color: #000;
	    border: 1px solid #ccc;
	    border-bottom: 0;
    }
</style>
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Cài đặt chung</h5>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				<li><a href="<?= admin_url('setting/index') ?>">
					<img src="<?= public_url() ?>admin/images/icons/control/16/add.png" />
					<span>Chỉnh sửa</span>
				</a></li>	
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="line"></div>