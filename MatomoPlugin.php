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
        queue_js_string("matomoURL = '". get_option('matomoURL') ."';");
        queue_js_string("matomoSiteId = '". get_option('matomoSiteId') ."';");
        queue_js_string("domain = '". "TODO" ."';"); //TODO get domain

        queue_js_string("trackingAllSubdomains = '". get_option('trackingAllSubdomains') ."';");
        queue_js_string("trackingGroupByDomain = '". get_option('trackingGroupByDomain') ."';");
        queue_js_string("trackingAllAliases = '". get_option('trackingAllAliases') ."';");
        queue_js_string("trackingNoscript = '". get_option('trackingNoscript') ."';");

        // Main js-file:
        queue_js_file('matomo');
    }
}