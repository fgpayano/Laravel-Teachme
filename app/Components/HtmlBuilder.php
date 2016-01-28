<?php

namespace App\Components;

use Collective\Html\HtmlBuilder as CollectiveHtmlBuilder;
use Illuminate\View\Factory as View;
use	Illuminate\Config\Repository as Config;
use Illuminate\Routing\UrlGenerator;

class HtmlBuilder extends CollectiveHtmlBuilder{

	private $view;

	private $config;

	protected $url;

	public function __construct(UrlGenerator $url, View $view, Config $config)
	{	
		$this->view = $view;

		$this->config = $config;

		$this->url = $url;
	}

	public function menu($arrElements)
	{
		if (! is_array($arrElements))
		{
			$arrElements = $this->config->get($arrElements);	
		}

		return $this->view->make('partials/menu', compact('arrElements'));
	}

	public function doActiveClass ($className = "", $value = "")
	{	
		
	}
}