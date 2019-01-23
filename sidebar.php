<?php
/**
 * The left sidebar.
 * 
 * @package cyclops
 */


global $ocws_cyclops_sidebar_left_size;
if ($ocws_cyclops_sidebar_left_size == null || !is_numeric($ocws_cyclops_sidebar_left_size)) {
    $ocws_cyclops_sidebar_left_size = 3;
}

if (is_active_sidebar('sidebar-left')) {
?> 
                <div id="sidebar-left" class="col-md-<?php echo $ocws_cyclops_sidebar_left_size; ?>">
                    <?php do_action('before_sidebar'); ?> 
                    <?php dynamic_sidebar('sidebar-left'); ?> 
                </div>
<?php
}