<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        //
        $categories  = Category::select('*')
            ->with('child', 'parent');
        $category = '';
        $keySearch = '';

        if ($rq->id) {
            $category = Category::find($rq->id);
        }

        if ($rq->key && $rq->key != '') {
            $categories = $categories->where('categories.name', 'like', '%' . $rq->key . '%');
            $keySearch = 'Result search: ' . $rq->key;
        }

        $categories = $categories->paginate(15);

        return view('admin/categories/index', compact('categories', 'category', 'keySearch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('categories.id', 'categories.name', 'parent_id')
            ->get()->toArray();

        $categoryArray = $this->getChildCategories($categories);

        return view('admin/categories/add', compact('categoryArray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->validate([
            'name' => 'required|min:3|max:255',
            'file' => 'image|nullable|mimes:png,jpg,jpeg'
        ]));

        $category = new Category();
        $category->fill($request->all());

        if ($request->hasFile('image')) {
            $category->image = $this->saveFile($request->image, 'images/categories', 'cate');
        }

        $category->save();

        return redirect()->back()->with('msg-suc', 'Create success category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if ($category) {

            $categories = Category::all()
                ->toArray();
            $categoryArray = $this->getChildCategories($categories);

            return view('admin.categories.edit', compact('category', 'categoryArray'));
        }

        return redirect()->back()->with('msg-er', 'Cannot find category!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->validate([
            'name' => 'required|min:3|max:255',
            'file' => 'image|nullable|mimes:png,jpg,jpeg'
        ]));

        $category = Category::find($id);
        $category->fill($request->all());

        if ($request->hasFile('image')) {
            $category->image = $this->saveFile($request->image, 'images/categories', 'cate');
        }

        $category->save();

        return redirect()->back()->with('msg-suc', 'Update success category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Category::destroy($id);
        return redirect()->back()->with('msg-suc', 'Delete success!');
    }

    // get tree category
    public function getChildCategories(&$listData, $parentId = 0, $level = 0)
    {
        // default truyen $parentId = null vi no la cap 0;
        // note $parentID = sub_categories_id
        $arr = array();
        foreach ($listData as $key => $val) {
            // logic: find all parent -> find child of child ==> continue
            // level se la so cap bac de co the dung str_repeat lap
            $val['level'] = $level;
            if ($val['parent_id'] == $parentId) {
                $arr[] = $val;
                
                // callback
                $menuChild = $this->getChildCategories($listData, $val['id'], $level + 1);
                $arr = array_merge($arr, $menuChild);
            }
        }
        return $arr;
    }

    // save file
    public function saveFile($file, $folder = 'public', $prefixName = '')
    {

        $fileName = uniqid() . '.' . $file->extension();
        $fileName = $prefixName ? $prefixName . '_' . $fileName : $fileName;

        return $file->storeAs($folder, $fileName);
    }
}
