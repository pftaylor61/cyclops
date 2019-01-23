<?php
/**
 * The right sidebar.
 * 
 * @package cyclops
 */


global $ocws_cyclops_sidebar_right_size;
if ($ocws_cyclops_sidebar_right_size == null || !is_numeric($ocws_cyclops_sidebar_right_size)) {
    $ocws_cyclops_sidebar_right_size = 3;
}

if (is_active_sidebar('sidebar-right')) {
?> 
                <div id="sidebar-right" class="col-md-<?php echo $ocws_cyclops_sidebar_right_size; ?>">
                    <?php do_action('before_sidebar'); ?> 
                    <?php dynamic_sidebar('sidebar-right'); ?> 
                </div>
<?php
}