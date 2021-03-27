<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use DateTime;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $testtdate = "";
        if ($this->material !== null) {
            $testtdate = $this->material['test_date'];
        } else if ($this->concrete !== null) {
            $testtdate = $this->concrete['test_date'];
        }
        $test_date = new DateTime($testtdate);
        $test2 = new DateTime($testtdate);
        $date = new DateTime(date('Y-m-d'));
        $today = new DateTime(date('Y-m-d'));
        $warningdate = $test2->modify("-2 day");

        $newstatus = "";
        $status = $this->status;
        if (!$status) {
            if ($test_date < $today) {
                $newstatus = "Over due";
            } else if ($warningdate <= $today) {
                $newstatus = "Warning";
            } else {
                $newstatus = "Pending";
            }
        }
        if ($status) {
            $newstatus = "Completed";
        }
        $original = parent::toArray($request);
        return array_merge($original, [
            'status' => $newstatus,

        ]);
    }
}
