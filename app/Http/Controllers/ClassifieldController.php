<?php

namespace App\Http\Controllers;

use App\Models\Classifield;
use App\Models\Photo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClassifieldController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Classifields/Index', [
            'classifields' => Classifield::query()
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%$search%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($classifield) => [
                    'id' => $classifield->id,
                    'name' => $classifield->name,
                    'price' => $classifield->price,
                    'description' => $classifield->description,
                    'photos' => $classifield->photos,
                ]),
            'filters' => $request->only('search'),
        ]);
    }

    public function create()
    {
        return Inertia::render('Classifields/Create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|max:255',
            'price' => ['required', 'numeric', 'max:999999'],
            'description' => ['required', 'max:255'],
            'photos' => 'array|max:5',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $attributes['user_id'] = rand(1, 111);

        $classifield = Classifield::create($attributes);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('photos', 'public');

                Photo::create([
                    'classifield_id' => $classifield->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect('/classifields');
    }

    public function show($id)
    {
        $classifield = Classifield::with('photos')->findOrFail($id);

        return Inertia::render('Classifields/Show', [
            'classifield' => $classifield,
            'returnUrl' => '/classifields' . (request()->getQueryString() ? '?' . request()->getQueryString() : ''),
        ]);
    }
}
