<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CardSocialLink;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    public function getCardSocialLink()
    {
        $links = CardSocialLink::select('id', 'social_link', 'label')->get();
        return response()->json(['status' => true, 'options' => $links], 200);
    }

    public function deleteSocialLinks($id)
    {
        // return 1;

        try {
            $links = CardSocialLink::FindOrFail($id);
            if (!is_null($links)) {
                $links->delete();
            }
        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
        return response()->json(['status' => true, 'options' => $links], 200);
    }
}
