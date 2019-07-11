<?php


namespace uramnoil\smartform;


use Frago9876543210\EasyForms\forms\MenuForm;
use pocketmine\form\Form;
use pocketmine\plugin\PluginBase;
use uramnoil\smartform\form\element\FormButton;

class SmartFormPlugin extends PluginBase implements ISmartFormManager {
	/** @var Form[] */
	private $forms = [];

	public function getSmartFormManager() : ISmartFormManager {
		return $this;
	}

	public function createSmartForm(): Form {
		$form = new MenuForm("SmartForm", null);
		/** @var FormButton[] $buttons */
		$buttons = [];
		foreach($this->forms as $form) {
			$buttons[] = new FormButton();
		}
	}

	public function registerFactory(IFormFactory $factory) : void {
		$form[$factory->getName()] = $factory;
	}
}