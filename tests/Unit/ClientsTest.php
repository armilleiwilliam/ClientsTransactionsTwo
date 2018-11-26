<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery;

class ClientsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        // We have no interest in testing Eloquent
        $this->mock = Mockery::mock('Eloquent', 'Clients');
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testClientsList()
    {

        $this->mock
            ->shouldReceive('select')
            ->once();

        $this->app->instance('Clients', $this->mock);

        $this->call('GET', 'clients');

        $this->assertViewHas('clientslist');
    }

    public function testClientEdit()
    {

        $this->mock
            ->shouldReceive('select')
            ->once();

        $this->app->instance('Clients', $this->mock);

        $this->call('GET', 'clients');

        $this->assertViewHas('clientedit');
    }

    public function testClientDelete()
    {

        $this->app->instance('Clients', $this->mock);

        $this->call('GET', 'clients');

        $this->assertViewHas('clientdelete');
    }
}
