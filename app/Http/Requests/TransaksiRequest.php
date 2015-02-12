<?php namespace EcashBook\Http\Requests;

use Illuminate\Validation\Validator;

class TransaksiRequest extends Request
{
    /**
     * @var array
     */
    protected $customAttributes = [
        'uraian' => 'Uraian',
        'status' => 'Status',
        'jumlah' => 'Jumlah'
    ];

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

    /**
     * @param $validator
     *
     * @return mixed
     */
    public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->customAttributes);
    }

    /**
     * @param Validator $validator
     *
     * @return array
     */
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
