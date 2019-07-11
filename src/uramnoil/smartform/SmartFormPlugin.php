<?php


namespace uramnoil\smartform;


use Frago9876543210\EasyForms\elements\Button;
use Frago9876543210\EasyForms\forms\MenuForm;
use pocketmine\form\Form;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use RuntimeException;
use uramnoil\smartform\form\element\FormButton;

class SmartFormPlugin extends PluginBase implements ISmartFormManager {
	/** @var IFormFactory[] */
	private $factories = [];

	public function getSmartFormManager() : ISmartFormManager {
		return $this;
	}

	public function createSmartForm(): Form {
		$form = new MenuForm("SmartForm", null, null,
			function(Player $player, Button $selected) : void {
				if(!$selected instanceof FormButton) {
					throw new RuntimeException("This button is invalid.");
				}
				$player->sendForm($selected->getForm());
			}
		);
		/** @var FormButton[] $buttons */
		$buttons = [];
		foreach($this->factories as $factory) {
			$buttons[] = new FormButton($factory->getTitle(), $factory->getImage(), $factory->createForm());
		}
		$form->append($buttons);
		return $form;
	}

	public function registerFactory(IFormFactory $factory) : void {
		$this->factories[$factory->getName()] = $factory;
	}
}