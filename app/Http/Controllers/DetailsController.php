<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryDetails;
use App\Models\Images;
use App\Models\UserCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userCategories = UserCategories::with(['details', 'category'])->latest()->paginate(20);
        return view('details.index', compact('userCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userCategory = new UserCategories();
        $categories = Category::pluck("name", "id")->toArray();
        return view('details.create', compact('userCategory', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CategoryDetails::$rules);

        DB::transaction(function () use ($request) {
            $catDetails = CategoryDetails::create($request->all());
            UserCategories::create([
                'user_id' => Auth::id(),
                'category_id' => $request->category_id,
                'category_detail_id' => $catDetails->id,
            ]);

            foreach ($request->file('images') as $image) {
                $name = str_random() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/images'), $name);

                Images::create([
                    'category_detail_id' => $catDetails->id,
                    'path' => $name,
                ]);
            }
        });

        return redirect()->route('details.index')
            ->with('success', 'Details submitetd successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCategories $userCategory
     * @return \Illuminate\Http\Response
     */
    public function show(UserCategories $userCategory)
    {
        return view('details.show', compact('userCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCategories $userCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCategories $userCategory)
    {
        return view('userCategories.edit', compact('userCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\UserCategories $userCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCategories $userCategory)
    {
        request()->validate(CategoryDetails::$rules);

        $userCategory->update($request->all());

        return redirect()->route('details.index')
            ->with('success', 'UserCategories updated successfully');
    }

    /**
     * @param UserCategories $userCategory
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(UserCategories $userCategory)
    {
        $userCategory->delete();

        return redirect()->route('details.index')
            ->with('success', 'UserCategories deleted successfully');
    }
}
