<?php
/**
 * Helper - BotSevak
 *
 * @link      https://github.com/ssnukala/ufsprinkle-botsevak
 * @copyright Copyright (c) 2013-2016 Srinivas Nukala
 */


$app->get('/chat','UserFrosting\Sprinkle\BotSevak\Controller\BotSevakController:pageChat');
$app->post('/chat','UserFrosting\Sprinkle\BotSevak\Controller\BotSevakController:chatResponse');
