<?php if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'correcto'):?>
	<div class="alert alert-success">
		<?= $_GET['mensaje']?>
	</div>
<?php elseif(isset($_GET['mensaje']) && $_GET['mensaje'] != 'correcto'): ?>
		<div class="alert alert-danger">
			<?= $_GET['mensaje']?>
		</div>
<?php endif; ?>