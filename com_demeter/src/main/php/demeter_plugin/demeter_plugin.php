<?php
// no direct access
defined( '_JEXEC' ) || die;

class plgSystemDemeter_plugin extends JPlugin
{

	protected $autoloadLanguage = true;

	
	public function onAfterRender()
	{
		$metatags = $this->params['metatags'];
		$analytics = $this->params['analytics'];
		
		
		$document->addCustomTag($metatags );
		$document->addCustomTag($analytics);
	}
	
}