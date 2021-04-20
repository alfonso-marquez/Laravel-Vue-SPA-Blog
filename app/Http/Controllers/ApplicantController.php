<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    // all applicants
    public function index()
    {
        return Applicant::all()->toArray();
    }

    // view single applicant
    public function view($id)
    {
        $applicant = Applicant::find($id);
        return response()->json($applicant);
    }
    // add applicant
    public function add(Request $request)
    {
        $applicant = new Applicant([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'middle_name' => $request->input('middle_name'),
            'age' => $request->input('age'),
            'details' => $request->input('details'),
        ]);
        $applicant->save();

        return response()->json(
            [
                'success' => true,
                'message' => 'Applicant was added successfully'
            ]
        );
    }

    // edit applicant
    public function edit($id)
    {
        $applicant = Applicant::find($id);
        return response()->json($applicant);
    }

    // update applicant
    public function update($id, Request $request)
    {
        $applicant = Applicant::find($id);
        $applicant->update($request->all());

        return response()->json('Applicant was successfully updated');
    }

    // soft delete applicant
    public function delete($id)
    {
        $applicant = Applicant::find($id);
        $applicant->delete();

        return response()->json('Applicant was successfully deleted');
    }

    // restore applicant
    public function restore($id)
    {
        $applicant = Applicant::withTrashed()->find($id)->restore();
        return response()->json($applicant);
    }

    // get deleted
    public function indexDeleted()
    {
        return Applicant::onlyTrashed()->get()->toArray();
        // return array_reverse($deletedapplicants);
    }
}
