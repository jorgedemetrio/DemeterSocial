<?php
// no direct access
defined( '_JEXEC' ) || die;

class plgContentDemeter_content_plugin extends JPlugin
{
	/**
	 * Load the language file on instantiation. Note this is only available in Joomla 3.1 and higher.
	 * If you want to support 3.0 series you must override the constructor
	 *
	 * @var    boolean
	 * @since  3.1
	 */
	protected $autoloadLanguage = true;
	function onContentAfterTitle($context, &$article, &$params, $limitstart=0)
	{

		if($context!='com_content.article'){
			return;
		}
		
		
		$document = JFactory::getDocument();
		
		$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
		$baseURL = $protocol.$_SERVER['SERVER_NAME'];
		$urlLocal = $baseURL.$_SERVER['REQUEST_URI'];
		$token_facebook = $this->params['token_facebook'];
		$facebook_version = $this->params['facebook_version'];
		

		
		$document = JFactory::getDocument();
		$id_facebook = $this->params['id_facebook'];
		$script ='<div id="fb-root"></div>';


	    $document->addCustomTag('<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v'.$facebook_version.'&appId='.$id_facebook.'&autoLogAppEvents=1" nonce="'.$token_facebook.'"></script>');


		
		return $script.'<div class="fb-like" data-href="'.$urlLocal.'" data-width="" data-layout="" data-action="" data-size="" data-share="true"></div>';
	}
	
	function onContentAfterDisplay($context, &$article, &$params, $limitstart=0)
	{
	    if($context!='com_content.article' || !isset($article)){
			return '';
		}
		$tamanho = $this->params['tamanho'];

		$id_facebook = $this->params['id_facebook'];
		$token_facebook = $this->params['token_facebook'];
		$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
		$baseURL = $protocol.$_SERVER['SERVER_NAME'];
		$urlLocal = $baseURL.$_SERVER['REQUEST_URI'];

		
		
		
		
		return '<div class="fb-comments" data-href="'.$urlLocal.'" data-width="'.$tamanho .'" data-numposts="5"></div>';
	}
}
