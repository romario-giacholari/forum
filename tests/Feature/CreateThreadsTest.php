<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateThreadsTest extends TestCase
{
    /** @test */
    public function an_authenticated_user_can_create_new_forum_threads()
    {

    	$this->actingAs(factory('App\User')->create());

    	$thread = factory('App\Thread')->make();

    	$this->post('/threads', $thread->toArray());

    	$this->get($thread->path())
			 ->assertSee($thread->title)
    		 ->assertSee($thread->body);    
    }

      /** @test */
    public function an_unauthenticated_user_cannot_create_new_forum_threads()
    {

    	$this->expectException('Illuminate\Auth\AuthenticationException');
    	
    	$thread = factory('App\Thread')->make();

    	$this->post('/threads', $thread->toArray());

    	  
    }

}
