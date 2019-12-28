<?php if(isset($danhmuccha) && $danhmuccha):?>
<ul class="floor nav nav-pills">
	<?php foreach($danhmuccha as $row):?>
    <li>
        <a href="<?=site_url($row->url.'-c'.$row->id)?>"><?=$row->name?></a>
    </li>
    <?php endforeach;?>
</ul>
<?php endif;?>