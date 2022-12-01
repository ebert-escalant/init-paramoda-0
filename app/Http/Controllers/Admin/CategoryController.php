<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\PlatformHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $searchParameter=$request->has('search') ? $request->input('search') : '';
        $paginate=PlatformHelper::preparePaginate(Category::query(), 10, $request->page);

        return view('admin.categories.index',[
            'data' => $paginate['data'],
            'currentPage' => $paginate['currentPage'],
            'quantityPage' => $paginate['quantityPage'],
            'searchParameter' => $searchParameter
        ]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Category $category)
    {
        //
    }
    public function edit(Category $category)
    {
        //
    }
    public function update(Request $request, Category $category)
    {
        //
    }
    public function destroy(Category $category)
    {
        //
    }
}
