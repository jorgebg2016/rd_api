<?php

return [
    'success' => [
        'created' => ':resource cadastrado com sucesso.',
        'deleted' => ':resource com o id :resource_id excluído com sucesso.',
    ],
    'errors' => [
        'not_found_by_id' => ':resource não encontrado através do id :resource_id',
    ],
    'validation' => [
        'integer' => 'O campo :field deve ser um número inteiro.',
        'string' => 'O campo :field deve ser uma string.',
        'required' => 'O campo :field é obrigatório.',
        'regex' => 'Formato do :field inválido.',
        'date' => 'O campo :field deve ser uma data.',
        'date_format' => 'O campo :field deve ser uma data no formato :format.',
        'unique' => 'Já existe um :resource cadastrado com esse :field.'
    ],
    'resources' => [
        'customers' => 'Clientes',
        'customer' => 'Cliente',
    ],
];
