<?php

namespace mfdgaming\voucheradvanced;

use pocketmine\plugin\PluginBase;

class VoucherAdvanced extends PluginBase {
	public $prefix = "> ";

	public function onEnable() {
		$this->getLogger()->info($this->prefix . "Enabled!");
	}
}
