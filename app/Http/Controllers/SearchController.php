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
    public function index()
    {
        $q = Input::get('q', '');
        if (empty($q)) {
            return redirect('/');
        }
        //$data = CategoryDetails::search($q)->paginate(20);
        $data = CategoryDetails::with(['tags', 'userCategory', 'userCategory.category'])->query($q)->paginate(20);
        //$data = $dataResult->groupBy('userCategory.category.name');
        return view('search.index', compact('data', 'q'));
    }
}
