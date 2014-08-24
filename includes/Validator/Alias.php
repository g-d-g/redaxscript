<?php
namespace Redaxscript\Validator;

/**
 * children class to validate general and default alias
 *
 * @since 2.2.0
 *
 * @category Redaxscript
 * @package Validator
 * @author Henry Ruhs
 * @author Sven Weingartner
 */

class Alias implements Validator
{
	/**
	 * general validate mode
	 *
	 * @const integer
	 */

	const MODE_GENERAL = 0;

	/**
	 * default validate mode
	 *
	 * @const integer
	 */

	const MODE_DEFAULT = 1;

	/**
	 * array of default alias
	 *
	 * @var array
	 */

	protected $defaultArray = array(
		'admin',
		'loader',
		'login',
		'logout',
		'password_reset',
		'scripts',
		'styles',
		'registration',
		'reminder'
	);

	/**
	 * validate the alias
	 *
	 * @since 2.2.0
	 *
	 * @param string $alias alias for routing
	 * @param integer $mode switch between general and default validation
	 *
	 * @return integer
	 */

	public function validate($alias = null, $mode = 0)
	{
		$output = Validator::FAILED;

		/* validate general alias */

		if ($mode === self::MODE_GENERAL)
		{
			if (preg_match('/[^a-z0-9_]/i', $alias) || is_numeric($alias))
			{
				$output = Validator::PASSED;
			}
		}

		/* validate default alias */

		else if ($mode === self::MODE_DEFAULT)
		{
			if (in_array($alias, $this->defaultArray))
			{
				$output = Validator::PASSED;
			}
		}
		return $output;
	}
}
