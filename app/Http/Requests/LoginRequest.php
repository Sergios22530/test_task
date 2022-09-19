<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'exists:users,name'],
            'phone_number' => ['required', 'exists:users,phone_number', 'min:10'],
        ];
    }


    /**
     * @param Validator $validator
     */
    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            /** @var ?User $user*/
            /** @var ?Validator $validator*/
            $user = (new UserRepository())->findUser($this->get('name'),$this->get('phone_number'));

           $validator->errors()->addIf(!$user,'name','Invalid name');
           $validator->errors()->addIf(!$user,'phone_number','Invalid phone');
        });
    }
}
