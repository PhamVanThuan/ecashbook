<?php

class RoutesTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testGetToken()
	{
		$response = $this->call('GET', 'home');

		$this->assertEquals(302, $response->getStatusCode());
	}

}
