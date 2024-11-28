<?php
    $matomoURL = get_option('matomoURL');
    $matomoSiteId = get_option('matomoSiteId');
    $view = get_view();
?>

<div class="field">
    <div class="two columns alpha">
        <?php echo get_view()->formLabel('matomo-url', __('Matomo URL')); ?>
    </div>
    <div class="inputs five columns omega">
        <p class="explanation">
            <?php echo __('This is the Matomo server URL.'); ?>
        </p>
        <?php echo get_view()->formText('matomo-url', $matomoURL); ?>
    </div>
    <div class="two columns alpha">
        <?php echo get_view()->formLabel('matomo-site-id', __('Matomo Site Id')); ?>
    </div>
    <div class="inputs five columns omega">
        <p class="explanation">
            <?php echo __('This is the site ID for this omeka instance.'); ?>
        </p>
        <?php echo get_view()->formText('matomo-site-id', $matomoSiteId); ?>
    </div>
</div>