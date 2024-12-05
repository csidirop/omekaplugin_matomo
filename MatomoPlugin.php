<?php
/**
 * A simple integration of the matomo service
 * 
 * @package Matomo
 * @copyright Copyright 2024, Christos Sidiropoulos
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 or any later version
 */
class MatomoPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = [
        'config',
        'config_form',
        'public_head',
    ];

    /**
     * Display the configuration form.
     */
    public function hookConfigForm(): void
    {
        include 'views/admin/config-form.php';
    }

    /**
     * Process the configuration form submission.
     */
    public function hookConfig($args): void
    {
        // Mandatory parameter:
        set_option('matomoURL', trim($args['post']['matomo-url']));
        set_option('matomoSiteId', trim($args['post']['matomo-site-id']));
        // Optional parameter:
        set_option('trackingAllSubdomains', trim($args['post']['tracking-all-subdomains']));
        set_option('trackingGroupByDomain', trim($args['post']['tracking-group-by-domain']));
        set_option('trackingAllAliases', trim($args['post']['tracking-all-aliases']));
        set_option('trackingNoscript', trim($args['post']['tracking-noscript']));
        set_option('trackingVisitorCvCheck', [
            "NAME" => trim($args['post']['tracking-visitor-cv-check-NAME']),
            "VALUE" => trim($args['post']['tracking-visitor-cv-check-VALUE'])
        ]); // TODO up to five!
        set_option('trackingDoNotTrack', trim($args['post']['tracking-do-not-track']));
        set_option('trackingDisableCookies', trim($args['post']['tracking-do-not-track']));
        set_option('trackingRequireConsentForCampaignTracking', trim($args['post']['tracking-require-consent-for-campaign-tracking']));
        set_option('trackingCustomCampaignQueryParamsCheck', trim($args['post']['tracking-custom-campaign-query-params-check']));
    }

    /**
     * Adds the motomo snipped to every public page head
     * 
     * @param mixed $args
     * @return void
     */
    public function hookPublicHead($args): void
    {
        // Additional parameter:
        queue_js_string("matomoURL = '" . get_option('matomoURL') . "';");
        queue_js_string("matomoSiteId = '" . get_option('matomoSiteId') . "';");
        queue_js_string("domain = '" . "TODO" . "';"); //TODO get domain

        queue_js_string("trackingAllSubdomains = '" . get_option('trackingAllSubdomains') . "';");
        queue_js_string("trackingGroupByDomain = '" . get_option('trackingGroupByDomain') . "';");
        queue_js_string("trackingAllAliases = '" . get_option('trackingAllAliases') . "';");
        queue_js_string("trackingNoscript = '" . get_option('trackingNoscript') . "';");
        queue_js_string("trackingVisitorCvCheck = '" . implode(";", (array)get_option('trackingVisitorCvCheck')) . "';");
        queue_js_string("trackingDoNotTrack = '" . get_option('trackingDoNotTrack') . "';");
        queue_js_string("trackingDisableCookies = '" . get_option('trackingDisableCookies') . "';");
        queue_js_string("trackingRequireConsentForCampaignTracking = '" . get_option('trackingRequireConsentForCampaignTracking') . "';");
        queue_js_string("trackingCustomCampaignQueryParamsCheck = '" . get_option('trackingCustomCampaignQueryParamsCheck') . "';");

        // Main js-file:
        queue_js_file('matomo');
    }
}