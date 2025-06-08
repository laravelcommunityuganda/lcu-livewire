<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'min:20'],
            'type' => ['required', 'min:20'],
            'start_date' => ['required', 'datetime'],
            'location' => ['required', 'string'],
            'is_online' => ['required', 'bool'],
        ];
    }
}
