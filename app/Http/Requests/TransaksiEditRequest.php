<?php namespace EcashBook\Http\Requests;

use Illuminate\Validation\Validator;

class TransaksiEditRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'uraian' => 'required|max:255',
            'status' => 'required',
            'jumlah' => 'required|integer',
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        $message = $validator->errors();

        return [
            'success'    => false,
            'validation' => [
                'uraian' => $message->first('uraian'),
                'jumlah' => $message->first('jumlah'),
                'status' => $message->first('status'),
            ]
        ];
    }

}
