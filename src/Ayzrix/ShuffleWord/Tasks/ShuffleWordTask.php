<?php

/***
 *       _____ _            __  __ _   __          __           _
 *      / ____| |          / _|/ _| |  \ \        / /          | |
 *     | (___ | |__  _   _| |_| |_| | __\ \  /\  / /__  _ __ __| |
 *      \___ \| '_ \| | | |  _|  _| |/ _ \ \/  \/ / _ \| '__/ _` |
 *      ____) | | | | |_| | | | | | |  __/\  /\  / (_) | | | (_| |
 *     |_____/|_| |_|\__,_|_| |_| |_|\___| \/  \/ \___/|_|  \__,_|
 *
 *
 */

namespace Ayzrix\ShuffleWord\Tasks;

use Ayzrix\ShuffleWord\Main;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class ShuffleWordTask extends Task  {

    public function onRun(int $currentTick) {
        $words = Main::getInstance()->getConfig()->get("words");
        $word = $words[array_rand($words)];
        Main::$word = $word;
        $broadcast = Main::getInstance()->getConfig()->get("broadcast");
        $broadcast = str_replace("{word}", str_shuffle($word), $broadcast);
        Server::getInstance()->broadcastMessage($broadcast);
    }
}
