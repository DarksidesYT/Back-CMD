<?php

namespace darksidesyt\Back;

use darksidesyt\Back\Commands\Back;
use darksidesyt\Back\Listener\PlayerDeathListener;
use darksidesyt\Back\Listener\PlayerQuitListener;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase implements Listener {

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TF::BLUE . "Plugin Back CMD on");
        $this->getServer()->getPluginManager()->registerEvents(new PlayerDeathListener($this), $this);
        $this->getServer()->getPluginManager()->registerEvents(new PlayerQuitListener($this), $this);
        $this->getServer()->getCommandMap()->register("back", new Back($this));
    }
}
