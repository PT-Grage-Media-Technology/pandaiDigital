<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Identitaswebsite;
use App\Models\Kategori;
use App\Models\Tag;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    //
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $menuItems = [
            ['name' => 'Berita', 'url' => '/administrator/berita'],
            ['name' => 'Kategori Berita', 'url' => '/administrator/kategoriberita'],
            ['name' => 'Tag Berita', 'url' => '/administrator/tagberita'],
            // Tambahkan menu lainnya di sini
        ];
        
        $results = collect($menuItems)->filter(function ($item) use ($query) {
            return stripos($item['name'], $query) !== false;
        })->values();
        
        return response()->json($results);
    }
}
