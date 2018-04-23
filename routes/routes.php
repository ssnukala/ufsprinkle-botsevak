<?php
/**
 * Helper - BotSevak
 *
 * @link      https://github.com/ssnukala/ufsprinkle-botsevak
 * @copyright Copyright (c) 2013-2016 Srinivas Nukala
 */

$app->get('/botsevak', 'UserFrosting\Sprinkle\BotSevak\Controller\BotSevakController:pageBotSevak');
$app->post('/botsevak', 'UserFrosting\Sprinkle\BotSevak\Controller\BotSevakController:chatResponse');
