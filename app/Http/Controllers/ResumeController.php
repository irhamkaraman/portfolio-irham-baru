<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experiences;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function education()
    {
        $user = User::find(1);
        $educations = Education::latest()->get()->map(function ($education) {
            $description = $education->description;
            $words = explode(' ', $description);
            $education->description = implode(' ', array_slice($words, 0, 3));
            return $education;
        });
        return view('app.resume.education', compact('user', 'educations'));
    }

    public function educationAdd()
    {
        $user = User::find(1);
        return view('app.resume.educationAdd', compact('user'));
    }

    public function educationStore(Request $request)
    {
        try {
            $request->validate([
                'school' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'description' => 'required',
            ]);

            if ($request->start_date > $request->end_date) {
                return redirect()->back()->with('error', 'Tahun mulai harus lebih kecil dari tahun selesai');
            }

            $education = new Education();
            $education->school = $request->school;
            $education->start_date = $request->start_date;
            $education->end_date = $request->end_date;
            $education->description = $request->description;
            $education->save();

            return redirect()->route('education')->with('success', 'Data pendidikan berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function educationEdit($id)
    {
        $user = User::find(1);
        $education = Education::find($id);
        return view('app.resume.educationEdit', compact('user', 'education'));
    }

    public function educationUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'school' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'description' => 'required',
            ]);

            if ($request->start_date > $request->end_date) {
                return redirect()->back()->with('error', 'Tahun mulai harus lebih kecil dari tahun selesai');
            }

            $education = Education::find($id);
            $education->school = $request->school;
            $education->start_date = $request->start_date;
            $education->end_date = $request->end_date;
            $education->description = $request->description;
            $education->save();

            return redirect()->route('education')->with('success', 'Data pendidikan berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function educationDelete($id)
    {
        try {
            Education::find($id)->delete();
            return redirect()->back()->with('success', 'Data pendidikan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    // Experience
    public function experience()
    {
        $user = User::find(1);
        $experiences = Experiences::latest('start_date')->get()->map(function ($experience) {
            $description = $experience->description;
            $words = explode(' ', $description);
            $experience->description = implode(' ', array_slice($words, 0, 3));
            return $experience;
        });
        return view('app.resume.experience', compact('user', 'experiences'));
    }

    public function experienceAdd()
    {
        $user = User::find(1);
        return view('app.resume.experienceAdd', compact('user'));
    }

    public function experienceStore(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'description' => 'required',
            ]);

            if ($request->start_date > $request->end_date) {
                return redirect()->back()->with('error', 'Tahun mulai harus lebih kecil dari tahun selesai');
            }

            $experience = new Experiences();
            $experience->title = $request->title;
            $experience->start_date = $request->start_date;
            $experience->end_date = $request->end_date;
            $experience->description = $request->description;
            $experience->save();

            return redirect()->route('experience')->with('success', 'Data pengalaman kerja berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function experienceEdit($id)
    {
        $user = User::find(1);
        $experience = Experiences::find($id);
        return view('app.resume.experienceEdit', compact('user', 'experience'));
    }

    public function experienceUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'description' => 'required',
            ]);

            if ($request->start_date > $request->end_date) {
                return redirect()->back()->with('error', 'Tahun mulai harus lebih kecil dari tahun selesai');
            }

            $experience = Experiences::find($id);
            $experience->title = $request->title;
            $experience->start_date = $request->start_date;
            $experience->end_date = $request->end_date;
            $experience->description = $request->description;
            $experience->save();

            return redirect()->route('experience')->with('success', 'Data pengalaman kerja berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function experienceDelete($id)
    {
        try {
            Experiences::find($id)->delete();
            return redirect()->back()->with('success', 'Data pengalaman kerja berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    // Skills

    public function skills()
    {
        $user = User::find(1);
        $skills = Skill::latest()->get();
        return view('app.resume.skills', compact('user', 'skills'));
    }

    public function skillsAdd()
    {
        $user = User::find(1);
        return view('app.resume.skillsAdd', compact('user'));
    }

    public function skillsStore(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'range' => 'required',
            ]);

            $skill = new Skill();
            $skill->title = $request->title;
            $skill->range = $request->range;
            $skill->save();

            return redirect()->route('skills')->with('success', 'Data skill berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function skillsEdit($id)
    {
        $user = User::find(1);
        $skills = Skill::find($id);
        return view('app.resume.skillsEdit', compact('user', 'skills'));
    }

    public function skillsUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required',
                'range' => 'required',
            ]);

            $skill = Skill::find($id);
            $skill->title = $request->title;
            $skill->range = $request->range;
            $skill->save();

            return redirect()->route('skills')->with('success', 'Data skill berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function skillsDelete($id)
    {
        try {
            Skill::find($id)->delete();
            return redirect()->back()->with('success', 'Data skill berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
