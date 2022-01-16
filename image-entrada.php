<?php if(isset($entrada['image']) && $entrada['image']): ?>
	<img class="card-img-top" src="img/uploads/<?= ($entrada['image']); ?>">
<?php else: ?>
	<img class="card-img-top" src="img/post.png" >
<?php endif; ?>