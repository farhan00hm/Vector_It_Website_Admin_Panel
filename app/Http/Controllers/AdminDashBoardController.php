<?php

namespace App\Http\Controllers;

use App\Applicationslist;
use App\Feedbacks;
use App\Inquiries;
use App\Service;
use Illuminate\Http\Request;
use App\Specializations;
use App\Http\Requests\SpecializationRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


class AdminDashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeSpecialization(SpecializationRequest $request)
    {
        $validated = $request->validated();
        if ($validated) {
            $specialization = new Specializations();
            $specialization->title = $request->title;
            $specialization->short_description = $request->shortDescription;
            $specialization->description = $request->description;
            $specialization->display = $request->display;
            $specialization->save();
            return redirect("/dashboard");

        } else {
            return dd("Validation Failure");
        }
    }

    public function storeService(Request $request)
    {
        if ($this->validateService()) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path() . '/assets/img';
            $image->move($destinationPath, $imageName);
            $service = new Service();
            $service->title = $request->title;
            $service->description = $request->description;
            $service->lists = $request->lists;
            $service->conclusion = $request->conclusion;
            $service->imagePath = $imageName;
            $service->display = $request->display;
            $service->save();
            return redirect("/dashboard");

//            dd($service);

        } else {
            return dd("validation Failure");
        }
    }

    public function storeClientsFeedback(Request $request)
    {
        if ($this->validateClientFeedback()) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path() . '/assets/img';
            $image->move($destinationPath, $imageName);
            $feedback = new Feedbacks();
            $feedback->name = $request->name;
            $feedback->profession = $request->profession;
            $feedback->feedback = $request->feedback;
            $feedback->imagePath = $imageName;
            $feedback->display = $request->display;
            $feedback->save();

            return redirect("/clients-feedback");
        } else {
            return dd("validation Failure");
        }
    }

    public function storeInquiries(Request $request)
    {
        if ($this->validateInquiries()) {
            $inq = new Inquiries();
            $inq->name = $request->name;
            $inq->companyName = $request->companyName;
            $inq->email = $request->email;
            $inq->phoneNumber = $request->phoneNumber;
            $inq->subject = $request->subject;
            $inq->problem = $request->problem;

            $inq->save();

        } else {
            dd("Validation Failure");
        }
    }

    public function dashboard(Request $request)
    {
        $specializations = Specializations::all();
        $services = Service::all();
        return view('dashboard', ["specializations" => $specializations, "services" => $services]);

    }

    public function clientsFeedback()
    {
        $feedbacks = Feedbacks::all();
        return view('clientsfeedback', ["feedbacks" => $feedbacks]);
    }

    public function employeesApplication()
    {
        $applications = Applicationslist::all();
//        dd($applications);
        return view('career', ["applications" => $applications]);
    }


    public function validateSpeciliazation()
    {

        return request()->validate([

            'title' => 'required',
            'shortDescription' => 'required',
            'description' => 'required'
        ]);
    }

    public function validateClientFeedback()
    {

        return request()->validate([

            'name' => 'required',
            'profession' => 'required',
            'feedback' => 'required',
            'image' => 'required'
        ]);
    }

    public function validateService()
    {
        return request()->validate([

            'title' => 'required',
            'description' => 'required',
            'lists' => 'required',
            'conclusion' => 'required',
//            'image' => 'required'
        ]);
    }

    public function validateInquiries()
    {
        return request()->validate([

            'name' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required',
            'problem' => 'required'
        ]);
    }

    public function deletespeciliazation($id)
    {
        $speciliazation = new Specializations();
        $speciliazation::find($id)->delete();
        return redirect("/dashboard");

    }

    public function deleteservice($id)
    {
        $service = new Service();
        $service::find($id)->delete();
        return redirect("/dashboard");
    }

    public function deleteFeedback($id)
    {
        $feedback = new Feedbacks();
        $feedback::find($id)->delete();
        return redirect("/clients-feedback");
    }

    public function editspeciliazation(Request $request, $id)
    {

        $specialiazation = Specializations::findOrFail($id);;
        $specialiazation->id = $id;
        $specialiazation->title = $request->title;
        $specialiazation->short_description = $request->shortDescription;
        $specialiazation->description = $request->description;
        $specialiazation->display = $request->display;

        $specialiazation->update();
        return redirect("/dashboard");

    }

    public function editservice(Request $request, $id)
    {
//        $service = new Service();
        $service = Service::findOrFail($id);
        $service->id = $id;
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $destinationPath = public_path() . '/assets/img';
        $image->move($destinationPath, $imageName);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->lists = $request->lists;
        $service->conclusion = $request->conclusion;
        $service->imagePath = $imageName;
        $service->display = $request->display;
        $service->update();
        return redirect("/dashboard");

    }

    public function editFedback(Request $request, $id)
    {
        $feedback = Feedbacks::findOrFail($id);
        $feedback->id = $id;
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $destinationPath = public_path() . '/assets/img';
        $image->move($destinationPath, $imageName);
        $feedback->name = $request->name;
        $feedback->profession = $request->profession;
        $feedback->feedback = $request->feedback;
        $feedback->imagePath = $imageName;
        $feedback->display = $request->display;
        $feedback->update();
        return redirect("/clients-feedback");
    }

    public function downloadCv($cvName)
    {
        $file = public_path() . '/assets/CV/' . $cvName;
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, $cvName, $headers);
    }

    public function sortApplications(Request $request)
    {

        if ($request->sortBy == "Earlier Application") {
            $sortedApplications = Applicationslist::orderBy('created_at', 'DESC')->get();
            return view("applicationsdiv", ["applications" => $sortedApplications]);
        } elseif ($request->sortBy == "Latest Application") {
            $sortedApplications = Applicationslist::orderBy('created_at', 'ASC')->get();
            return view("applicationsdiv", ["applications" => $sortedApplications]);
        }

    }

    function liveSearch(Request $request)
    {
        $query = $request->get('query');

//        $data = DB::table('applicationslists')
//            ->where('name', 'like', '%' . $query . '%')
//            ->orWhere('email', 'like', '%' . $query . '%')
//            ->orWhere('jobSection', 'like', '%' . $query . '%')
//            ->orderBy('id', 'desc')
//            ->get();
//        dd($data);
//        Applicationslist::orderBy('created_at', 'DESC')->get();
//        $data=Applicationslist::where('id', '1')->get();
        $data=Applicationslist::query()
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('jobSection', 'like', '%' . $query . '%')
            ->get();
//       $data= \GuzzleHttp\json_encode($data);

//        $data=Applications
        return view("applicationsdiv", ["applications" => $data]);
//
//            $total_row = $data->count();


    }
}
