<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Task_model;

class Task extends Controller
{
    public function index()
    {
        $rules = [
            'task_name' => 'required',
            'task_description' => 'required'
        ];
        $smg = [
            'task_name.required' => 'Task Name Field is Required!',
            'task_description.required' => 'Task Description Field is Required!'
        ];
        $data = Request::all();
        $validator = Validator::make($data['body'], $rules, $smg);
        if($validator->fails())
        {
            return response()->json([
                'validator' => $validator->errors()
            ]);
        }else
        {
            $task = DB::table('tasks')->insert($validator->validated());
            if ($task) {
                return response()->json([
                    'status' => 200,
                    'message' => "Data inserted."
                ]);
            }else{
                //database error.
            }
            
            
        }
    }


    public function task_edit($id)
    {
        $data = DB::table('tasks')->where('id', $id)->first();
        return response()->json($data); 

        /*return response()->json([
            'status' => 200,
            'message' => "Data edit."
        ]);*/
    }

    public function task_update($id)
    {
        $data = Request::all();
        DB::table('tasks')->where('id', $id)->update($data['body']);

        return response()->json([
            'status' => 200,
            'message' => "Updated."
        ]);
    }

    public function task_list()
    {
        $data = DB::table('tasks')->get();
        return response()->json($data);
    }

    public function task_delete($id)
    {
        DB::table('tasks')->where('id', $id)->delete();
        return response()->json("deleted!");
    }
}
