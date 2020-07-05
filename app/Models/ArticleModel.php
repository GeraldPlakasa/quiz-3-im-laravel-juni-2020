<?php 

namespace app\Models;
use Illuminate\Support\Facades\DB;

class ArticleModel{

	public static function get_all(){
		$articles = DB::table('articles')->get();
		return $articles;
	}

	public static function save($data){
		$article = DB::table('articles')->insert($data);
		return $article;
	}

	public static function get_by_id($id){
		$article = DB::table('articles')->where('id', $id)->first();
		return $article;
	}

	public static function update($id, $article){
		$article = DB::table('articles')
					->where('id', $id)
					->update($article);
		return $article;
	}

	public static function destroy($id){
		$article = DB::table('articles')->where('id', $id)->delete();
		return $article;
	}
}