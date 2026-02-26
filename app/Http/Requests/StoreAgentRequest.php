<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:agents,email',
            'phone' => 'required|string',
            'team_id' => 'required|exists:teams,id',
            'status' => 'required|in:0,1',
        ];
    }
}
