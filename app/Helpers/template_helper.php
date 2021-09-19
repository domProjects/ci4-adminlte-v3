<?php

// ------------------------------------------------------------------------

if ( ! function_exists('addOptionsClass'))
{
	function addOptionsClass($elements = [], $separator = ' ')
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
