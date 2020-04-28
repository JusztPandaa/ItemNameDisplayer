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
  public $entity;
  
  public function __construct(Main $plugin) {
    $this->plugin = $plugin;
    $this->config = $plugin->getConfig();
  }
  
  public function onItemDrop(ItemSpawnEvent $event) {
    $this->entity = $event->getEntity();
    $item = $entity->getItem();
    $id = $item->getId();
    $disabledItems = $this->config->get("disabled-items");
    if(!in_array($id, $disabledItems, true)) {
      $this->plugin->displayName($entity);
    }
  }
  
  public function onPlayerItemDrop(PlayerDropItemEvent $event) {
    $item = $event->getItem();
    $id = $item->getId();
    $disabledItems = $this->config->get("disabled-items");
    if(!in_array($id, $disabledItems, true)) {
      $this->plugin->displayName($this->entity);
    }
  }
}
