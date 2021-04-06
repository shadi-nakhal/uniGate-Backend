<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Material;
use App\User;
use DateTime;

class SandTestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $test_date = new DateTime($this->sample['test_date']);
        $test2 = new DateTime($this->sample['test_date']);
        $date = new DateTime(date('Y-m-d'));
        $today = new DateTime(date('Y-m-d'));
        $warningdate = $test2->modify("-2 day");

        $newstatus = "";
        $status = $this->status;
        if (!$status) {
            $newstatus = "Pending";
        } else if ($test_date < $today) {
            $newstatus = "Over due";
        } else if ($warningdate <= $today) {
            $newstatus = "Warning";
        }
        if ($status) {
            $newstatus = "Completed";
        }
        $original = parent::toArray($request);
        $tested_by = User::where('id', $this->sample->tasks->pluck('technician_id')[0])->first();
        return array_merge($original, [
            'technician_name' => $this->technician['firstname'] . " " . $this->technician['lastname'],
            'test_date' => $this->sample['test_date'],
            'sample_type' => $this->sample['type'],
            'sample_description' => $this->sample['type_description'],
            'test_name' => $this->sample->tasks->pluck('test_name')[0],
            'status' => $newstatus,
            'sample' => "",
            'tested_by' => $tested_by->firstname . " " . $tested_by->lastname

        ]);
    }
}
