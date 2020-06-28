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
		parent::__construct("generatecode", $owner);
		$this->setDescription("Generate Code Command");
		$this->setAliases(["gencode"]);
		$this->setPermission("use.voucheradvanced.generatecode");
		$this->plugin = $owner;
	}
	public function execute(CommandSender $sender, $currentAlias, array $args) {
		if(!$this->testPermission($sender)){
			$sender->sendMessage(TextFormat::RED . "You dont have the permition to execute this command");
			return true;
		}
		$code = substr(str_shuffle(str_repeat("QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890", 9)), 0, 9);
		$allCodes = $this->plugin->codes->get("codes", []);
		$newCodeToArray = array($code);
		$codeArray = array_merge($newCodeToArray, $allCodes);
		$this->plugin->codes->set("codes", $codeArray);
		$this->plugin->codes->save();
		$sender->sendMessage(TextFormat::GREEN . "The giftcode " . $code . " has been generated!");
	}
}
