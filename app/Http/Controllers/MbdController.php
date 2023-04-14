<?php

namespace App\Http\Controllers;

use App\Models\Mbd;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MbdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users_pplk = Mbd::latest()->paginate(10);
        return view('mbd.index', compact('users_pplk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('mbd.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $users_pplk = Mbd::findOrFail($id);

            //render view with post
        return view('mbd.show', compact('users_pplk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $users_pplk = Mbd::findOrFail($id);
        $users_pplk->delete();
        return redirect()->route('mbd.index')->with('success', 'Data berhasil dihapus');
    }
}
