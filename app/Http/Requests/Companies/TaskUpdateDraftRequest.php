<?php

namespace App\Http\Requests\Companies;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateDraftRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'project_id'      => 'bail | required | uuid',
            'name'            => 'bail | required | string | max:64',
            'content'         => 'nullable | bail | string | max:200',
            'company_user_id' => 'nullable | uuid',
            'superior_id'     => 'nullable | uuid',
            'accounting_id'   => 'nullable | uuid',
            'budget'          => 'nullable | bail | integer | digits_between:1, 12',
            'price'           => 'nullable | bail | integer | digits_between:1, 12',
            'partner_id'      => 'nullable | uuid',
        ];
    }
}