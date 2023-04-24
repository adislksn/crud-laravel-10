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
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');
        $count = 1;

        $users_pplk = Mbd::latest()->select()
        ->where('created_at', '>=', $fromDate)
        ->where('created_at', '<=', $toDate)
        ->orderBy('id', 'DESC')
        ->paginate(10, ['*'], 'sortDate', $count);

        return view('mbd.search', compact('users_pplk'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // $users_pplk = Mbd::findOrFail($id);
        $fromDate = '2022-07-01';
        $toDate = '2022-08-01';

        $users_pplk = Mbd::latest()->select()
        ->where('created_at', '>=', $fromDate)
        ->where('created_at', '<=', $toDate)
        ->orderBy('id', 'DESC')
        ->paginate(10);

        return view('mbd.show', compact('users_pplk'));
            //render view with post
        // return view('mbd.show');
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
    public function update(Request $request , string $id)
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

    public function search(Request $request)
    {
        return view('mbd.search');
    }
}
