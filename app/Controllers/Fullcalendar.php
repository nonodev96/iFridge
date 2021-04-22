<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FullCalendarModel;

class Fullcalendar extends BaseController
{
    protected $fullCalendar_model;

    public function __construct()
    {
        $this->fullCalendar_model = new FullCalendarModel();
    }

    function load()
    {
        $data = [];
        $event_data = $this->fullCalendar_model->fetch_all_event();
        foreach ($event_data as $row) {
            $data[] = array(
                'id'    => $row['id'],
                'title' => $row['title'],
                'start' => $row['start_event'],
                'end'   => $row['end_event']
            );
        }
        return $this->response->setJSON($data);
    }

    function insert()
    {
        if ($this->request->getPost('title')) {
            $data = array(
                'title'       => $this->request->getPost('title'),
                'start_event' => $this->request->getPost('start'),
                'end_event'   => $this->request->getPost('end')
            );
            $this->fullCalendar_model->insert_event($data);
        }
    }

    function update()
    {
        if ($this->request->getPost('id')) {
            $data = array(
                'title'       => $this->request->getPost('title'),
                'start_event' => $this->request->getPost('start'),
                'end_event'   => $this->request->getPost('end')
            );

            $this->fullCalendar_model->update_event($data, $this->request->getPost('id'));
        }
    }

    function delete()
    {
        if ($this->request->getPost('id') != null) {
            $this->fullCalendar_model->delete_event($this->request->getPost('id'));
            $data = [
                'status' => 'ok'
            ];
            return $this->response->setJSON($data);
        }
    }
}
