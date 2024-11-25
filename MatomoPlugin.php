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

    protected $_options = [
        'template_option'=>'option_value'
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
        $option = trim($args['post']['template_option']);
        set_option('template_option', $option);
    }

    /**
     * Adds code to every public page head
     * 
     * @param mixed $args
     * @return void
     */
    public function hookPublicHead($args): void 
    {
       // Code
    }
}