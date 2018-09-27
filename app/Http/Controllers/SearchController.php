<?php

namespace App\Http\Controllers;

use App\Models\CategoryDetails;
use Illuminate\Support\Facades\Input;

/**
 * Class SearchController
 * @package App\Http\Controllers
 */
class SearchController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        $q = Input::get('q', '');
        if (empty($q)) {
            return redirect('/');
        }
        //$data = CategoryDetails::search($q)->paginate(20);
        $data = CategoryDetails::with(['tags', 'images', 'userCategory.category'])->query($q)->paginate(20);
        //$data = $dataResult->groupBy('userCategory.category.name');
        return view('search.index', compact('data', 'q'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function map()
    {
        $q = Input::get('q', '');
        if (empty($q)) {
            //return redirect('/');
        }

        //$data = CategoryDetails::with(['tags', 'images', 'userCategory.category'])->queryMap($q)->paginate(20);
        return view('search.map', compact('data', 'q'));
    }
}
