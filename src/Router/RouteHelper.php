<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU Lesser General Public License version 2.1 or later.
 */

namespace Windwalker\Router;

/**
 * The RouteHelper class.
 * 
 * @since  {DEPLOY_VERSION}
 */
abstract class RouteHelper
{
	/**
	 * Sanitize and explode the pattern.
	 *
	 * @param string $pattern
	 *
	 * @return  string
	 */
	public static function sanitize($pattern)
	{
		return trim(parse_url((string) $pattern, PHP_URL_PATH), ' /');
	}

	/**
	 * Get variables from regex matched result.
	 *
	 * @param array $matches Regex matched result.
	 * @param array &$vars   Variables to store data.
	 *
	 * @return  array
	 */
	public static function getVariables($matches, &$vars = null)
	{
		if (!$matches)
		{
			return array();
		}

		if ($vars === null)
		{
			$vars = array();
		}

		foreach ($matches as $i => $var)
		{
			if (is_numeric($i))
			{
				continue;
			}

			if (strpos($var, '/') !== false)
			{
				$var = explode('/', $var);
			}

			$vars[$i] = $var;
		}

		return $vars;
	}

	/**
	 * getEnvironment
	 *
	 * @return  array
	 */
	public static function getEnvironment()
	{
		return array(
			'host'   => $_SERVER['HTTP_HOST'],
			'scheme' => $_SERVER['REQUEST_SCHEME'],
			'port'   => $_SERVER['SERVER_PORT']
		);
	}
}