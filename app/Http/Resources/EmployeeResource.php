<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'designation' => $this->designation,
            'email' => $this->email , // when relationship
            'attendances' =>  $this->whenLoaded('attendances') , // when relationship
            // 'schedules' => ScheduleResource::collection( $this->whenLoaded('schedules') ) , // when relationship
        ];
    }
}
