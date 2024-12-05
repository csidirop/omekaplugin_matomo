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
    $trackingVisitorCvCheck = (array) get_option('trackingVisitorCvCheck'); //TODO
    $trackingDoNotTrack = get_option('trackingDoNotTrack');
    $trackingDisableCookies = get_option('trackingDisableCookies');
    $trackingRequireConsentForCampaignTracking = get_option('trackingRequireConsentForCampaignTracking');
    $trackingCustomCampaignQueryParamsCheck =  (array) get_option('trackingCustomCampaignQueryParamsCheck'); //TODO
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
    <div><p>These options are optional and can be left blank or used in part.</p></div>
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
            <?php echo $view->formCheckbox('tracking-all-aliases', true , null, $trackingAllAliases ? [true] : [false]); ?>
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
    <!-- <div class="tracking-visitor-cv-check">
        <div class="two columns alpha">
            <?php echo $view->formLabel('tracking-visitor-cv-check', __('Track Visitor Custom Variables')); ?>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">
                <?php echo __('Track custom variables for this visitor.</br>'); ?>
                <?php echo __('For example, with variable name "Type" and value "Customer".</br>'); ?>
            </p>
            <?php echo $view->formText('tracking-visitor-cv-check-NAME', $trackingVisitorCvCheck["NAME"]); ?>
            <?php echo $view->formText('tracking-visitor-cv-check-VALUE', $trackingVisitorCvCheck["VALUE"]); ?>
        </div>
    </div> -->
    <div class="tracking-do-not-track">
        <div class="two columns alpha">
            <?php echo $view->formLabel('tracking-do-not-track', __('Enable Client-Side DoNotTrack')); ?>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">
                <?php echo __('Enable client side DoNotTrack detection.</br>'); ?>
                <?php echo __('So tracking requests will not be sent if visitors do not wish to be tracked.</br>'); ?>
            </p>
            <?php echo $view->formCheckbox('tracking-do-not-track', true , null, $trackingDoNotTrack ? [true] : [false]); ?>
        </div>
    </div>
    <div class="tracking-disable-cookies">
        <div class="two columns alpha">
            <?php echo $view->formLabel('tracking-disable-cookies', __('Disable tracking cookies')); ?>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">
                <?php echo __('Disable all tracking cookies.</br>'); ?>
                <?php echo __('Disables all first party cookies. Existing Matomo cookies for this website will be deleted on the next pageview.</br>'); ?>
            </p>
            <?php echo $view->formCheckbox('tracking-disable-cookies', true , null, $trackingDisableCookies ? [true] : [false]); ?>
        </div>
    </div>
    <div class="tracking-require-consent-for-campaign-tracking">
        <div class="two columns alpha">
            <?php echo $view->formLabel('tracking-require-consent-for-campaign-tracking', __('Disable Campaign Parameters Tracking')); ?>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">
                <?php echo __('Disable Campaign Parameters Tracking.</br>'); ?>
                <?php echo __('When this option is checked, Matomo will not track campaign parameters and they will be removed from the tracked URLs.</br>'); ?>
            </p>
            <?php echo $view->formCheckbox('tracking-require-consent-for-campaign-tracking', true , null, $trackingRequireConsentForCampaignTracking ? [true] : [false]); ?>
        </div>
    </div>
    <!-- <div class="tracking-custom-campaign-query-params-check">
        <div class="two columns alpha">
            <?php echo $view->formLabel('tracking-custom-campaign-query-params-check', __('Custom Query Parameters for Campaigns')); ?>
        </div>
        <div class="inputs five columns omega">
            <p class="explanation">
                <?php echo __('Use custom query parameter names for the campaign name and keyword.</br>'); ?>
                <?php echo __('Note: Matomo will automatically detect Google Analytics parameters.</br>'); ?>
            </p>
            <?php echo $view->formText('tracking-custom-campaign-query-params-check-NAME', $trackingCustomCampaignQueryParamsCheck["NAME"]); ?>
            <?php echo $view->formText('tracking-custom-campaign-query-params-check-VALUE', $trackingCustomCampaignQueryParamsCheck["VALUE"]); ?>
        </div>
    </div> -->
</div>
