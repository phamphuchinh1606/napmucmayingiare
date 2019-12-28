<script type="text/javascript">
    $(document).ready(function(){
        $("#module_menu").change(function(){
            var idModule = $(this).val();
            $.ajax({
            	type:'post',
            	url:'./load_menu_ajax/',
            	data:{'idModule':idModule},
            	success:function(data){
            		$("#name_menu").html(data);
            	}
            });
        });
    });
    $(document).ready(function(){
        document.getElementById('showlkn').onclick = function(e){
                if (this.checked){
                    $(".lkn").removeClass("anchucnang");
                    $(".mnc").removeClass("anchucnang");
                    $(".thutu").removeClass("anchucnang");
                    $(".lkt").addClass("anchucnang");
                }
            };
    });
    $(document).ready(function(){
        document.getElementById('showlkt').onclick = function(e){
                if (this.checked){
                    $(".lkt").removeClass("anchucnang");
                    $(".mnc").removeClass("anchucnang");
                    $(".thutu").removeClass("anchucnang");
                    $(".lkn").addClass("anchucnang");
                }
            };
    });
</script>
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Menu</h5>
			<span>Quản lý menu</span>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				<li><a href="<?= admin_url('menu/add'); ?>">
					<img src="<?= public_url() ?>/admin/images/icons/control/16/add.png">
					<span>Thêm mới</span>
				</a></li>
				
				<li><a href="<?= admin_url('menu/index'); ?>">
					<img src="<?= public_url() ?>/admin/images/icons/control/16/list.png">
					<span>Danh sách</span>
				</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="line"></div>