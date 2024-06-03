<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Inertia\Inertia;

class PublicPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $slug, Request $request)
    {
        $page = Page::select('id', 'title', 'content')
            ->where('slug', $slug)
            ->firstOrFail();

        $html = Markdown::parse($page->content)->toHtml();

        return Inertia::render('public-page', [
            'id' => $page->id,
            'title' => $page->title,
            'content' => $html,
        ]);
    }
}
