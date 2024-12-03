<?php
    $siteTitle = option('site_title');
    $domain = parse_url(absolute_url('/'), PHP_URL_HOST);
    $view = get_view();

    // Options:
    $matomoURL = get_option('matomoURL');
    $matomoSiteId = get_option('matomoSiteId');
    $trackingAllSubdomains = get_option('trackingAllSubdomains');
    $trackingGroupByDomain = get_option('trackingGroupByDomain');
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

<div class="field">
    <div><h2>Additional Options</h2></div>
    <div><p>These options are optional and can be left blank or partially used.</p></div>
    <div class="tracking-all-subdomains">
        <div class="two columns alpha">
            <?php echo $view->formLabel('tracking-all-subdomains', __('Track Visitors Across Subdomains')); ?>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">
                <?php echo __('Track visitors across all subdomains of %s', $siteTitle); ?>
            </p>
            <?php echo $view->formCheckbox('tracking-all-subdomains', null , null, array('checked' => (boolean) $trackingAllSubdomains)); ?>
        </div>
    </div>
    <div class="tracking-group-by-domain">
        <div class="two columns alpha">
            <?php echo $view->formLabel('tracking-group-by-domain', __('Track Visitors Across Subdomains')); ?>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">
                <?php echo __('Prepend the site domain to the page title when tracking'); ?>
            </p>
            <?php echo $view->formCheckbox('tracking-group-by-domain', null , null, array('checked' => (boolean) $trackingGroupByDomain)); ?>
        </div>
    </div>
</div>
