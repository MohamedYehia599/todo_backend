<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;



class TaskController extends Controller
{
    
    public function index(){
        $tasks=Task::with('user')->get();
    //    print(TaskResource::collection($tasks)['data']); 
            // dd(TaskResource::collection($tasks));
        return  TaskResource::collection($tasks) ;

    }
     
       public function show($taskId){
        if ($this->isValid($taskId)) {
            $task= Task::find($taskId);
            return new TaskResource($task);
        }
        return response(content:'there is no task with such id',status:400);
       }
     
       public function store(StoreTaskRequest $request){
         $input = $request->all();

            $task=Task::create([
             'title'=>$input['title'],
             'description'=>$input['description'],
             'user_id'=>$input['user_id'],
            ]);
     
            return new TaskResource($task);
        
       }

       public function update( UpdateTaskRequest $request ,$taskId ){

        $input = $request->all();
        
        if($this->isValid($taskId)){

            Task::where('id', $taskId)->update([
                'title'=>$input['title'],
                'description'=>$input['description'],
                'user_id'=>$input['user_id'] ,
                ]);

            $task = Task::find($taskId);

            return new TaskResource($task);
        }
        return response(content:'there is no task with such id',status:400);

        }  



       public function destroy($taskId){
        if($this->isValid($taskId)){
            Task::where('id', $taskId)->delete();
            return response(content:'deleted successfully',status:200);
            
        }
        return response(content:'there is no task with such id',status:400);
        
        
       
       }
       public function isValid($taskId){
 
        if(Task::find($taskId))
            return true;
        
        return false;
       }     
     
}
