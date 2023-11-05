<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
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
            'attendance_date' => $this->attendance_date,
            'description' => $this->description,
            'location' => $this->whenLoaded('locations') , // when relationship
            'shift' => $this->whenLoaded('shifts') , // when relationship
            'attendances' => $this->whenLoaded('attendances') , // when relationship  
        ];
    }
}
