<div class="wrap">
    <h2><?php _e('Cyclops help', 'cyclops'); ?></h2>
    <p>This theme has been developed from the Runwiz theme, Bootstrap Basic4, so this help page is taken from their instructions.</p>
    <h3><?php _e('Menu', 'cyclops'); ?></h3>
    <p><?php _e('To display menu correctly, please create at least 1 menu and set as primary and save.', 'cyclops'); ?></p>

    <h3><?php _e('Bootstrap features', 'cyclops'); ?></h3>
    <p><?php 
    /* translators: %1$s: Open link, %2$s: Close link */
    echo sprintf(__('This theme can use all Bootstrap 4 classes, elements and styles. Please read the %1$sBootstrap 4 document%2$s.', 'cyclops'), '<a href="https://getbootstrap.com/docs/4.0" target="bootstrap4_doc">', '</a>'); 
    ?></p>

    <h3><?php _e('Responsive image', 'cyclops'); ?></h3>
    <p><?php 
    /* translators: %s: Example code. */
    echo sprintf(__('For responsive image please add img-fluid class to img element. Example: %s', 'cyclops'), '<code>&lt;img src=&quot;...&quot; alt=&quot;&quot; class=&quot;img-fluid&quot;&gt;</code>'); 
    ?></p>

    <h3><?php _e('Responsive video', 'cyclops'); ?></h3>
    <p><?php 
    /* translators: %s: Example code. */
    echo sprintf(__('Cloak video element (video element or embeded video) with %s.', 'cyclops'), '<code>&lt;div class=&quot;flexvideo&quot;&gt;...&lt;/div&gt;</code>'); 
    ?></p>

    <h3><?php _e('Support older Internet Explorer (IE)', 'cyclops'); ?></h3>
    <p><?php 
    /* translators: %1$s: Link to Bootstrap IE8, %2$s: @Coliff name */
    echo sprintf(__('This theme may not work in very old versions of Internet Explorer. If you have the need to support such a browser, use the original Bootstrap Basic4 theme, create a child theme, and use this css (%1$s) created by %2$s.', 'cyclops'), '<a href="https://github.com/coliff/bootstrap-ie8" target="bs4ie">https://github.com/coliff/bootstrap-ie8</a>', '@Coliff') 
    ?></p>
    
    <h3><?php _e('Font Awesome features', 'cyclops'); ?></h3>
    <p><?php 
    /* translators: %1$s: Open link, %2$s: Close link */
    echo sprintf(__('This theme comes with Font Awesome 5, please read the %1$sFont Awesome document%2$s for icon classes and features.', 'cyclops'), '<a href="https://fontawesome.com/" target="fontawesome5_doc">', '</a>'); 
    ?></p>

    <h3><?php _e('Bootstrap Basic4 Change log', 'cyclops'); ?></h3>
    <p>
        <?php 
        /* translators: %1$s: Open link, %2$s: Close link */
        echo sprintf(__('You can see what was changed in each version or each commits on our %1$sGithub page%2$s.', 'cyclops'), '<a href="https://github.com/Rundiz-WP/cyclops" target="bb4_commits">', '</a>'); 
        ?> 
        <?php _e('You can also see it on changelog.md file that come with the theme.', 'cyclops'); ?> 
    </p>

    <?php do_action('bootstrap_basic4_theme_help_content'); ?>

    
</div>