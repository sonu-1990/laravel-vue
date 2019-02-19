<?php
namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

/**
 * This class is used to perform operation related to category.
 */
class CategoryController extends Controller
{
    /**
     * Function is used to addCategory.
     *
     * @param  Request $request Request Data.
     * @return void   Return json.
     */
    public function addCategory(Request $request)
    {
		$this->validate(
			$request, 
			[
				'cat_name'=>'required|min:2|max:50'
			]
		);
        $category = New Category();
        $category->cat_name = $request->cat_name;
        $category->save();
        return ['message'=>'OK'];
	}
	
	public function allCategory()
	{
		$categories = Category::orderBy('id', 'DESC')->get();
		return response()->json([
			'categories' => $categories
		], 200);
	}

	public function deleteCategory($id)
	{
		// return $id;
		$category = Category::find($id);
		$category->delete();
	}

	public function editCategory($id)
	{
		$category = Category::find($id);
		return response()->json([
			'category' => $category
		]);
	}
}
