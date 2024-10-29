<?php

use App\Models\Attraction;
use App\Models\Destination;
use App\Models\Setting;
use App\Models\Metadata;
use App\Models\PageSetting;
use App\Models\Tour;
use App\Models\Post;
use App\Traits\CurrencyConverterTrait;

function settings($name)
{
    return Setting::Where('name', $name)->first()->value;
}

function meta()
{
    $defaultTitle = 'Default Title';
    $metaTitle = $defaultTitle;
    $metaDescription = '';
    $metaKeywords = '';

    $routeName = request()->route()->getName();

    if (str_ends_with($routeName, '.index')) {
        $data = PageSetting::where('slug', request()->route()->uri())->firstOrFail();
        $metaTitle = $data->meta_title ?? $defaultTitle;
        $metaDescription = $data->meta_description ?? '';
        $metaKeywords = $data->meta_keyword ?? '';
    } elseif (str_ends_with($routeName, '.show')) {

        $data = Metadata::where('model_type', basename(Illuminate\Support\Facades\Request::path()))->where('model_id', 0)->first();
        $metaTitle = $data->meta_title ?? $defaultTitle;
        $metaDescription = $data->meta_description ?? '';
        $metaKeywords = $data->meta_keyword ?? '';
    }


    $metaTags = "<title>$metaTitle</title>\n";
    if (!empty($metaDescription)) {
        $metaTags .= "<meta name=\"description\" content=\"{$metaDescription}\">\n";
    }
    if (!empty($metaKeywords)) {
        $metaTags .= "<meta name=\"keywords\" content=\"{$metaKeywords}\">\n";
    }
    return $metaTags;
}


function getModel($module)
{
    $converter = new class {
        use CurrencyConverterTrait;
    };

    if ($module == 'Tour') {
        $tours = Tour::with('images')->get();
        foreach ($tours as $tour) {
            $tour->adult_price = $converter->arrayFormatCurrency($tour->adult_price);
        }
        return $tours;
    } elseif ($module == 'Attraction') {
        return Attraction::with('images')->get();
    } elseif ($module == 'Destination') {
        $destinations = Destination::where('status', 1)
        ->with('image', 'tours', 'activities')
        ->latest() // Orders by `created_at` in descending order
        ->take(7)  // Limits the result to 7 records
        ->get();
    
        return $destinations;
    } elseif ($module == '5-Posts') {
        return Post::where('published', 1)->with('category', 'images')->orderBy('id', 'desc')->take(5)->get();
    } elseif ($module == 'Home-qna') {
        return json_decode(PageSetting::where('slug', '/')->first()->qna);
    }
}
