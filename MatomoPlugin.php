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

        debug(trim($args['post']['tracking-group-by-domain']));

        if (trim($args['post']['tracking-group-by-domain'])) {
            debug("true");
        } else {
            debug("false");
        }
    }

    /**
     * Adds the motomo snipped to every public page head
     * 
     * @param mixed $args
     * @return void
     */
    public function hookPublicHead($args): void 
    {
        queue_js_string("matomoURL = '". get_option('matomoURL') ."';");
        queue_js_string("matomoSiteId = '". get_option('matomoSiteId') ."';");

        queue_js_string("trackingAllSubdomains = '". get_option('trackingAllSubdomains') ."';");

        queue_js_file('matomo');
    }
}