<?php


namespace uramnoil\smartform;


use pocketmine\form\Form;

interface ISmartFormManager {
	function registerFactory(IFormFactory $factory) : void;
	function createSmartForm() : Form;
}