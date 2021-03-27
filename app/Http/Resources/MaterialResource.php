<?php

namespace App\Http\Resources;

use App\Material;
use Illuminate\Http\Resources\Json\JsonResource;
use DateTime;

class MaterialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $status = "UnAssigned";
        $tasks = TaskResource::collection($this->tasks);
        $test_date = new DateTime($this->test_date);
        $test2 = new DateTime($this->test_date);
        $date = new DateTime(date('Y-m-d'));
        $today = new DateTime(date('Y-m-d'));
        $warningdate = $test2->modify("-2 day");
        if (empty($task)) {
            foreach ($tasks as $task) {
                if (!$task['status']) {
                    if ($test_date < $today) {
                        $status = "Over due";
                        break;
                    } else if ($warningdate <= $today) {
                        $status = "Warning";
                        break;
                    } else {
                        $status = "Pending";
                    }
                } else {
                    $status = "Completed";
                }
            }
        }

        $original = parent::toArray($request);
        return array_merge($original, [
            'status' => $status,
            'added_by' => $this->technician['firstname'] . " " . $this->technician['lastname'],
            'client_id' => $this->client['name'],
            // 'test_date' => $this->sample['test_date'],
            // 'sample_type' => $this->sample['type'],
            // 'sample_description' => $this->sample['type_description'],
            // 'test_name' => $this->sample->tasks->pluck('test_name')[0],
            // 'client_ref' => $this->sample['client_ref'],
            // 'client_id' => $this->sample['name'],
            // 'source' => $this->sample['source'],
            // 'truck_number' => $this->sample['truck_number'],
            // 'ticket_number' => $this->sample['ticket_number'],
            // 'ticket_number' => $this->sample['ticket_number'],
            // 'date' => $this->sample['date'],

        ]);
    }
}