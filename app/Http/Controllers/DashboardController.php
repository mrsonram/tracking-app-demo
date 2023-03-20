<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Note;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return view('dashboard');
        } else {
            $user = Auth::user();
            $name = $user->name;

            $note = DB::table('notes')
                ->join('users', 'notes.created_by', '=', 'users.id')
                ->select('notes.*', 'users.name')
                ->paginate(10);

            return view('dashboard', [
                'name' => $name,
                'notes' => $note,
            ]);
        }
    }

    public function update(Request $request)
    {
        DB::table('notes')->where('n_id', $request->input('n_id'))->update([
            'n_text' => $request->input('n_text'),
            'updated_by' => Auth::user()->id,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Note updated successfully']);
    }

    public function store(Request $request)
    {
        $note = new Note;
        $note->n_text = $request->input('n_text');
        $note->created_by = Auth::user()->id;
        $note->save();

        return response()->json(['status' => 'success', 'message' => 'Note saved successfully']);
    }

    public function show($id)
    {
        $note = Note::where('n_id', $id)->first();

        return response()->json($note);
    }


    public function destroy(Request $request)
    {
        DB::table('notes')->where('n_id', $request->input('n_id'))->delete();

        return response()->json(['status' => 'success', 'message' => 'Note deleted successfully']);
    }

    public function note_view(Request $request)
    {
        $note_history = DB::table('note_history')
            ->join('notes', 'note_history.n_id', '=', 'notes.n_id')
            ->join('users', 'note_history.user_id', '=', 'users.id')
            ->select('note_history.*', 'notes.n_text', 'users.name')
            ->where('note_history.n_id', '=', $request->input('n_id'))
            ->orderBy('note_history.updated_at', 'desc')
            ->get();

        if ($note_history->isEmpty()) {
            return response()->json(['status' => 'success', 'data' => []]);
        } else {
            return response()->json(['status' => 'success', 'data' => $note_history]);
        }
    }

    public function note_update(Request $request)
    {
        DB::table('note_history')->insert([
            'n_id' => $request->input('n_id'),
            'before_change' => $request->input('before_change'),
            'after_change' => $request->input('after_change'),
            'added_line' => $request->input('added_line'),
            'deleted_line' => $request->input('deleted_line'),
            'user_id' => Auth::user()->id,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Note updated successfully']);
    }
}
