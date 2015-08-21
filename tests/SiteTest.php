<?php

use App\User;
use Auth;

class SiteTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testHomePage()
	{
		$this->doLogin();
		$response = $this->call('GET', '/');
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testCreate()
	{
		$this->doLogin();
		$response = $this->call('GET', '/questions/create');
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testShow()
	{
		$this->doLogin();
		$response = $this->call('GET', '/questions/show');
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testCategoryList()
	{
		$this->doLogin();
		$response = $this->call('POST', '/stage/getCategoryList');
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testStageList()
	{
		$this->doLogin();
		$response = $this->call('POST', '/stage/getStageList', array('stage_id' => '1', 'user_id' => '1'));
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testQAList()
	{
		$this->doLogin();
		$response = $this->call('POST', '/question/getQAList', array('stagesId' => '101'));
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function doLogin()
	{
		$user = User::where('name', 'pony')->first();
		Auth::loginUsingId($user->id);
	}

}
