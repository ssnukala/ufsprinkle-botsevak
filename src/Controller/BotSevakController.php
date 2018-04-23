<?php

/**
 * BotSevak controller : implements https://botman.io/2.0/web-widget : custom web widget functionality
 *
 * @link      https://github.com/ssnukala/ufsprinkle-botsevak
 * @copyright Copyright (c) 2013-2016 Srinivas Nukala
 *
 */

namespace UserFrosting\Sprinkle\BotSevak\Controller;

use Carbon\Carbon;
use UserFrosting\Sprinkle\Core\Controller\SimpleController;
use UserFrosting\Support\Exception\ForbiddenException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\NotFoundException;
use UserFrosting\Fortress\RequestDataTransformer;
use UserFrosting\Fortress\RequestSchema;
use UserFrosting\Fortress\ServerSideValidator;
use UserFrosting\Fortress\Adapter\JqueryValidationAdapter;
use UserFrosting\Sprinkle\Core\Facades\Debug;

class BotSevakController extends SimpleController
{
    protected $botman;

    protected $config;

    /**
     * [pageBotSevak Opens chat box]
     * @param  [type] $request  request object
     * @param  [type] $response response object
     * @param  [type] $args     input arguements
     * @return [void]           void
     */
    public function pageBotSevak($request, $response, $args)
    {
//        $this->setupBotMan();
        // Create BotMan instance
        return $this->ci->view->render($response, "pages/botsevak.html.twig", [
            'info' => [
                'environment' => $this->ci->environment,
                'path' => [
                    'project' => \UserFrosting\ROOT_DIR
                ]
            ],
            'form' => ['method'=>'post','action'=>'chat']
        ]);
    }

    /**
     * [chatResponse responds to the chat messages]
     * @param  [type] $request  request object
     * @param  [type] $response response object
     * @param  [type] $args     input arguements
     * @return [void]           void
     */

    public function chatResponse($request, $response, $args)
    {
        // Get POST parameters: name, slug, icon, description
        $params = $request->getParsedBody();

        /** @var UserFrosting\Sprinkle\Core\MessageStream $ms */
        $ms = $this->ci->alerts;

        // Load the request schema
        $schema = new RequestSchema('schema://botsevak.yaml');

        // Whitelist and set parameter defaults
        $transformer = new RequestDataTransformer($schema);
        $data = $transformer->transform($params);

        $error = false;

        // Validate request data
        $validator = new ServerSideValidator($schema, $this->ci->translator);
        if (!$validator->validate($data)) {
            $ms->addValidationErrors($validator);
            $error = true;
        }

        Debug::debug("Line 134 Calling the response the data is ", $data);

        $this->botSevakResponses();
//        return $response->withJson($result, 200, JSON_PRETTY_PRINT);
    }

    /**
     * [botSevakResponses description]
     * @return [type] [description]
     */
    public function botSevakResponses($data)
    {
    }
}
