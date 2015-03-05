<?php
namespace Redaxscript\Tests;

use Redaxscript\Language;

/**
 * LanguageTest
 *
 * @since 2.2.0
 *
 * @package Redaxscript
 * @category Tests
 * @author Henry Ruhs
 */

class LanguageTest extends TestCase
{
	/**
	 * language
	 *
	 * instance of the language class
	 *
	 * @var object
	 */

	protected $_language;

	/**
	 * setUp
	 *
	 * @since 2.2.0
	 */

	protected function setUp()
	{
		$this->_language = Language::getInstance();
		$this->_language->init('de');
	}

	/**
	 * tearDown
	 *
	 * @since 2.2.0
	 */

	public function tearDown()
	{
		$this->_language->init('en');
	}

	/**
	 * testGetAndSet
	 *
	 * @since 2.4.0
	 */

	public function testGetAndSet()
	{
		/* setup */

		$this->_language->set('testKey', 'testValue');

		/* result */

		$result = $this->_language->get('testKey');

		/* compare */

		$this->assertEquals('testValue', $result);
	}

	/**
	 * testGetIndex
	 *
	 * @since 2.2.0
	 */

	public function testGetIndex()
	{
		/* result */

		$result = $this->_language->get('name', '_package');

		/* compare */

		$this->assertEquals('Redaxscript', $result);
	}

	/**
	 * testGetAll
	 *
	 * @since 2.2.0
	 */

	public function testGetAll()
	{
		/* result */

		$result = $this->_language->get();

		/* compare */

		$this->assertArrayHasKey('home', $result);
	}

	/**
	 * testGetInvalid
	 *
	 * @since 2.2.0
	 */

	public function testGetInvalid()
	{
		/* result */

		$result = $this->_language->get('invalidKey');

		/* compare */

		$this->assertEquals(null, $result);
	}
}
