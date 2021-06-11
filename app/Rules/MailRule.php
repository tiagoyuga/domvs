<?php

namespace App\Rules;

class MailRule
{

    /**
     * Validation rules that apply to the request.
     *
     * @var array
     */
	protected static $rules = [
        'email' => 'required|email',
        'title' => 'required|min:2|max:255',
        'text' => 'required|min:2|max:255',
	];

    /**
     * Return default rules
     *
     * @return array
     */
    public static function rules()
    {

        return [
            'email' => self::$rules['email'],
            'title' => self::$rules['title'],
            'text' => self::$rules['text'],
        ];
    }

    /**
     * Return default messages
     *
     * @return array
     */
    public static function messages()
    {
        return [
            'email' => [
                'email.required' => 'Campo Email é obrigatório',
                'email.email' => 'Email inválido',
            ],
            'title' => [
                'title.required' => 'Campo Título é obrigatório',
                'title.min' => 'Campo Título deve conter pelo menos 2 caracteres',
                'title.max' => 'Campo Título deve conter no máximo 255 caracteres',
            ],
            'text' => [
                'text.required' => 'Campo Mensagem é obrigatório',
                'text.min' => 'Campo Mensagem deve conter pelo menos 2 caracteres',
            ]
        ];
    }
}
