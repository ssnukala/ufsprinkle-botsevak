<?php

/**
 * BotSevak controller
 *
 * @link      https://github.com/ssnukala/ufsprinkle-botsevak
 * @copyright Copyright (c) 2013-2016 Srinivas Nukala
 */

namespace UserFrosting\Sprinkle\BotSevak\Controller;

use Carbon\Carbon;
use UserFrosting\Sprinkle\Core\Controller\SimpleController;
use UserFrosting\Support\Exception\ForbiddenException;
use UserFrosting\Sprinkle\Core\Facades\Debug;

class BotSevakController extends SimpleController {

    /**
     * Renders the Chat iFrame page for BotMan
     *
     */
    public function pageChat($request, $response, $args) {

        return $this->ci->view->render($response, "pages/botsevak-iframe.html.twig", [
                    'info' => [
                        'environment' => $this->ci->environment,
                        'path' => [
                            'project' => \UserFrosting\ROOT_DIR
                        ]
                    ]
        ]);
    }
}
