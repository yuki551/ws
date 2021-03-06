<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

// user情報取得用
use Illuminate\Support\Facades\Auth;

// config呼び出し用
// var_dump(config('setting.hierarchy'));
// var_dump(config('setting.status'));

class PostListController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {

        // $data = Post::select(
        //     'users.name as user_name',
        //     'posts.created_at',
        //     'summary_am',
        //     'client_a.name as client_name_am',
        //     'contents_am',
        //     'summary_pm',
        //     'client_p.name as client_name_pm',
        //     'contents_pm',
        //     'teams.name as team_name')
        //     ->join('users', 'posts.user', '=', 'users.id')
        //     ->join('teams', 'posts.team', '=', 'teams.id')
        //     ->leftjoin('clients as client_a', 'posts.client_am', '=', 'client_a.id')
        //     ->leftjoin('clients as client_p', 'posts.client_pm', '=', 'client_p.id')
        //     ->where('status', '2')
        //     ->get();
        $data = Post::simplepaginate(5);
        var_dump($data);
        // $link = $data->links();
        // var_dump($link);

        // ここより↑：ページネーション用にテスト作成

        $user = Auth::user();
        // var_dump($data);

        // var_dump($user["role_id"]);
        $conf = config('setting.status');

        return Inertia::render('postlists', ['data' => $data, 'link' => $link, 'conf' => $conf]);

        //管理者用ページ
        // if ($user["role_id"] == 1) {
        //     return Inertia::render('admin', ['data' => $data, 'conf' => $conf]);
        // } else {
        //     return Inertia::render('dashboard', ['data' => $data, 'conf' => $conf]);
        // }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        //user id と team id が整合性取れる場合のみ入力できる様にしたい
        Validator::make($request->all(), [
            'user' => ['required'],
            'team' => ['required'],
            // 'date' => ['required'],
            'summary_am' => ['required'],
            'contents_am' => ['required'],
            'summary_pm' => ['required'],
            'contents_pm' => ['required'],
            'status' => ['required'],
        ])->validate();

        Post::create($request->all());

        return redirect()->back()
            ->with('message', 'Post Created Successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
        ])->validate();

        if ($request->has('id')) {
            Post::find($request->input('id'))->update($request->all());
            return redirect()->back()
                ->with('message', 'Post Updated Successfully.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            Post::find($request->input('id'))->delete();
            return redirect()->back();
        }
    }
}
