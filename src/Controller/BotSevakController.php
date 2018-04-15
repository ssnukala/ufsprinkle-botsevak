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
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

class BotSevakController extends SimpleController {

protected $botman;
protected $config = ['web' => [ 'matchingData' => ['driver' => 'web'] ] ];

  public function setupBotMan(){

    // Load the driver(s) you want to use
    DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
//      DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);

    // Create an instance
//      BotManFactory::create($config);
    $this->botman = BotManFactory::create($this->config);
    // Start listening
    $this->botman->listen();
  }
  public function botmanResponses(){

    // Load the driver(s) you want to use
    $this->botman->hears('hello', function (BotMan $bot) {
        $bot->reply('Hello yourself.');
    });

    $this->botman->hears('call me {name}', function ($bot, $name) {
        $bot->reply('Your name is: '.$name);
    });

    $this->botman->hears('I want ([0-9]+)', function ($bot, $number) {
        $bot->reply('You will get: '.$number);
    });

    $this->botman->fallback(function($bot) {
        $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
    });
    // Start listening
    $this->botman->listen();
  }
    /**
     * Renders the Chat iFrame page for BotMan
     *
     */
    public function pageChat($request, $response, $args) {
      $this->setupBotMan();
      // Create BotMan instance
      return $this->ci->view->render($response, "pages/botsevak-iframe.html.twig", [
                    'info' => [
                        'environment' => $this->ci->environment,
                        'path' => [
                            'project' => \UserFrosting\ROOT_DIR
                        ]
                    ]
        ]);
    }
    public function chatResponse($request, $response, $args) {
      $this->setupBotMan();
      $this->botmanResponses();
    }
}
