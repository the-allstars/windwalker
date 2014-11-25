<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU Lesser General Public License version 2.1 or later.
 */

namespace Windwalker\Application\Test\Mock;

use Psr\Log\AbstractLogger;

/**
 * The MockLogger class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class MockLogger extends AbstractLogger
{
	/**
	 * Logs with an arbitrary level.
	 *
	 * @param mixed  $level
	 * @param string $message
	 * @param array  $context
	 *
	 * @return null
	 */
	public function log($level, $message, array $context = array())
	{
	}
}