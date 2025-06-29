<?php

    namespace App\Validation;

    class FormValidation
    {
        public static function regras()
        {
            return [
                "nome" => 'required',
                "email" => 'required',
                "senha" => 'required',
                "status" => 'required',
            ];
        }
    }