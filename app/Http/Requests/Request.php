<?php namespace EcashBook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
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

    public function forbiddenResponse()
    {
        return [
            'success' => false,
            'result'  => [
                'message' => 'You are unauthorized',
                'action'  => 'redirect',
                'path'    => 'logout'
            ]
        ];
    }
}
