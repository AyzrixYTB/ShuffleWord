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

namespace Ayzrix\ShuffleWord;

use Ayzrix\ShuffleWord\Events\Listener\PlayerListener;
use Ayzrix\ShuffleWord\Tasks\ShuffleWordTask;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    /** @var Main $instance */
    private static $instance = null;

    /** @var string $word */
    public static $word = "";

    public function onEnable() {
        self::$instance = $this;
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents(new PlayerListener(), $this);
        $this->getScheduler()->scheduleRepeatingTask(new ShuffleWordTask(), 20*$this->getConfig()->get("timer"));
    }

    /**
     * @return Main
     */
    public static function getInstance(): Main {
        return self::$instance;
    }
}
