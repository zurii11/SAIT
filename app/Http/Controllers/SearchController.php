<?php

namespace App\Http\Controllers;

use App\Http\Resources\SearchResource;
use App\Models\Station;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;
use \ReflectionClass;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $searchKeyword = $request->search;

        $model = Station::where('name', 'like', "%{$searchKeyword}%")->get();

        return SearchResource::collection($model);
    }
}
