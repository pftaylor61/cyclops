<?php
/** 
 * The theme footer.
 * 
 * @package cyclops
 */
?>
            </div><!--.site-content-->


            <footer id="site-footer" class="site-footer page-footer">
                <div id="footer-row" class="row">
                    <div class="col-md-6 footer-left">
                        <?php 
                        if (!dynamic_sidebar('footer-left')) {
                            /* translators: %s: WordPress text with link. */
                            printf(__('Powered by %s', 'cyclops'), '<a href="https://classicpress.net" rel="nofollow">ClassicPress</a>');
                            echo ' | ';
                            if (function_exists('the_privacy_policy_link')) {
                                the_privacy_policy_link('', ' | ');
                            }
                            /* translators: %s: Bootstrap Basic 4 text with link. */
                            $ocws_get_theme = wp_get_theme();
                            printf(__('Theme: %s', 'cyclops'), '<a href="https://oldcastle.com" rel="nofollow">'.$ocws_get_theme->get('Name').' v'.$ocws_get_theme->get('Version').'</a>');
                        } 
                        ?> 
                    </div>
                    <div class="col-md-6 footer-right text-right">
                        <?php dynamic_sidebar('footer-right'); ?> 
                    </div>
                </div>
            </footer><!--.page-footer-->
        </div><!--.page-container-->


        <!--wordpress footer-->
        <?php wp_footer(); ?> 
        <!--end wordpress footer-->
    </body>
</html>
