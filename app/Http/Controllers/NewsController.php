<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('news.index', [
            'newses' => News::latest()
                ->limit(5)
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        News::create([
            'news_title' => $request->news_title,
            'news_description' => $request->news_description,
        ]);

        return redirect()
            ->route('news.index')
            ->with('success', 'berhasil tambah berita baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('news.edit', [
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $news->update([
            'news_title' => $request->news_title,
            'news_description' => $request->news_description,
        ]);

        return redirect()
            ->route('news.index')
            ->with('success', 'Berhasil merubah Berita!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()
            ->route('news.index')
            ->with('success', 'Berhasil menghapus Berita!');
    }
}
