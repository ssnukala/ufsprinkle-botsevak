# ufsprinkle-botsevak
BotMan Sprinkle for User Frosting
Sprinkle under construction, please check back in a little bit

## This is still WIP - have a show stopper to resolve before this is operational
https://github.com/botman/web-widget/issues/11 BotMan Issue #11 that needs to be fixed for BotSevak
https://github.com/ssnukala/ufsprinkle-botsevak/issues/1 issue #1 to be resolved

## To install the sprinkle
1. go to you `app/sprinkles` directory
2. run the following command `git submodule add -b master git@github.com:ssnukala/ufsprinkle-botsevak BotSevak`
3. Edit sprinkles.json and add "BotSevak" to the sprinkles list
4. Run `composer update`
5. Run `php bakery bake`

Then just launch your UserFrosting application page and you will see a chat icon like a message on the bottom right. Click on that icon and it will launch the chat window.
