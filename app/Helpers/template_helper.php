<?php

// ------------------------------------------------------------------------

if ( ! function_exists('xxxxx'))
{
	function xxxxx(bool $element, string $class)
	{
		if (is_bool($element) && $element !== false)
		{
			return $class;
		}
		else
		{
			return null;
		}
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('addOptionsClass'))
{
	function addOptionsClass(array $elements, string $separator = ' ')
	{
		if (is_array($elements))
		{
			$output = null;

			foreach ($elements as $key => $value)
			{
				if ($value !== null)
				{
					$output .= $separator.$value;
				}
			}

			return $output;
		}
	}
}
