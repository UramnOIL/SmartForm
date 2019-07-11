<?php


namespace uramnoil\smartform;


use pocketmine\form\Form;
use pocketmine\plugin\PluginBase;

class SmartFormPlugin extends PluginBase implements ISmartFormManager {
	/** @var Form[] */
	private iterable $forms = [];

	public function getSmartFormManager() : ISmartFormManager {
		return $this;
	}

	public function createSmartForm(): Form {

	}

	public function registerFactory(IFormFactory $factory) : void {
		$form[$factory->getName()] = $factory;
	}
}