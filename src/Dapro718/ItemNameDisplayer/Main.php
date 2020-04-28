<?php

declare(strict_types=1);

namespace Dapro718\ItemNameDisplayer;

use pocketmine\plugin\PluginBase;
use pocketmine\entity\object\ItemEntity;
use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\item\ItemBlock;
use pocketmine\utils\Config;


class Main extends PluginBase {
  
  public $config;
  
  public function onEnable() {
    $this->config = $this->getConfig();
    $this->getServer()->getPluginManager()->registerEvents(new NameDisplayer($this), $this);
  }
  
  public function displayName($entity) {
    $entity->setNameTagVisible(true);
    $entity->setNameTagAlwaysVisible(true);
  }
}
