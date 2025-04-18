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
                ->with('user')
                ->when($request->input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%$search%");
                })
                ->latest()
                ->paginate(5)
                ->withQueryString()
                ->through(fn($classifield) => [
                    'id' => $classifield->id,
                    'name' => $classifield->name,
                    'price' => $classifield->price,
                    'description' => $classifield->description,
                    'photos' => $classifield->photos,
                    'user_name' => $classifield->user->name,
                    'created_at' => $classifield->created_at,
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
            'name' => ['required', 'max:255', "min:3"],
            'price' => ['required', 'numeric', 'max:999999', 'min:1'],
            'description' => ['required', 'max:1000', 'min:10'],
            'photos' => ['required', 'array', 'max:5'],
            'photos.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ], [
            'photos.required' => 'You must upload at least one photo.',
            'photos.*.required' => 'Each photo is required.',
            'photos.*.image' => 'Each file must be an image.',
            'photos.*.mimes' => 'Allowed formats: jpeg, png, jpg, gif, svg.',
            'photos.*.max' => 'Each photo may not be larger than 2MB.',
        ]);

        $attributes['user_id'] = Classifield::getRandomId();

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
        $classifield = Classifield::with('photos', 'user')->findOrFail($id);

        return Inertia::render('Classifields/Show', [
            'classifield' => $classifield,
            'returnUrl' => '/classifields' . (request()->getQueryString() ? '?' . request()->getQueryString() : ''),
        ]);
    }
}
