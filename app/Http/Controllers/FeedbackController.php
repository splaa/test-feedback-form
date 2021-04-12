<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class FeedbackController extends Controller
{
    /**
     * FeedbackController constructor.
     */
    public function __construct() {
        $this->middleware('permission:feedback-list|feedback-create|feedback-edit|feedback-delete', ['only' => ['index','show']]);
        $this->middleware('permission:feedback-create', ['only' => ['create','store']]);
        $this->middleware('permission:feedback-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:feedback-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $feedbacks = Feedback::paginate(10);
        return view('feedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:100',
            'message' => 'required|max:500',
        ]);
        $feedback = Feedback::create([
            'title' => $request['title'],
            'email' => auth()->user()->email,
            'message' => $request['message'],
        ]);

        return redirect()->route('feedback.index')
            ->whith('success', 'Ваше сообщение успешно принято к обработке');
    }

    /**
     * Display the specified resource.
     *
     * @param  Feedback  $feedback
     * @return View
     */
    public function show(Feedback $feedback): View
    {
        return view('feedback.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Feedback  $feedback
     * @return View
     */
    public function edit(Feedback $feedback):View
    {
        return view('feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Feedback  $feedback
     * @return RedirectResponse
     */
    public function update(Request $request, Feedback $feedback): RedirectResponse
    {
        $request->validate([
            'title' => 'string|nullable|max:100',
            'message' => 'string|nullable|max:500',
        ]);
        $feedback->update($request->all());

        return redirect()->route('feedback.index')
            ->with('success', 'Feedback updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Feedback  $feedback
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Feedback $feedback): RedirectResponse
    {
        $feedback->delete();
        return redirect()->route('feedback.index')
            ->with('success', 'Feedback deleted successfully');
    }
}
