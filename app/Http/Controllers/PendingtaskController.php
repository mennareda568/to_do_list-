<?php
namespace App\Http\Controllers;

use App\Model\Pendingtask;
use App\Model\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PendingtaskController extends Controller
{

    public function index()
    {
        $Pending = Pendingtask::where('user_id', auth()->id())->paginate(5);
        $counttask = Pendingtask::where('user_id', auth()->id())->count();

        if ($counttask == 0) {
            return redirect()->route('home')->with("message", "No Tasks");
        }
        return view('pending', [
            "result" => $Pending,
        ]);
    }

    public function delete($id)
    {
        $Pending = Pendingtask::findOrFail($id);
        $Pending->delete();
        return redirect()->route('pending')->with("message", "deleted successfully");
    }

    public function deleteSelected()
    {
        Pendingtask::where('user_id', auth()->id())->delete();
        return redirect()->route('home')->with('message', ' Successfully Deleted');
    }

    public function create()
    {
        return view('pending/create');
    }

    public function savenew(Request $item)
    {
        $item->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
        ]);

        Pendingtask::create([
            "user_id" => $item->user_id,
            "title" => $item->title,
            "content" => $item->content,
            "date" => $item->date,
        ]);

        return redirect()->route('pending')->with("message", "Created Successfully");
    }

    public function edit($id)
    {
        $Pending = Pendingtask::findOrFail($id);
        return view("pending/edit", ["result" => $Pending]);
    }

    public function saveedit(Request $request)
    {
        $old_id = $request->old_id;
        $Pending = Pendingtask::findOrFail($old_id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'date' => 'required',
        ]);

        $Pending->update([
            "title" => $request->title,
            "content" => $request->content,
            "date" => $request->date,
        ]);
        return redirect()->route("pending")->with("message", "edited successfully");
    }

    public function finish($id)
    {
        $Pending = Pendingtask::findOrFail($id);
        $user_id = $Pending->user_id;
        $title = $Pending->title;
        $content = $Pending->content;
        $date = $Pending->date;

        Task::create([
            "user_id" => $user_id,
            "title" => $title,
            "content" => $content,
            "date" => $date,
        ]);
        $Pending->delete();
        return redirect()->route('tasks')->with("message", "Completed Your Task");
    }

    public function finishall()
    {
        DB::insert('insert into tasks (title, content, user_id,date) select title, content, user_id,date from pendingtasks where user_id = ?', [auth()->id()]);
        Pendingtask::where('user_id', auth()->id())->delete();
        return redirect()->route('home')->with("message", "Completed All Tasks");
    }
}
