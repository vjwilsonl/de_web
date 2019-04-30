<!-- Contact Us Page -->

<?php if ( strtolower( get_the_title() ) == 'contact us' ): ?>
    <?php $page = 'contact'; ?>

    <section class="section-<?= $page ?>">
        <div class="row">
            <div class="col-12 section-title">
                <h1><?= the_title(); ?></h1>
            </div>
        </div>
        <?php if ( strtolower( get_the_title() ) == 'contact us' ): ?>
            <div class="row my-4">
                <div class="col-12 col-lg-4 contact-item">
                    <div class="row no-gutters">
                        <div class="col-1"><i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="col-11">
                            <?= get_field( 'street_name', 'options' ) ?><br>
                            <?= get_field( 'unit_no', 'options' ) ?><br>
                            Singapore <?= get_field( 'postal_code', 'options' ) ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 contact-item">
                    <div class="row no-gutters">
                        <div class="col-1"><i class="fas fa-phone"></i>
                        </div>
                        <div class="col-11">
                            <?= get_field( 'contact_number', 'options' ) ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 contact-item">
                    <div class="row no-gutters">
                        <div class="col-1"><i class="fas fa-envelope"></i>
                        </div>
                        <div class="col-11">
                            <?= get_field( 'contact_email', 'options' ) ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-12 contact-us-social">
                    <div class="contact-us-social-body">
                        <h6>Follow us on social media</h6>

                        <ul class="list-inline">
                            <?php get_template_part( 'template-parts/social-url-icon' ) ?>
                        </ul>
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

<!-- About Page -->

<?php if ( strtolower( get_the_title() ) == 'about' ): ?>
    <section class="section-about">
        <div class="row">
            <div class="col-12">
                <?= the_content(); ?>
            </div>
        </div>

        <div class="row behind-the-name">
            <div class="col-3"><h4>BEHIND THE NAME</h4></div>
            <div class="col-9">
                <p> <?= nl2br( get_field("behind_the_name") ); ?> </p>
            </div>
        </div>

        <div class="row behind-the-team">
            <div class="col-3"><h4>BEHIND THE TEAM</h4></div>
            <div class="col-9">
                <div class="row no-gutters">
                    <?php foreach ($team = get_field("behind_the_team") as $member) : ?>
                    <div class="col-sm-12 col-lg-4 team-card">
                        <div><h6 class="team-name"><?= $member['name'] ?></h6></div>
                        <div><p class="team-role"><?= $member['role'] ?></p></div>
                        <div class="team-image"><img src="<?= $member['image']['url'] ?>" alt="<?= $member['image']['name'] ?>" class="team-cover"></div>
                        <div>
                            <p class="team-description">
                                <?= $member['description'] ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Other Pages -->

<section class="">
    <div class="row">
        <div class="col-12">
            <?= the_content(); ?>
        </div>
    </div>
</section>