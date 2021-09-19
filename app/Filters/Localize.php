<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Localize implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{
		log_message('debug', "FilterLocalize --- start ---");
		$uri = &$request->uri;
		$segments = array_filter($uri->getSegments());
		$nbSegments = count($segments);
		log_message('debug', "FilterLocalize - {$nbSegments} segments = " . print_r($segments, true));

		// Garder seulement les 2 premières lettres (fr-FR => fr)
		$userLocale = strtolower(substr($request->getLocale(), 0, 2));
		log_message('debug', "FilterLocalize - Locale du visiteur $userLocale");

		// Si la langue de l'utilisateurs n'est pas une langue prise en charge, prendre la langue par défaut
		$locale = in_array($userLocale, $request->config->supportedLocales) ? $userLocale : $request->config->defaultLocale;
		log_message('debug', "FilterLocalize - Locale sélectionnée $locale");

		// Si on demande /, rediriger vers /{locale}
		if ($nbSegments == 0)
		{
			log_message('debug', "FilterLocalize - Rediriger / vers /{$locale}");
			log_message('debug', "FilterLocalize --- end ---");
			return redirect()->to("/{$locale}");
		}

		log_message('debug', "FilterLocalize - segments[0] = " . $segments[0]);
		$locale = $segments[0];

		// Si le premier segment de l'URI n'est pas une locale valide, déclencher une erreur 404
		if ( ! in_array($locale, $request->config->supportedLocales))
		{
			log_message('debug', "FilterLocalize - ERREUR Locale '{$locale}' invalide");
			log_message('debug', "FilterLocalize --- end ---");
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}

		log_message('debug', "FilterLocalize - Locale '$locale' valide");
		log_message('debug', "FilterLocalize --- end ---");
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		// Do something here
	}
}
