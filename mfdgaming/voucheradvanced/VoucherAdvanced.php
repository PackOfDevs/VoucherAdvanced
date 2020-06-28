<?php

namespace mfdgaming\voucheradvanced;

use mfdgaming\voucheradvanced\command\GenerateCodeCommand;
use mfdgaming\voucheradvanced\command\RedeemCommand;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class VoucherAdvanced extends PluginBase {
	public $prefix = "> ";

	public function onEnable() {
		$this->getLogger()->info($this->prefix . "Enabled!");
		$this->registerCommands();
	}
	
	public function registerCommands() {
		$commands = [new GenerateCodeCommand($this), new RedeemCommand($this)];
		foreach($commands as $command) {
			$this->getServer()->getCommandMap()->register("command", $command);
		}
	}
}
