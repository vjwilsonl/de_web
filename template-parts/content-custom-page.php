<?php if( strtolower(get_the_title()) == 'about'): ?>
	<section class="section-about">
			<div class="col-12">
				<p><?= the_content(); ?></p>
			</div>
	</section>
<?php else: ?>
	<?php 
		$page = strtolower(get_the_title());
		if ($page == 'contact us') {
			$page = 'contact';
		}
	?>
	<section class="section-<?= $page ?>">
		<div class="row">
			<div class="col-12 section-title">
				<h1><?= the_title(); ?></h1>
			</div>
		</div>
		<?php if (strtolower(get_the_title()) == 'contact us'): ?>
			<div class="row my-4">
				<div class="col-12 col-lg-4 contact-item">
					<div class="row no-gutters">
						<div class="col-1"><i class="fas fa-map-marker-alt"></i>
						</div>
						<div class="col-11">
							<?= get_field('street_name', 'options') ?><br>
							<?= get_field('unit_no', 'options') ?><br>
							Singapore <?= get_field('postal_code', 'options') ?>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4 contact-item">
					<div class="row no-gutters">
						<div class="col-1"><i class="fas fa-phone"></i>
						</div>
						<div class="col-11">
							<?= get_field('contact_number', 'options') ?>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-4 contact-item">
					<div class="row no-gutters">
						<div class="col-1"><i class="fas fa-envelope"></i>
						</div>
						<div class="col-11">
							<?= get_field('contact_email', 'options') ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-12">
				<p><?= the_content(); ?></p>
			</div>
		</div>
	</section>
<?php endif; ?>