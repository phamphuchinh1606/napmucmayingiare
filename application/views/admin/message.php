		<?php 
		// nếu tồn tại biến message và biến message có giá trị thì in ra
		if( isset($message) && $message ): ?>
		<div class="nNote nInformation hideit">
            <p><?= "<strong>Thông báo: </strong>".$message; ?></p>
        </div>
        <?php endif; ?>