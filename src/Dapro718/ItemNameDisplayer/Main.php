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
  private const CONFIG_VERSION = 2;
  
  public function onEnable() {
    $this->config = $this->getConfig();
    $this->getServer()->getPluginManager()->registerEvents(new NameDisplayer($this), $this);
    $this->checkConfig();
  }
  
  public function checkConfig() {
    if ((!$this->getConfig()->exists("config-version")) || ($this->getConfig()->get("config-version") != self::CONFIG_VERSION)) {
      rename($this->getDataFolder() . "config.yml", $this->getDataFolder() . "config_old.yml");
      $this->saveResource("config.yml");
      $this->getLogger()->critical("Your configuration file is outdated.");
      $this->getLogger()->notice("Your old configuration has been saved as config_old.yml and a new configuration file has been generated. Please update accordingly.");
    }
  }
}
