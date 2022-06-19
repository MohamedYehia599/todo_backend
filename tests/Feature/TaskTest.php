<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
<<<<<<< HEAD:todo_list/tests/Feature/TaskTest.php


    public function test_task_show()
    {
        $response = $this->get('/api/tasks/10');

        $response->assertStatus(200);
    }


    public function test_task_store(){


        $response = $this->post('/api/tasks',[
            'title'=>'test_title_create',
            'description'=>'test_description',
            'user_id'=>10
        ]);
        $response->assertStatus(201);
    }
    public function test_task_update(){


        $response = $this->put('/api/tasks/10',[
            'title'=>'test_title_update',
            'description'=>'test_description',
            'user_id'=>10
        ]);
        $response->assertStatus(200);
    }

    public function test_task_delete(){
        $response = $this->delete('/api/tasks/30');
        $response->assertStatus(200);
    }

    



=======
>>>>>>> parent of 2922446 (task_unit_test):tests/Feature/TaskTest.php
}
