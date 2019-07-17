<?php


namespace uramnoil\smartform;


use Frago9876543210\EasyForms\forms\MenuForm;
use pocketmine\block\Button;
use pocketmine\form\Form;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use uramnoil\smartform\form\element\FormButton;

class SmartFormPlugin extends PluginBase implements ISmartFormManager {
	/** @var IFormFactory[] */
	private $factories = [];

	public function getSmartFormManager() : ISmartFormManager {
		return $this;
	}

	public function createSmartForm(): Form {
		/** @var FormButton[] $buttons */
		$buttons = [];
		foreach($this->factories as $factory) {
			$buttons[] = new FormButton($factory->getName(), $factory->getTitle(), null, $factory->createForm());
		}
		return new MenuForm("SmartForm", null, $buttons, function(Player $player, Button $selected) : void {
			if($selected instanceof FormButton) {
				$player->sendForm($selected->getForm());
			}
		});
	}

	public function registerFactory(IFormFactory $factory) : void {
		$form[$factory->getName()] = $factory;
	}
}