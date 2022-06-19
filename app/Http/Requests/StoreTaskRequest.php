<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required','unique:tasks','min:3'],
        'description' => ['required','min:6'],
        'user_id'=>['required', 'exists:users,id'],
        ];
    }
    public function messages(){
        return [
            'title.required'=>'you should add a title to your task',
            'title.min'=>'title cant be less than 3 characters',
            'title.unique'=>'a task with the same title is added before',
            'description.required'=>'you should add body to your task',
            'description.min'=>'body cant be less than 6 characters'
      


        ];
    }
}
