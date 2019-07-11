<?php


namespace uramnoil\smartform;


use pocketmine\form\Form;

interface IFormFactory {
	function createForm() : Form;
	function getName() : string;
	function getTitle() : string;
}