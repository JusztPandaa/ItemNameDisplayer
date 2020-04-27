<?php

declare(strict_types=1);

namespace Dapro718\ItemNameDisplayer;

use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\event
use pocketmine\utils\Config

class NameDisplayer implements Listener {
  
  public $config;
  public $plugin;
  
  public function __construct(Main $plugin) {
    $this->plugin = $plugin;
    $this->config = $plugin->getConfig();
  }
  
  public function onItemDrop(ItemSpawnEvent $event) {
    $item = $event->getItem();
    $id = $item->getId();
    $disabledItems = $this->config->get("disabled-items");
    if(!in_array($id, $disabledItems, TRUE)) {
      $displayName = $this->plugin->setItemDisplayName($item);
      $this->plugin->setItemDisplay();
    }
  }
}
