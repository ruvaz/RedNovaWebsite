<?php

class RednovaWebsiteTest extends TestCase {

	/**
	 * A basic functional test for rednova website routes
	 *
	 * @return void
	 */
	public function test_home()
	{
		$response = $this->call('GET', '/');
		$this->assertResponsestatus(200);		
	}
	
	public function test_home_en()
	{
		$response = $this->call('GET', '/en');
		$this->assertResponsestatus(200);
	}
	
	public function test_home_es()
	{
		$response = $this->call('GET', '/es');
		$this->assertResponsestatus(200);
	}
	
	public function test_quienes_somos()
	{
		$response = $this->call('GET', '/es/quienes-somos');
		$this->assertResponsestatus(200);
	}
	
	public function test_who_we_are()
	{
		$response = $this->call('GET', '/en/who-we-are');
		$this->assertResponsestatus(200);
	}
	
	public function test_desarrollo_profesional()
	{
		$response = $this->call('GET', '/es/desarrollo-profesional');
		$this->assertResponsestatus(200);	
	}
	
	public function test_professional_development()
	{
		$response = $this->call('GET', '/en/professional-development');
		$this->assertResponsestatus(200);		
	}
	
	public function test_examenes()
	{
		$response = $this->call('GET', '/es/examenes');
		$this->assertResponsestatus(200);		
	}
	
	public function test_exams()
	{
		$response = $this->call('GET', '/en/exams');
		$this->assertEquals(200, $response->getStatusCode());
	}
	
	public function test_otros_servicios()
	{
		$response = $this->call('GET', '/es/otros-servicios');
		$this->assertResponsestatus(200);
	}
	
	public function test_other_services()
	{
		$response = $this->call('GET', '/en/other-services');
		$this->assertResponsestatus(200);
	}
	
	public function test_envianos_un_mensaje()
	{
		$response = $this->call('GET', '/es/enviar-mensaje');
		$this->assertResponsestatus(200);
	}
	
	public function test_send_us_a_message()
	{
		$response = $this->call('GET', '/en/send-message');
		$this->assertResponsestatus(200);
	}

	public function test_glosario()
	{
		$response = $this->call('GET', '/es/glosario');
		$this->assertResponsestatus(200);
	}

	public function test_glossary()
	{
		$response = $this->call('GET', '/en/glossary');
		$this->assertResponsestatus(200);
	}
	
	
}
