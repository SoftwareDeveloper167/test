<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
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
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'status' => $this->status ,
            
            // calculate working hours
            'working_hours' => Carbon::parse($this->check_in)->diffInHours(Carbon::parse($this->check_out)) ,
            
            'schedule' => $this->whenLoaded('schedules') , // when relationship
        ];
    }
}
