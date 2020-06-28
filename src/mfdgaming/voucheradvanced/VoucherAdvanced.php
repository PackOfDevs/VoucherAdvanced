<?php

namespace mfdgaming\voucheradvanced;

use mfdgaming\voucheradvanced\command\GenerateCodeCommand;
use mfdgaming\voucheradvanced\command\RedeemCodeCommand;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class VoucherAdvanced extends PluginBase {
	public $prefix = "> ";

	public function onEnable() {
		$this->getLogger()->info($this->prefix . "Enabled!");
		$dataFolder = $this->getDataFolder();
		if(!is_dir($dataFolder)) {
			@mkdir($dataFolder);
		}
		$this->saveDefaultConfig();
		$this->config = (new Config($dataFolder.'config.yml', Config::YAML))->getAll();
		$this->codes = new Config($dataFolder.'codes.yml', Config::YAML);
		$this->economy = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		$this->registerCommands();
		if($this->economy == null) {
			$this->getLogger->alert($prefix . "EconomyAPI not out! Disabling...");
			$this->getPluginLoader()->disablePlugin($this);
		}
	}
	
	public function registerCommands() {
		$commands = [new GenerateCodeCommand($this), new RedeemCodeCommand($this)];
		foreach($commands as $command) {
			$this->getServer()->getCommandMap()->register("command", $command);
		}
	}
}
