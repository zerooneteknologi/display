<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizerRequest;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('organizer.index', [
            'organizers' => Organizer::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organizer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizerRequest $request)
    {
        $validateData = $request->validated();

        if ($request->file('organizer_img')) {
            $validateData['organizer_img'] = $request
                ->file('organizer_img')
                ->store('/img/organizer');
        }
        Organizer::create($validateData);

        return redirect()
            ->route('organizer.index')
            ->with('success', 'Berhasil Menambahkan Aparatur Desa');
    }

    /**
     * Display the specified resource.
     */
    public function show(Organizer $organizer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organizer $organizer)
    {
        return view('organizer.edit', [
            'organizer' => $organizer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrganizerRequest $request, Organizer $organizer)
    {
        $validateData = $request->validated();

        if ($request->file('organizer_img')) {
            if (Storage::exists($organizer->organizer_img)) {
                Storage::delete($organizer->organizer_img);
            }
            $validateData['organizer_img'] = $request
                ->file('organizer_img')
                ->store('/img/organizer');
        }

        $organizer->update($validateData);

        return redirect()
            ->route('organizer.index')
            ->with('success', 'Berhasil Mengubah Aparatur Desa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organizer $organizer)
    {
        if ($organizer->organizer_img) {
            if (Storage::exists($organizer->organizer_img)) {
                Storage::delete($organizer->organizer_img);
            }
        }

        $organizer->delete();

        return redirect()
            ->route('organizer.index')
            ->with('success', 'Berhasil menghapus Aparatur Desa');
    }
}
