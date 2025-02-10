<?php
namespace App\Http\Controllers;
use App\Model\Task;

class TaskController extends Controller
{

    public function index()
    {
        $Task = Task::where('user_id', auth()->id())->paginate(5);
        $counttask = Task::where('user_id', auth()->id())->count();
        if($counttask==0){
            return redirect()->route('home')->with("message", "No Tasks");
         }

        return view('task', [
            "result" => $Task,
        ]);
    }

    public function delete($id)
    {
        $Task = Task::findOrFail($id);
        $Task->delete();
        return redirect()->route('tasks')->with("message", "deleted successfully");
    }

    public function deleteSelected()
    {
        Task::where('user_id', auth()->id())->delete();
        return redirect()->route('home')->with('message', '  Successfully Deleted');
    }


}
