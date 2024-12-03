<?php
    $matomoURL = get_option('matomoURL');
    $matomoSiteId = get_option('matomoSiteId');
    $view = get_view();
?>

<div class="field">
    <div><h2>Main Options</h2></div>
    <div><p>These options are mandatory and must be set.</p></div>
    <div class="matomo-url">
        <div class="two columns alpha">
            <?php echo $view->formLabel('matomo-url', __('Matomo URL')); ?>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">
                <?php echo __('This is the Matomo server URL.'); ?>
            </p>
            <?php echo $view->formText('matomo-url', $matomoURL); ?>
        </div>
    </div>
    <div class="matomo-site-id">
        <div class="two columns alpha">
            <?php echo $view->formLabel('matomo-site-id', __('Matomo Site Id')); ?>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">
                <?php echo __('This is the site ID for this omeka instance.'); ?>
            </p>
            <?php echo $view->formText('matomo-site-id', $matomoSiteId); ?>
        </div>
    </div>
</div>