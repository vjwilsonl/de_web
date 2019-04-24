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
                <p>The Difference Engine is a mechanical calculator that was conceptualised by Charles Babbage, a mathematician, inventor, mechanical engineer, and philosopher in the 19th century. A chance encounter with this machine caused Ada Lovelace, a countess with unconventional mathematical talents, to befriend Babbage. Together, they envisioned the world’s first mechanical computer, the Analytical Engine, with Babbage as its engineer and Lovelace, its pioneer programmer.
                    <br/><br/>We’ve named ourselves after the Difference Engine because we want to be an agent for change, harnessing the power of comics to inspire wonder in readers from all walks of life. Difference Engine is committed to producing well-written stories with beautiful illustrations. We also believe that science and technology can – and must – go hand in hand with creativity for discovery and innovation to occur.</p>
            </div>
        </div>

        <div class="row behind-the-team">
            <div class="col-3"><h4>BEHIND THE TEAM</h4></div>
            <div class="col-9">
                <div class="row no-gutters">
                    <div class="col-sm-12 col-lg-4 team-card">
                        <div><h6 class="team-name">FELICIA LOW_JIMENEZ</h6></div>
                        <div><p class="team-role">Publisher</p></div>
                        <div class="team-image"><img src="http://de.test/wp-content/uploads/2018/09/features-aditi-1.jpg" class="team-cover"></div>
                        <div><p class="team-description">Felicia has worked in the book industry for most of her career, first as a bookseller, and now in publishing. She really likes to read and believes that stories have the power to change the world. She’s also one half of the writing team behind the award-winning Sherlock Sam series of children’s books.</p></div>
                    </div>

                    <div class="col-sm-12 col-lg-4 team-card">
                        <div><h6 class="team-name">SOPHIA-SUSANTO</h6></div>
                        <div><p class="team-role">Editor</p></div>
                        <div class="team-image"><img src="http://de.test/wp-content/uploads/2018/09/features-aditi-1.jpg" class="team-cover"></div>
                        <div><p class="team-description">Sophia is fascinated by the Southeast Asian publishing industry and has experience both in editing and marketing. She reads about a hundred books a year and relishes walking around art museums. She likes to make people laugh by telling them she had previously been a ballet dancer, a science lab intern, and a tax officer.</p></div>
                    </div>

                    <div class="col-sm-12 col-lg-4 team-card">
                        <div><h6 class="team-name">JOSEPHINE TAN</h6></div>
                        <div><p class="team-role">Marketing</p></div>
                        <div class="team-image"><img src="http://de.test/wp-content/uploads/2018/09/features-aditi-1.jpg" class="team-cover"></div>
                        <div><p class="team-description">Josephine is passionate about how arts and technology can come together to make the world a more delightful place. In her spare time, she draws, reads, and enjoys the outdoors. She is also a visual arts educator for young children.</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>