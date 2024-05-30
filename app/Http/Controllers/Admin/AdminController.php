<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

abstract class AdminController extends Controller
{
    public function __construct() {
        Inertia::share([
            "layout" => fn () => [
                "menu" => [
                    ["Admin", route('admin.index')],
                    ["Pages", route('pages.index')]
                ]
            ]
        ]);
    }
}
