<?php

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
