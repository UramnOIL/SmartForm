<?php


namespace uramnoil\smartform;


use Frago9876543210\EasyForms\elements\Image;
use pocketmine\form\Form;

interface IFormFactory {
	function createForm() : Form;
	function getName() : string;
	function getTitle() : string;
	function getImage() : ?Image;
}