<?php
    $siteTitle = option('site_title');
    $domain = parse_url(absolute_url('/'), PHP_URL_HOST);
    $view = get_view();

    // Options:
    $matomoURL = get_option('matomoURL');
    $matomoSiteId = get_option('matomoSiteId');
    $trackingAllSubdomains = get_option('trackingAllSubdomains');
    $trackingGroupByDomain = get_option('trackingGroupByDomain');
    $trackingAllAliases = get_option('trackingAllAliases');
    $trackingNoscript = get_option('trackingNoscript');
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
                <?php echo __('Track visitors across all subdomains of %s </br>', $siteTitle); ?>
                <?php echo __('So if one visitor visits x.%s and y.%s, they will be counted as a unique visitor.', $domain, $domain); ?>
            </p>
            <?php echo $view->formCheckbox('tracking-all-subdomains', true, null, $trackingAllSubdomains ? [true] : [false]); ?>
        </div>
    </div>
    <div class="tracking-group-by-domain">
        <div class="two columns alpha">
            <?php echo $view->formLabel('tracking-group-by-domain', __('Prepend Site Domain to Page Title')); ?>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">
                <?php echo __('Prepend the site domain to the page title when tracking</br>'); ?>
                <?php echo __('So if someone visits the \'About\' page on blog.%s it will be recorded as \'blog / About\'. This is the easiest way to get an overview of your traffic by sub-domain.' , $domain); ?>
            </p>
            <?php echo $view->formCheckbox('tracking-group-by-domain', true , null, $trackingGroupByDomain ? [true] : [false]); ?>
        </div>
    </div>
    <div class="tracking-all-aliases">
        <div class="two columns alpha">
            <?php echo $view->formLabel('tracking-all-aliases', __('Hide Alias URL Clicks in Outlinks Report')); ?>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">
                <?php echo __('In the "Outlinks" report, hide clicks to known alias URLs of this site</br>'); ?>
                <?php echo __('So clicks on links to Alias URLs (eg. x.%s) will not be counted as "Outlink".' , $domain); ?>
            </p>
            <?php echo $view->formCheckbox('tracking-all-aliases', true , null, $trackingGroupByDomain ? [true] : [false]); ?>
        </div>
    </div>
    <div class="tracking-noscript">
        <div class="two columns alpha">
            <?php echo $view->formLabel('tracking-noscript', __('Track Users Without JavaScript')); ?>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">
                <?php echo __('Track users with JavaScript disabled</br>'); ?>
            </p>
            <?php echo $view->formCheckbox('tracking-noscript', true , null, $trackingNoscript ? [true] : [false]); ?>
        </div>
    </div>
</div>
