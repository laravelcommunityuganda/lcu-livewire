<?php

namespace App\Http\Requests;

use App\Models\LcuJob;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LcuJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->can('create', LcuJob::class);
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|max:2048',
            'location' => 'required|string|max:255',
            'employment_type' => 'required|in:full-time,part-time,contract,internship,freelance',
            'salary_min' => 'nullable|numeric',
            'salary_max' => 'nullable|numeric',
            'salary_currency' => 'nullable|string|size:3',
            'apply_url' => 'required|url',
            'is_remote' => 'boolean',
            'is_featured' => 'boolean',
            'expires_at' => 'required|date|after:today',
        ];
    }
}
