<?php get_header() ?>

<?php while (have_posts()) : ?>
    <?php the_post() ?>

    <!-- Job Opens start -->
    <section class="job-opens details pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-7 col-lg-7">
                    <div class="content-wrapper d-grid gap-4 gap-sm-8">
                        <div class="d-flex gap-6 align-items-center">
                            <div class="end-area">
                                <span class="fs-seven p-1 px-2"><?php the_title() ?></span>
                            </div>
                            <ul class="d-flex gap-6">
                                <li class="d-flex align-items-center gap-2">
                                    <?php
                                        $job_icon = function_exists('get_field') ? get_field('icon_name_material_icon') : '3D Artist';
                                        $job_address = function_exists('get_field') ? get_field('job_address') : 'Bangladesh';
                                        $job_time = function_exists('get_field') ? get_field('job_time') : 'Full Time';
                                        $job_time_remain = function_exists('get_field') ? get_field('time_remaining') : '2 Days Ago';
                                        $job_btn_text = function_exists('get_field') ? get_field('button_text') : 'Apply Now';
                                        $job_btn_link = function_exists('get_field') ? get_field('button_link') : '';
                                        $job_contact_link = function_exists('get_field') ? get_field('button_link_copy') : '';
                                        ?>
                                    <i class="material-symbols-outlined mat-icon"> <?php echo esc_html('work') ?> </i>
                                    <span class="fs-seven"><?php echo esc_html($job_time) ?></span>
                                </li>
                                <li class="d-flex align-items-center gap-2">
                                    <i class="material-symbols-outlined mat-icon"> <?php echo esc_html('schedule') ?> </i>
                                    <span class="fs-seven"><?php echo esc_html($job_time_remain) ?></span>
                                </li>
                            </ul>
                        </div>
                        <?php the_content() ?>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-7 mt-8 mt-lg-0 alt-bg">
                    <div class="apply-area cus-scrollbar text-center py-15 px-8">
                        <div class="icon-box mb-6 mb-sm-10 d-inline-flex d-center">
                            <i class="material-symbols-outlined fs-one"> <?php echo esc_html('draw') ?> </i>
                        </div>
                        <div class="section-text">
                            <h2 class="visible-slowly-bottom mb-3"><?php echo esc_html__('Apply for the position now!', 'gamestorm') ?></h2>
                            <span><?php echo esc_html__('Join a growing team in a dynamic environment.', 'gamestorm') ?></span>
                        </div>
                        <div class="btn-area">
                            <div class="btn-area mt-5 mt-sm-8 flex-wrap gap-6 d-center">
                                <a href="<?php echo esc_url($job_btn_link) ?>" class="box-style btn-box d-center">
                                    <?php echo esc_html($job_btn_text) ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Job Opens end -->

    <!-- Instagram post start -->
    <section class="instagram-post">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="instagram-post-carousel">
                    <?php
                        $images = function_exists('get_field') ? get_field('gallery_image') : '';
                        ?>
                    <?php if ($images) : ?>
                        <?php foreach ($images as $image) : ?>
                            <div class="slide-area">
                                <div class="img-box d-inline-flex d-center text-center position-relative">
                                    <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr('image') ?>">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram post end -->



    <!-- Footer Area Start -->
    <footer class="footer-section mail-section">
        <div class="container">
            <div class="row justify-content-between align-items-center pt-120 pb-120">
                <div class="col-xl-5 col-lg-6 get-start">
                    <span class="mb-2 display-four"><?php echo esc_html__('Let’s Get started', 'gamestorm') ?></span>
                    <p><?php echo esc_html__('For further info & support,', 'gamestorm') ?> <a href="<?php echo esc_url($job_contact_link) ?>"><?php echo esc_html__('Contact us', 'gamestorm') ?></a></p>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <?php
                        $mailchimp_shortcode = function_exists('get_field') ? get_field('mailchimp_shortcode') : 'Add Mailchimp Shortcode';
                        echo do_shortcode("'" . esc_html($mailchimp_shortcode) . "'");
                        ?>
                </div>
            </div>
        </div>
    </footer>

<?php endwhile; ?>
<?php get_footer() ?>