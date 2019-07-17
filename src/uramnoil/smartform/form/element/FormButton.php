<?php

namespace uramnoil\smartform\form\element;

use Frago9876543210\EasyForms\elements\Button;
use Frago9876543210\EasyForms\elements\Image;
use pocketmine\form\Form;

class FormButton extends Button {
	/** @var string */
	private $name;
	/** @var Form */
	private $form;

	public function __construct(string $name, string $text, ?Image $image, Form $form) {
		$this->name = $name;
		$this->form = $form;
		parent::__construct($text, $image);
	}

	/**
	 * @return Form
	 */
	public function getForm(): Form {
		return $this->form;
	}
}