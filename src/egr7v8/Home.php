<?php

namespace egr7v8;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\scheduler\CallbackTask;
use pocketmine\Server;

class Home extends PluginBase implements Listener {

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this); 
    $this->getServer()->getScheduler()->scheduleRepeatingTask(new CallbackTask([$this, "scoreboard"]), 5);
    $this->EconomyS = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
    $this->getLogger()->info("§l§2plugin enabled!");
  }

  public function scoreboard(){
    foreach($this->getServer()->getOnlinePlayers() as $p){
      $player = $p->getPlayer()->getName();
      $m = $this->EconomyS->mymoney($player);
      $o = count(Server::getInstance()->getOnlinePlayers());
      $f = $this->getServer()->getMaxPlayers(); 
      $TPS = $this->getServer()->getTicksPerSecond();
      $p->sendTip("\n\n§l§1Money: $m §l§6Online: $o/$f §l§2TPS: $TPS");
    }
  }

  public function onDisable(){
    $this->getLogger()->info("§l§7plugin disabled!");
  }
}
