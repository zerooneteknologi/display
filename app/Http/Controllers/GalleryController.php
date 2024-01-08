<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

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
                'gallery_type' => $request->gallery_type,
                'gallery_path' => 'gallery/' . $request->file_name,
            ]);
        } else {
            Gallery::create([
                'gallery_name' => $request->gallery_name,
                'gallery_path' => $request->link,
                'gallery_type' => $request->gallery_type,
            ]);
        }

        return redirect()
            ->route('gallery.index')
            ->with('success', 'Berhasil Menambah Gakeri');
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

    public function upload(Request $request)
    {
        $receiver = new FileReceiver(
            'file',
            $request,
            HandlerFactory::classFromRequest($request)
        );

        if (!$receiver->isUploaded()) {
            # code...
        }

        $fileReceived = $receiver->receive();

        if ($fileReceived->isFinished()) {
            $file = $fileReceived->getFile();
            $extension = $file->getClientOriginalExtension();
            $fileName = $this->createFilename($file);

            $path = Storage::putFileAs('gallery', $file, $fileName);

            // delete chunked
            unlink($file->getPathname());

            return [
                'path' => asset('storage/' . $path),
                'fileName' => $fileName,
            ];
        }

        $hendler = $fileReceived->handler();

        return [
            'done' => $hendler->getPercentageDone(),
            'status' => true,
        ];
    }

    protected function createFilename(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = str_replace(
            '.' . $extension,
            '',
            $file->getClientOriginalName()
        ); // Filename without extension

        // Add timestamp hash to name of the file
        $filename = time() . '.' . $extension;

        return $filename;
    }
}
