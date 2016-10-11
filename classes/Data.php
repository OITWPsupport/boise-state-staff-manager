<?php namespace BSU\Staff;


class Data {
	public $pluginDirectory;
	public $shortcodeName;
	public $templateDirectory;
	public $version;

	public function __construct()
	{
		$this->version = '0.0.1';
		$this->shortcodeName = 'boise_state_staff';
		$this->pluginDirectory = __DIR__ . '/../';
		$this->templateDirectory = $this->pluginDirectory . '/templates/';
	}


}