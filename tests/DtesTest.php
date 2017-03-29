<?php


/**
 *  Basic test for DTES service view
 */
class DtesTest extends TestCase {
	
	public function test_dtes_home_es()
	{
		$response = $this->call('GET', '/es/dtes');
		$this->assertResponsestatus(200);
	}
	
	public function test_dtes_home_en()
	{
		$response = $this->call('GET', '/en/dtes');
		$this->assertResponsestatus(200);
	}
	
	public function test_dtes_registro_es()
	{
		$response = $this->call('GET', '/es/dtes/registro');
		$this->assertResponsestatus(200);
	}
	
	public function test_dtes_registration_en()
	{
		$response = $this->call('GET', '/en/dtes/registration');
		$this->assertResponsestatus(200);
	}
	
	public function test_dtes_centros_autorizados()
	{
		$response = $this->call('GET', '/es/dtes/centros-autorizados');
		$this->assertResponsestatus(200);
	}
	
	public function test_dtes_authorized_centers()
	{
		$response = $this->call('GET', '/en/dtes/authorized-centers');
		$this->assertResponsestatus(200);
	}
	
	
}

