<?php

declare(strict_types=1);

namespace Dapro718\ItemNameDisplayer;

use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\event\entity\ItemSpawnEvent;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\utils\Config;
use Dapro718\ItemNameDisplayer\Main;

class NameDisplayer implements Listener {
  
  public $config;
  public $plugin;
  
  public function __construct(Main $plugin) {
    $this->plugin = $plugin;
    $this->config = $plugin->getConfig();
  }
  
  public function onItemDrop(ItemSpawnEvent $event) {
    $entity = $event->getEntity();
    $lvl = $entity->getLevel();
    $level = $lvl->getName();
    $item = $entity->getItem();
    $count = $item->getCount();
    $id = $item->getId();
    $disabledWorlds = $this->config->get("disabled-worlds");
    $disabledItems = $this->config->get("disabled-items");
    $name = $item->getName();
    $format = $this->config->get("display-format");
    if(!in_array($level, $disabledWorlds, TRUE)) {
      if(!in_array($id, $disabledItems, TRUE)) {
        if(strpos($format, "{name}") !== false) {
          $format = str_replace("{name}", $name, $format);
        }
        if(strpos($format, "{count}") !== false) {
          $format = str_replace("{count", $count, $format);
        }
        $entity->setNameTag($format);
        $entity->setNameTagVisible(true);
        $entity->setNameTagAlwaysVisible(true);
      }
    }
  }
}
