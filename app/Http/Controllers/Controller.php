<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function status($obj, $read = false)
    {
        $string1 = '';
        if ($read) {
            if ($obj->status == 0) {
                $string1 .= '<span  id="btn_state_' . $obj->id . '"
                 class="btn btn-dark state_btn state_' . $obj->status .
                    '" data-id="' . $obj->id . '">';
                $string1 .= __('InActive');
            } elseif ($obj->status == 1) {
                $string1 .= '<span disabled style="opacity: 1;"  id="btn_status_' . $obj->id . '" class="text-success font-weight-bold state_' . $obj->status .
                    '">';
                $string1 .= __('Active');
            }
            $string1 .= '</span>';
        } else {
            if ($obj->status == 0) {
                $string1 .= '<button  id="btn_status_' . $obj->id . '"
                 class="btn btn-dark status_btn status_' . $obj->status .
                    '" data-id="' . $obj->id . '">';
                $string1 .= __('InActive');
            } elseif ($obj->status == 1) {
                $string1 .= '<button  style="opacity: 1;"  id="btn_status_' . $obj->id . '" class="btn btn-success text-white font-weight-bold status_' . $obj->status .
                    '">';
                $string1 .= __('Active');
            }
            $string1 .= '</button>';
        }

        return $string1;
    }
}
