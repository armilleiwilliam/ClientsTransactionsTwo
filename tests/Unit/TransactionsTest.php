<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery;

class TransactionsTest extends TestCase
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
        $this->mock = Mockery::mock('Eloquent', 'Transactions');
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testTransactionsList()
    {

        $this->mock
            ->shouldReceive('select')
            ->once();

        $this->app->instance('Transactions', $this->mock);

        $this->call('GET', 'transactions');

        $this->assertViewHas('transactionslist');
    }

    public function testClientEdit()
    {

        $this->mock
            ->shouldReceive('select')
            ->once();

        $this->app->instance('Transctions', $this->mock);

        $this->call('GET', 'Transactions');

        $this->assertViewHas('transactionedit');
    }

    public function testTransactionDelete()
    {

        $this->app->instance('Transactions', $this->mock);

        $this->call('GET', 'transactions');

        $this->assertViewHas('transactiondelete');
    }
}
