<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('media.index', [
            'galleries' => Gallery::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (
            $request->gallery_type == 'image' ||
            $request->gallery_type == 'video'
        ) {
            Gallery::create([
                'gallery_name' => $request->gallery_name,
                'gallery_path' => $request
                    ->file('gallery_path')
                    ->store('gallery'),
                'gallery_type' => $request->gallery_type,
            ]);
        } else {
            Gallery::create([
                'gallery_name' => $request->gallery_name,
                'gallery_path' => $request->link,
                'gallery_type' => $request->gallery_type,
            ]);
        }

        $request->session()->flash('success', 'Berhasil Menambah Gakeri');

        return response()->json([
            'message' => 'Berhasil menambahkan galeri!.',
            'redirect' => route('gallery.index'),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->gallery_path) {
            if (Storage::exists($gallery->gallery_path)) {
                Storage::delete($gallery->gallery_path);
            }
        }

        $gallery->delete();

        return redirect()
            ->route('gallery.index')
            ->with('success', 'Barhasil menghapus Galeri!');
    }
}
