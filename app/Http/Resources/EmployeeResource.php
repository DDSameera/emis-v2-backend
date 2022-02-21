<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'emp_no' => $this->emp_no,
            'birth_date' => $this->birth_date,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'hire_date' => $this->hire_date,
            'salaries' => SalaryResource::collection($this->whenLoaded('salaries')),
            'designations' => DesignationResource::collection($this->whenLoaded('designations'))

        ];
    }
}
