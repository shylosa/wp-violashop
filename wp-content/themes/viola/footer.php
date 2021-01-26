<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package viola
 */

?>

<!-- Start Footer  -->
<footer>
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-widget">
                        <h4><?= __('About Viola', 'viola')?></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-viber" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-telegram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link">
                        <h4>Information</h4>
                        <ul>
                            <li><a href="#"><?= __('About', 'viola') ?></a></li>
                            <li><a href="#"><?= __('Customer services', 'viola') ?></a></li>
                            <li><a href="#"><?= __('Our sitemap', 'viola') ?></a></li>
                            <li><a href="#"><?= __('Terms &amp; conditions', 'viola') ?></a></li>
                            <li><a href="#"><?= __('Privacy policy', 'viola') ?></a></li>
                            <li><a href="#"><?= __('Delivery information', 'viola') ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link-contact">
                        <h4><?= __('Contact us', 'viola') ?></h4>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i><?= __('Address', 'viola') ?>: <?= __('Novomoskovsk city, Hetmanska st., 15', 'viola') ?></p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i><?= __('Phone', 'viola') ?>: <a href="tel:+1-888705770">+1-888 705
                                        770</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i><?= __('Email', 'viola') ?>: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer  -->

<!-- Start copyright  -->
<div class="footer-copyright">
    <p class="footer-company">All Rights Reserved. &copy; 2021 <a href="#"><?= wp_title() ?></a> Design By :
        <a href="<?php echo wp_get_theme()->get('AuthorURI') ?>"><?php echo wp_get_theme()->get('Author') ?></a></p>
</div>
<!-- End copyright  -->

<a href="#" id="back-to-top" title="<?= __('Back to top') ?>" style="display: none;">&uarr;</a>

<?php wp_footer(); ?>

</body>
</html>
