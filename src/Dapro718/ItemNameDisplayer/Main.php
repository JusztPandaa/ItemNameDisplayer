<?php

declare(strict_types=1);

namespace Dapro718\ItemNameDisplayer;

use pocketmine\plugin\PluginBase;
use pocketmine\entity\object\Item;
use pocketmine\utils\Config;

class Main extends PluginBase {
  
  public $config;
  
  public function onEnable() {
    $this->config = $this->getConfig();
    $this->getServer()->getPluginManager()->registerEvents(new NameDisplayer($this), $this);
  }
  
  public function setItemDisplayName($item) {
    if($item->hasCustomName()) {
      $name = $item->getCustomName();
      $format = $this->config->get("display-format");
      $displayName = str_replace("{name}", $name, $format);
      return $displayName;
    } else {
      $name = $item->getNameTag();
      $format = $this->config->get("display-format");
      $displayName = str_replace("{name}", $name, $format);
      return $displayName;
    }
  }
  
  public function displayName($item, $displayName) {
    $item->setNameTagVisible(true);
    $item->setNameTagAlwaysVisible(true);
    $item->setNameTag($displayName);
  }
}
