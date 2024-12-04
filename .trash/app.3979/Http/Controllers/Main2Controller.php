<?php

namespace App\Http\Controllers;

use App\Models\Alamatkontak;
    use App\Models\Identitaswebsite;
    use App\Models\Logo;
    use App\Models\Menuwebsite;
    use Illuminate\Http\Request;

    class Main2Controller extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            //
            // $identitas = Identitaswebsite::first();
            // $alamat = Alamatkontak::first();
            // $logo = Logo::orderBy('id_logo', 'DESC')->first();
            // $menus = Menuwebsite::where('id_parent', 0)
            //     ->with('children.children') // Menyertakan children hingga 2 level
            //     ->orderBy('position', 'asc')
            //     ->get();
            return view('dinas-2.layout');
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            //
            $identitas = Identitaswebsite::first();
            $alamat = Alamatkontak::first();
            $logo = Logo::orderBy('id_logo', 'DESC')->first();
            $menus = Menuwebsite::where('id_parent', 0)->with('children')->get();
            return view('dinas-2.layout', compact('identitas', 'alamat', 'logo', 'menus'));
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
        public function show(string $id)
        {
            //
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
        public function destroy(string $id)
        {
            //
        }
    }
    
