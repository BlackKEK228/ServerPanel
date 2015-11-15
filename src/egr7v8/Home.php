<?php

namespace egr7v8;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Home extends PluginBase implements Listener {

  const prefix = "§3• §c";

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this); 
    $this->EconomyS = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
    $this->getServer()->getScheduler()->scheduleRepeatingTask(new CallbackTask(array($this,"panel")),5);
    $this->getLogger()->info(Home::prefix."Плагин активирован");
  }

  public function scoreboard(){
    foreach($this->getServer()->getOnlinePlayers() as $p){
      $player = $p->getPlayer()->getName();
      $m = $this->EconomyS->mymoney($player);
      $o = count(Server::getInstance()->getOnlinePlayers());
      $f = $this->getServer()->getMaxPlayers(); 
      $TPS = $this->getServer()->getTicksPerSecond();
    $p->sendTip("\n\n\n§3Баланс:§6 $m §3Онлаин:§2 $o §0/§4 $f §3TPS:§d $TPS");
  }

  public function onDisable(){
    $this->getLogger()->info(Home::prefix."Плагин деактивирован");
  }
}
