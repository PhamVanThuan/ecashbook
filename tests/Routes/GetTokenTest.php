<?php

class GetTokenTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testGetToken()
	{
		$response = $this->call('GET', 'get-token');

		$this->assertEquals(200, $response->getStatusCode());
	}

}
