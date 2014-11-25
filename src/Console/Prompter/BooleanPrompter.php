<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2008 - 2014 Asikart.com. All rights reserved.
 * @license    GNU Lesser General Public License version 2.1 or later.
 */

namespace Windwalker\Console\Prompter;

/**
 * Class BooleanPrompter
 *
 * @since {DEPLOY_VERSION}
 */
class BooleanPrompter extends TextPrompter
{
	/**
	 * Aliases of true.
	 *
	 * @var  array
	 *
	 * @since  {DEPLOY_VERSION}
	 */
	protected $trueAlias = array('y', 'yes', 1);

	/**
	 * Aliases of false.
	 *
	 * @var  array
	 *
	 * @since  {DEPLOY_VERSION}
	 */
	protected $falseAlias = array('n', 'no', 0, 'null');

	/**
	 * Retry times.
	 *
	 * @var  int
	 *
	 * @since  {DEPLOY_VERSION}
	 */
	protected $attempt = 1;

	/**
	 * Show prompt to ask user.
	 *
	 * @param   string  $msg      Question.
	 * @param   string  $default  Default value.
	 *
	 * @return  string  The value that use input.
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	public function ask($msg = '', $default = null)
	{
		$value = parent::ask($msg, $default);

		if (is_null($value))
		{
			return $value;
		}

		$value = strtolower($value);

		if (in_array($value, $this->trueAlias))
		{
			return true;
		}
		elseif (in_array($value, $this->falseAlias))
		{
			return false;
		}

		return $default;
	}

	/**
	 * Get true value alias.
	 *
	 * @return  array  Aliases.
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	public function getTrueAlias()
	{
		return $this->trueAlias;
	}

	/**
	 * Set true value alias.
	 *
	 * @param   array  $trueAlias  Alias you want to set.
	 *
	 * @return  BooleanPrompter  Return self to support chaining.
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	public function setTrueAlias($trueAlias)
	{
		$this->trueAlias = $trueAlias;

		return $this;
	}

	/**
	 * Get aliases of false value.
	 *
	 * @return  array  Aliases.
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	public function getFalseAlias()
	{
		return $this->falseAlias;
	}

	/**
	 * Set aliases of false value.
	 *
	 * @param   array  $falseAlias  Alias you want to set.
	 *
	 * @return  BooleanPrompter  Return self to support chaining.
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	public function setFalseAlias($falseAlias)
	{
		$this->falseAlias = $falseAlias;

		return $this;
	}
}
