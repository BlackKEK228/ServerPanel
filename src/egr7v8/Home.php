<?php

namespace egr7v8;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Home extends PluginBase implements Listener {

  const prefix = "§3• §c";

  public function onEnable(){
    $this->getLogger()->info(Home::prefix."Плагин активирован");
  }

  public function onDisable(){
    $this->getLogger()->info(Home::prefix."Плагин деактивирован");
  }
}
