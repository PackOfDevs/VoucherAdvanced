<?php

namespace mfdgaming\voucheradvanced\command;

use mfdgaming\voucheradvanced\VoucherAdvanced as Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class GenerateCodeCommand extends PluginCommand {
	public function __construct(Main $owner) {
		parent::__construct("redeemcode", $owner);
		$this->setDescription("Redeem Code Command");
		$this->plugin = $owner;
	}
	public function execute(CommandSender $sender, $currentAlias, array $args) {
		if($sender instanceof Player) {
			return;
		} else {
	}
}
