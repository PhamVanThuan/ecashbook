<?php

class AuthTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testHomeRoute()
	{
		$response = $this->call('GET', 'password');

		$this->assertEquals(200, $response->getStatusCode());
	}

}
