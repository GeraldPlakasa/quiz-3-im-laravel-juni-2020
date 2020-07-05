<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleModel;

class ArticleController extends Controller{
    public function index(){
    	$articles = ArticleModel::get_all();
    	return view('article.index', compact('articles'));
    }

    public function create(){
    	return view('article.create');
    }

    public function store(Request $request){
    	$data = $request->all();
    	unset($data['_token']);
    	$slug = strtolower($data['judul']);
    	$slug = str_replace(" ", "-", $slug);
    	$data += ['slug'=>$slug, 'user_id'=>1];

    	$cek = ArticleModel::save($data);

    	if ($cek) {
    		return redirect('/artikel');
    	}
    }

    public function show($id){
    	$article = ArticleModel::get_by_id($id);
    	$tag_sebelum = $article->tag;
    	$tag_setelah = [];
    	$tag = '';
    	for ($i=0; $i <strlen($tag_sebelum) ; $i++) { 
    		$cek = $tag_sebelum[$i];
    		if ($cek == ',') {
    			array_push($tag_setelah, $tag);
    			$tag = '';
    		} else {
    			$tag .= $cek; 
    		}
    	}
    	array_push($tag_setelah, $tag);
    	return view('article.detail', compact('article', 'tag_setelah'));
    }

    public function edit($id){
    	$article = ArticleModel::get_by_id($id);
    	return view('article.update', compact('article'));
    }

    public function update($id, Request $request){
    	$data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        $slug = strtolower($data['judul']);
    	$slug = str_replace(" ", "-", $slug);
    	$data['slug'] = $slug;

        $article = ArticleModel::update($id, $data);
        return redirect('/artikel');
    }

    public function destroy($id){
        $article = ArticleModel::destroy($id);
        return redirect('/artikel');
    }



}
