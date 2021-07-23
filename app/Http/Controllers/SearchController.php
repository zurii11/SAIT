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
    private function modelNamespace()
    {
        return app()->getNamespace() . 'Models\\';
    }

    public function search(Request $request)
    {

        $searchKeyword = $request->search;
        $exclude = [];

        // Load all the models
        $files = File::allFiles(app()->basePath() . '/app/Models');

        $results = collect($files)->map(function (SplFileInfo $file)
        {
            $filename = $file->getRelativePathname();

            if (substr($filename, -4) !== '.php')
            {
                return null;
            }

            return str_replace('/', '\\' ,substr($filename, 0, -4));
        })->filter(function (?string $classname) use($exclude)
        {
            // Filter searchable models
            if ($classname == null) {
                return false;
            }
            $reflection = new ReflectionClass($this->modelNamespace() . $classname);

            $isModel = $reflection->isSubclassOf(Model::class);

            $isSearchable = $reflection->hasMethod('search');

            return $isModel && $isSearchable && !in_array($reflection->getName(), $exclude, true);
        })->map(function ($classname) use($searchKeyword)
        {
            // call search() against search keyword
            $model = app($this->modelNamespace() . $classname);

            $fields = array_filter($model::searchable_fields, function($k)
            {
                return $k == 'name';
            });

            return $model::search($searchKeyword)->get();

        })->flatten(1);

        // $tst = Station::search('')->get();

        // dd($results);
        return SearchResource::collection($results);


        // result
    }
}
