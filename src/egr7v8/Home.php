<?php

namespace egr7v8; // udate for english :)

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Home extends PluginBase implements Listener {

  const prefix = "§3• §c"; // msg prefix

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this); 
    $this->EconomyS = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
    $this->getServer()->getScheduler()->scheduleRepeatingTask(new CallbackTask(array($this,"panel")),5);
    $this->getLogger()->info(Home::prefix." plugin enabled");
  }

  public function scoreboard(){
    foreach($this->getServer()->getOnlinePlayers() as $p){
      $player = $p->getPlayer()->getName();
      $m = $this->EconomyS->mymoney($player);
      $o = count(Server::getInstance()->getOnlinePlayers());
      $f = $this->getServer()->getMaxPlayers(); 
      $TPS = $this->getServer()->getTicksPerSecond();
    $p->sendTip("\n\n\n§3Balance:§6 $m §3Online:§2 $o §0/§4 $f §3TPS:§d $TPS");
  }

  public function onDisable(){
    $this->getLogger()->info(Home::prefix." plugin disabled");
  }
}
