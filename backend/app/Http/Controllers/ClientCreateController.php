<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class ClientCreateController extends Controller
{
    public function index()
    {
        return Inertia::render('clients_create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
        ],
        [
            'name.required' => '取引先名は、必ず指定してください。',
        ],
        );

        // バリデーションエラーだった場合
        if ($validator->fails()) {
            return redirect('/clients_create')
                ->withErrors($validator)
                ->withInput();
        }

        Client::create($request->all());

        return redirect()->back()
            ->with('message', '登録されました。');
    }
}
