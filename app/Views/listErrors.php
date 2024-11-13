<?php if ( isset($errors) && $errors !== [] ) : ?>
	<div class="errors" role="alert">
		<ul class="list-unstyled">
		<?php foreach ( $errors as $error ) : ?>
			<li>- <?= esc($error) ?> -</li>
		<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>
