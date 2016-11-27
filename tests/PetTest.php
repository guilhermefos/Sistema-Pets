<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PetTest extends TestCase
{
    /**
     * Test url.
     *
     * @return void
     */
    public function testUrl()
    {
        $this->visit('/pets')
    }
}
