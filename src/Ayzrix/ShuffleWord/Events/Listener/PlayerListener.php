<?php

namespace Ayzrix\ShuffleWord\Events\Listener;

use Ayzrix\ShuffleWord\Main;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\Server;

class PlayerListener implements Listener {

    public function PlayerChat(PlayerChatEvent $event) {
        $player = $event->getPlayer();
        $message = $event->getMessage();
        if (Main::$word !== "") {
            if ($message === Main::$word) {
                $broadcast = Main::getInstance()->getConfig()->get("broadcast_win");
                $broadcast = str_replace(["{player}", "{word}"], [$player->getName(), Main::$word], $broadcast);
                Server::getInstance()->broadcastMessage($broadcast);
                foreach (Main::getInstance()->getConfig()->get("rewards") as $command) {
                    $command = str_replace("{player}", $player->getName(), $command);
                    var_dump($command);
                    Server::getInstance()->getCommandMap()->dispatch(new ConsoleCommandSender(), $command);
                }
                Main::$word = "";
            }
        }
    }
}
