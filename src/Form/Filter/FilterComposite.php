<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2017 ${ORGANIZATION}.
 * @license    __LICENSE__
 */

namespace Windwalker\Form\Filter;

/**
 * The FilterComposite class.
 *
 * @since  __DEPLOY_VERSION__
 */
class FilterComposite implements FilterInterface
{
	/**
	 * Property filters.
	 *
	 * @var  FilterInterface[]
	 */
	protected $filters = [];

	/**
	 * FilterComposite constructor.
	 *
	 * @param FilterInterface[] $filters
	 */
	public function __construct(array $filters = [])
	{
		$this->filters = $filters;
	}

	/**
	 * clean
	 *
	 * @param string $text
	 *
	 * @return  mixed
	 */
	public function clean($text)
	{
		if (!$this->filters)
		{
			return $text;
		}

		foreach ($this->filters as $filter)
		{
			$text = $filter->clean($text);
		}

		return $text;
	}

	/**
	 * addFilter
	 *
	 * @param   FilterInterface|callable $filter
	 *
	 * @return  static
	 * @throws \InvalidArgumentException
	 */
	public function addFilter($filter)
	{
		if (!$filter instanceof FilterInterface)
		{
			if (!is_callable($filter))
			{
				throw new \InvalidArgumentException('Filter should be callable or ' . FilterInterface::class);
			}

			$filter = new CallbackFilter($filter);
		}

		$this->filters[] = $filter;

		return $this;
	}

	/**
	 * Method to get property Filters
	 *
	 * @return  FilterInterface[]
	 */
	public function getFilters()
	{
		return $this->filters;
	}

	/**
	 * Method to set property filters
	 *
	 * @param   FilterInterface[] $filters
	 *
	 * @return  static  Return self to support chaining.
	 */
	public function setFilters($filters)
	{
		$this->filters = $filters;

		return $this;
	}
}
