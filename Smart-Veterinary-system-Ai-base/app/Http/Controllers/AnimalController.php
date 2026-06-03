<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalImage;
use App\Models\AnimalVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    /**
     * List seller animals
     */
    public function index()
    {
        $animals = Animal::with(['images', 'videos'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('seller.animals.index', compact('animals'));
    }
    public function publicIndex()
    {
        $animals = Animal::with(['images', 'videos', 'seller'])
            ->latest()
            ->get();

        return view('animals.index', compact('animals'));
    }

    /**
     * Show single animal detail
     */
    public function show(Animal $animal)
    {
        $animal->load(['images', 'videos', 'seller']);

        return view('animals.show', compact('animal'));
    }

    /**
     * Create form
     */
    public function create()
    {
        return view('seller.animals.create');
    }

    /**
     * Store new animal
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'price'        => 'nullable|string',
            'age'          => 'nullable|string',
            'gender'       => 'nullable|string',
            'location'     => 'nullable|string',
            'breed'        => 'nullable|string',

            // images
            'images'       => 'required|array|min:1|max:10',
            'images.*'     => 'image|mimes:jpg,jpeg,png|max:2048',

            // videos
            'videos'       => 'nullable|array|max:3',
            'videos.*'     => 'mimes:mp4,mov,avi,wmv|max:20480',
        ]);

        // Create animal
        $animal = Animal::create([
            'user_id'     => Auth::id(),
            'title'       => $request->title,
            'description' => $request->description,
            'price'       => $request->price,
            'age'         => $request->age,
            'gender'      => $request->gender,
            'location'    => $request->location,
            'breed'       => $request->breed,
        ]);

        // Store images
        foreach ($request->file('images') as $image) {
            $path = $image->store('animals/images', 'public');

            AnimalImage::create([
                'animal_id'  => $animal->id,
                'image_path' => $path,
            ]);
        }

        // Store videos (optional)
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $path = $video->store('animals/videos', 'public');

                AnimalVideo::create([
                    'animal_id'  => $animal->id,
                    'video_path' => $path,
                ]);
            }
        }

        return redirect()
            ->route('animals.index')
            ->with('success', 'Animal added successfully');
    }

    /**
     * Edit form
     */
    public function edit(Animal $animal)
    {
        $this->authorizeOwner($animal);

        $animal->load(['images', 'videos']);

        return view('seller.animals.edit', compact('animal'));
    }

    /**
     * Update animal
     */
    public function update(Request $request, Animal $animal)
    {
        $this->authorizeOwner($animal);

        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'price'        => 'nullable|string',
            'age'          => 'nullable|string',
            'gender'       => 'nullable|string',
            'location'     => 'nullable|string',
            'breed'        => 'nullable|string',

            'images.*'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'videos.*'     => 'nullable|mimes:mp4,mov,avi,wmv|max:20480',
        ]);

        // Update main animal data
        $animal->update($data);

        /**
         * 🔁 Replace Images (if uploaded)
         */
        if ($request->hasFile('images')) {

            foreach ($animal->images as $img) {
                Storage::disk('public')->delete($img->image_path);
                $img->delete();
            }

            foreach ($request->file('images') as $image) {
                $path = $image->store('animals/images', 'public');

                AnimalImage::create([
                    'animal_id'  => $animal->id,
                    'image_path' => $path,
                ]);
            }
        }

        /**
         * 🔁 Replace Videos (if uploaded)
         */
        if ($request->hasFile('videos')) {

            foreach ($animal->videos as $vid) {
                Storage::disk('public')->delete($vid->video_path);
                $vid->delete();
            }

            foreach ($request->file('videos') as $video) {
                $path = $video->store('animals/videos', 'public');

                AnimalVideo::create([
                    'animal_id'  => $animal->id,
                    'video_path' => $path,
                ]);
            }
        }

        return redirect()
            ->route('animals.index')
            ->with('success', 'Animal updated successfully');
    }

    /**
     * Delete animal
     */
    public function destroy(Animal $animal)
    {
        $this->authorizeOwner($animal);

        foreach ($animal->images as $img) {
            Storage::disk('public')->delete($img->image_path);
            $img->delete();
        }

        foreach ($animal->videos as $vid) {
            Storage::disk('public')->delete($vid->video_path);
            $vid->delete();
        }

        $animal->delete();

        return redirect()
            ->route('animals.index')
            ->with('success', 'Animal deleted successfully');
    }

    /**
     * Ownership check
     */
    private function authorizeOwner(Animal $animal)
    {
        if ($animal->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }
    }
}
