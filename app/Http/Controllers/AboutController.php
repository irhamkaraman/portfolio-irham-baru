<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Team;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AboutController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        return view('app.about.about-me', compact('user'));
    }

    public function aboutUpdate(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'about' => 'required',
                'avatar' => 'image|mimes:jpeg,png|max:1048|dimensions:ratio=1/1',
                'favicon' => 'image|mimes:jpeg,png|max:1048|dimensions:ratio=1/1',
                'whatsapp' => 'required|numeric|digits:12',
                'instagram' => 'required',
                'github' => 'required',
                'linkedin' => 'required',
                'address' => 'required',
                'birthdate' => 'required',
                'new_password' => 'nullable|min:8',
                'old_password' => 'nullable'
            ]);

            $user = User::find(1);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->about = $request->about;
            $user->birthdate = $request->birthdate;
            $user->whatsapp = $request->whatsapp;
            $user->instagram = $request->instagram;
            $user->github = $request->github;
            $user->linkedin = $request->linkedin;
            $user->address = $request->address;

            if ($request->filled('new_password')) {
                if ($request->filled('old_password')) {
                    if (!Hash::check($request->old_password, $user->password)) {
                        return redirect()->back()->with('error', 'Password lama tidak cocok');
                    } elseif ($request->new_password == $request->old_password) {
                        return redirect()->back()->with('error', 'Password baru tidak boleh sama dengan password lama');
                    } else {
                        $user->password = bcrypt($request->new_password);
                    }
                } else {
                    return redirect()->back()->with('error', 'Password lama harus diisi');
                }
            }

            if ($request->hasFile('avatar')) {
                if ($user->avatar) {
                    Storage::delete('public/avatar/' . $user->avatar);
                }
                $avatarName = Carbon::now()->format('Ymd_His') . '_' . $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->storeAs('public/avatar', $avatarName);
                $user->avatar = $avatarName;
            }
            if ($request->hasFile('favicon')) {
                if ($user->favicon) {
                    Storage::delete('public/favicon/' . $user->favicon);
                }
                $faviconName = Carbon::now()->format('Ymd_His') . '_' . $request->file('favicon')->getClientOriginalName();
                $request->file('favicon')->storeAs('public/favicon', $faviconName);
                $user->favicon = $faviconName;
            }
            $user->save();

            return redirect()->route('about')->with('success', 'Data profil berhasil diperbarui');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function services()
    {
        $user = User::find(1);
        $services = Service::latest()->get();
        return view('app.about.services', compact( 'services', 'user'));
    }

    public function serviceEdit($id)
    {
        $user = User::find(1);
        $service = Service::find($id);
        return view('app.about.serviceEdit', compact('service', 'user'));
    }

    public function serviceUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required',
                'icon' => 'nullable|mimes:svg',
                'description' => 'required',
            ]);

            $service = Service::find($id);
            $service->title = $request->title;
            $service->description = $request->description;

            if ($request->hasFile('icon')) {
                if ($service->icon) {
                    Storage::delete('public/services/' . $service->icon);
                }
                $iconName = Carbon::now()->format('Ymd_His') . '_' . $request->file('icon')->getClientOriginalName();
                $request->file('icon')->storeAs('public/services', $iconName);
                $service->icon = $iconName;
            }

            $service->save();
            return redirect()->route('services')->with('success', 'Data keahlian berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Team
    public function team()
    {
        $user = User::find(1);
        $teams = Team::latest()->get()->map(function ($team) {
            $description = explode(' ', $team->description);
            $team->description = implode(' ', array_slice($description, 0, 5));
            return $team;
        });
        return view('app.about.team', compact('teams', 'user'));
    }

    public function teamAdd()
    {
        $user = User::find(1);
        return view('app.about.teamAdd', compact('user'));
    }

    public function teamStore(Request $request)
    {
        try {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png|max:1048|dimensions:ratio=1/1',
                'name' => 'required',
                'description' => 'required',
            ]);

            $team = new Team();
            $team->name = $request->name;
            $team->description = $request->description;
            if ($request->hasFile('avatar')) {
                $avatarName = Carbon::now()->format('Ymd_His') . '_' . $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->storeAs('public/teams', $avatarName);
                $team->avatar = $avatarName;
            }
            $team->save();
            return redirect()->route('team')->with('success', 'Data tim berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function teamDelete($id)
    {
        $team = Team::find($id);
        if ($team->avatar) {
            Storage::delete('public/teams/' . $team->avatar);
        }
        $team->delete();
        return redirect()->back()->with('success', 'Data tim berhasil dihapus');
    }

    public function teamEdit($id)
    {
        $user = User::find(1);
        $team = Team::find($id);
        return view('app.about.teamEdit', compact('team', 'user'));
    }

    public function teamUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'avatar' => 'image|mimes:jpeg,png|max:1048',
                'name' => 'required',
                'description' => 'required',
            ]);

            $team = Team::find($id);
            $team->name = $request->name;
            $team->description = $request->description;
            if ($request->hasFile('avatar')) {
                if ($team->avatar) {
                    Storage::delete('public/teams/' . $team->avatar);
                }
                $avatarName = Carbon::now()->format('Ymd_His') . '_' . $request->file('avatar')->getClientOriginalName();
                $request->file('avatar')->storeAs('public/teams', $avatarName);
                $team->avatar = $avatarName;
            }
            $team->save();
            return redirect()->route('team')->with('success', 'Data tim berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    // Tech Images
    public function techImages()
    {
        $user = User::find(1);
        $technologies = Technology::latest()->get();

        return view('app.about.techImages', compact('user', 'technologies'));
    }

    public function techImagesAdd()
    {
        $user = User::find(1);
        return view('app.about.techImagesAdd', compact('user'));
    }

    public function techImagesStore(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png|max:1048',
                'url' => 'required|url',
            ]);

            $technology = new Technology();
            $technology->url = $request->url;
            if ($request->hasFile('image')) {
                $imageName = Carbon::now()->format('Ymd_His') . '_' . $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('public/technologies', $imageName);
                $technology->image = $imageName;
            }
            $technology->save();
            return redirect()->route('tech-images')->with('success', 'Data gambar teknologi berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function techImagesDelete($id)
    {
        $technology = Technology::find($id);
        if ($technology->image) {
            Storage::delete('public/technologies/' . $technology->image);
        }
        $technology->delete();
        return redirect()->back()->with('success', 'Data gambar teknologi berhasil dihapus');
    }

}
