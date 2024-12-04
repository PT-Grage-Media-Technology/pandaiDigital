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

    public function test()
    {
        // $tags = Tag::orderBy('id_tag', 'desc')->get();
        // var_dump($tags);

        // return '';

        $tags = Tag::orderBy('id_tag', 'DESC')->get();

        // $value = $tags->toArray();



        foreach($tags as $tag ) {
            // $_ck = (array_search($tag->tag_seo, ['palestina']) === false)? '' : 'checked';
            $check = in_array($tag->tag_seo, ['palestina']) ? 'checked' : '';
            var_dump($check);
        }
        return '';
    }

    public function publish_listberita(){
        // cek_session_admin();
		// if ($this->uri->segment(4)=='Y'){
		// 	$data = array('status'=>'N');
		// }else{
		// 	$data = array('status'=>'Y');
		// }
        // $where = array('id_berita' => $this->uri->segment(3));
		// $this->model_app->update('berita', $data, $where);
		// redirect('administrator/listberita');
	}


    // public function layout()
    // {

    //     $identitas = Identitaswebsite::first();
    //     return view('administrator/layout', compact('identitas'));
    // }
}
