<?php

namespace App\Http\Controllers;

use App\feedbacks;
use App\PromotionContacts;
use App\Service;
use Illuminate\Http\Request;
use App\Specializations;

class UserDashBoardController extends Controller
{
    public function index()
    {
        $specializations = $this->specializationIndex();
        $services = $this->serviceIndex();
        $feedbacks = $this->clientFeedbackIndex();
        return view('user.homepage', ["specializations" => $specializations, "services" => $services, "feedbacks" => $feedbacks]);
//        return view('homepage');
    }

    public function specializationIndex()
    {
        $specializations = specializations::all();
        return $specializations;

    }

    public function serviceIndex()
    {
        $services = Service::all();
        return $services;

    }

    public function clientFeedbackIndex()
    {
        $feedbacks = feedbacks::all();
        return $feedbacks;
    }

    public function promotionContactStore(Request $request)
    {
        
        $promotionContact = new PromotionContacts();
        $promotionContact->email = $request->email;
        $promotionContact->save();
        return response($promotionContact);

    }

    public function validatePromotionContact()
    {

        return request()->validate([

            'title' => 'required',
            'shortDescription' => 'required',
            'description' => 'required'
        ]);
    }
}
