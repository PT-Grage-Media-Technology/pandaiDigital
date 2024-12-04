<?php

namespace App\Http\Controllers;

use App\Models\Alamatkontak;
use App\Models\Menuwebsite;
use App\Models\Template;
use Illuminate\Http\Request;

class PagemenuController extends Controller
{
    //
    public function dinas2(){
        $slugs = explode("/", url()->current());
        $latestslug = $slugs[(count($slugs) - 1)];

        // Find the menu based on the slug
        $data = Menuwebsite::where('link', $latestslug)->first();

        // Retrieve main menu and children for navigation
        $menus = Menuwebsite::where('id_parent', 0)
            ->with('children.children') // Include children up to 2 levels
            ->orderBy('position', 'asc')
            ->get();
        
        // Retrieve the contact information
        $alamat = Alamatkontak::first();

        // Retrieve templates and check active status
        $templateDinas3 = Template::where('folder', 'dinas-3')->first();
        $templateDinas2 = Template::where('folder', 'dinas-2')->first();

        if ($templateDinas3 && $templateDinas3->aktif === 'Y') {
            // Load 'dinas-3' view if active
            return view('dinas-3.detail', compact('data', 'menus', 'alamat'));
        } elseif ($templateDinas2 && $templateDinas2->aktif === 'Y') {
            // Load 'dinas-2' view if active
            return view('dinas-2.detail', compact('data', 'menus', 'alamat'));
        } else {
            // Load default view if no active template
            return view('error.index', compact('data', 'menus', 'alamat'));
        }
    }
}
