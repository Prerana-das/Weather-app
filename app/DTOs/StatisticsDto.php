<?php

namespace App\DTOs;

use Illuminate\Http\Exceptions\HttpResponseException;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class StatisticsDto extends ValidatedDTO
{
    public string $city_id;

    public ?string $filter_date;

    protected function rules(): array
    {
        return [
            'city_id' => ['required', 'string'],
            'filter_date' => ['nullable', 'string'],
        ];
    }

    protected function defaults(): array
    {
        return [];
    }

    protected function casts(): array
    {
        return [
        ];

    }

    protected function failedValidation(): void
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation failed',
            'errors' => $this->validator->errors(),
        ], 422));
    }
}
