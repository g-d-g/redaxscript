<?php
namespace Redaxscript\Console;

use Redaxscript\Request;

/**
 * parent class to handle the command line interface
 *
 * @since 3.0.0
 *
 * @package Redaxscript
 * @category Console
 * @author Henry Ruhs
 */

class Console
{
	/**
	 * instance of the request class
	 *
	 * @var object
	 */

	protected $_request;

	/**
	 * array of commands
	 *
	 * @var string
	 */

	protected $_commandArray = array(
		'backup' => 'Redaxscript\Console\Command\Backup',
		'config' => 'Redaxscript\Console\Command\Config',
		'help' => 'Redaxscript\Console\Command\Help',
		'install' => 'Redaxscript\Console\Command\Install',
		'status' => 'Redaxscript\Console\Command\Status',
		'setting' => 'Redaxscript\Console\Command\Setting',
		'uninstall' => 'Redaxscript\Console\Command\Uninstall',
	);

	/**
	 * constructor of the class
	 *
	 * @since 3.0.0
	 *
	 * @param Request $request instance of the request class
	 */

	public function __construct(Request $request)
	{
		$this->_request = $request;
	}

	/**
	 * init the class
	 *
	 * @since 3.0.0
	 */

	public function init()
	{
		/* parser */

		$parser = new Parser(Request::getInstance());
		$parser->init();

		/* run command */

		$commandArgument = $parser->getArgument(1);
		if (array_key_exists($commandArgument, $this->_commandArray))
		{
			$command = new $this->_commandArray[$commandArgument]($parser);
			return $command->run();
		}
	}
}
