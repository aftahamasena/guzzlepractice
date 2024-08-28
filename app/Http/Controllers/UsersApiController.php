<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Log;

class UsersApiController extends Controller
{
    /**
     * Display Pa listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id'); // default sort by 'id'
        $order = $request->input('order', 'asc'); // default order 'asc'

        // Melakukan permintaan ke API dengan parameter sorting
        $response = Http::get('https://66c5fd49134eb8f434966100.mockapi.io/guzzlesena/users', [
            'name' => $search,
            'sortBy' => $sortBy,
            'order' => $order
        ]);

        if ($response->failed()) {
            return view('usersapi.index', ['data' => [], 'message' => 'Gagal mendapatkan data dari API.']);
        }

        // Mengonversi respons API menjadi koleksi
        $data = $response->collect();

        // Mengirimkan data jika ada hasil pencarian
        return view('usersapi.index', ['data' => $data, 'message' => null, 'sortBy' => $sortBy, 'order' => $order]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usersapi.create');
    }

    /**
     * Store a newly  created resource in storage.
     */
    public function store(Request $request)
    {
        $request = $request->all();
        unset($request['_token']);

        $response = Http::post('https://66c5fd49134eb8f434966100.mockapi.io/guzzlesena/users', $request);
        return redirect()->route('userapi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::get('https://66c5fd49134eb8f434966100.mockapi.io/guzzlesena/users/' . $id);
        return view('usersapi.show', ['user' => $response->collect()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::get('https://66c5fd49134eb8f434966100.mockapi.io/guzzlesena/users/' . $id);
        return view('usersapi.edit', ['user' => $response->collect()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request = $request->all();
        unset($request['_token']);

        // dd($request);

        $response = Http::put('https://66c5fd49134eb8f434966100.mockapi.io/guzzlesena/users/' . $id, $request);
        return redirect()->route('userapi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete('https://66c5fd49134eb8f434966100.mockapi.io/guzzlesena/users/' . $id);
        return redirect()->route('userapi.index');
    }
}
