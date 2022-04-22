<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
use App\Models\User;
use Illuminate\Http\Request;

class ProspectController extends Controller
{
    public function index()
    {
        $user = User::find(Auth()->user()->id);
        return view('prospects.index')->with([
            'prospects' => $user->prospects()->orderBy('created_at', 'ASC')->get()
        ]);
    }

    public function create()
    {

        return view('prospects.create')->with(
            [
                'tags' => Auth()->user()->tags,
            ]
        );
    }

    public function store(Request $request)
    {
        $prospect = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:prospects,email',
            'telephone' => 'nullable',
            'site_url' => 'required',
            'note' => 'nullable',
        ]);

        $prospect['site_url'] = str_replace("https://", "", $prospect['site_url']);
        $prospect['site_url'] = str_replace("http://", "", $prospect['site_url']);
        $prospect['site_url'] = str_replace("www.", "", $prospect['site_url']);
        $prospect['site_url'] = str_replace("www", "", $prospect['site_url']);
        $prospect['site_url'] = str_replace("/", "", $prospect['site_url']);

        $prospect['user_id'] = Auth()->user()->id;

        foreach ($prospect as $key => $value) {
            $prospect[$key] = trim(strtolower($value));
        }
        $new_prospect = Prospect::create($prospect);
        $new_prospect->tags()->attach($request->tags);
        return back()->with(['message' => 'Prospect created ']);

    }


    public function show(Prospect $prospect)
    {

    }


    public function edit(Prospect $prospect)
    {
        return view('prospects.edit')->with([
            'prospect' => $prospect,
            'tags' => Auth()->user()->tags,
        ]);
    }

    public function update(Request $request, Prospect $prospect)
    {

        $prospect_validated = $request->validate([
            'name' => 'required',
            'telephone' => 'nullable',
            'site_url' => 'nullable',
            'note' => 'nullable',
            'email' => 'nullable',
        ]);

        $prospect_validated['user_id'] = Auth()->user()->id;

        foreach ($prospect_validated as $key => $value) {
            $prospect_validated[$key] = strtolower($value);
        }
        $prospect->name = $prospect_validated['name'];
        $prospect->email = $prospect_validated['email'];
        $prospect->telephone = $prospect_validated['telephone'];
        $prospect->site_url = $prospect_validated['site_url'];
        $prospect->note = $request->note;
        $prospect->tags()->detach();
        $prospect->tags()->attach($request->tags);
        $prospect->save();
        return redirect(route('prospects.edit', $prospect->id))->with(['message' => 'Prospect Updated ']);

    }

    public function destroy(Prospect $prospect)
    {
        $prospect->delete();
        return back()->with([
            'message' => 'deleted succesfuly',
        ]);
    }
}
