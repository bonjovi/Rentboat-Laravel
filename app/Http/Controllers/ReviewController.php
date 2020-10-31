<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'addreview_text' => 'required|min:2',
        ]);

        $review = Review::create([
            'user_id' => $request->addreview_user_id,
            'boat_id' => $request->addreview_boat_id,
            'text' => $request->addreview_text,
            'rating' => 4,
        ]);

        //\Session::flash('message', 'Отзыв был успешно оттправлен на модерацию');

        return redirect()
            ->back()
            ->with('success', 'Отзыв был успешно отправлен на модерацию');
    }
}
