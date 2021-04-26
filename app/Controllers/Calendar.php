<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FullCalendarModel;

class Calendar extends BaseController
{
    protected $fullCalendar_model;

    public function __construct()
    {
        parent::__construct();
        $this->fullCalendar_model = new FullCalendarModel();
    }

    public function index(): string
    {
        view("pages/calendar");
        return view("template/layout");
    }

    public function load(): \CodeIgniter\HTTP\ResponseInterface
    {
        $to_return = [];
        $event_data = $this->fullCalendar_model->fetch_all_event();
        foreach ($event_data as $row) {
            $to_return[] = array(
                'id'    => $row['id'],
                'title' => $row['title'],
                'start' => $row['start_event'],
                'end'   => $row['end_event']
            );
        }
        return $this->response->setJSON($to_return);
    }

    public function insert(): \CodeIgniter\HTTP\ResponseInterface
    {
        $to_return = [];
        if ($this->request->getPost('title')) {
            $data = array(
                'title'       => $this->request->getPost('title'),
                'start_event' => $this->request->getPost('start'),
                'end_event'   => $this->request->getPost('end')
            );
            $this->fullCalendar_model->insert_event($data);
            $to_return = [
                'status' => 'ok'
            ];
        }
        return $this->response->setJSON($to_return);
    }

    public function update(): \CodeIgniter\HTTP\ResponseInterface
    {
        $to_return = [];
        if ($this->request->getPost('id')) {
            $data = array(
                'title'       => $this->request->getPost('title'),
                'start_event' => $this->request->getPost('start'),
                'end_event'   => $this->request->getPost('end')
            );

            $this->fullCalendar_model->update_event($data, $this->request->getPost('id'));
            $to_return = [
                'status' => 'ok'
            ];
        }
        return $this->response->setJSON($to_return);
    }

    public function delete(): \CodeIgniter\HTTP\ResponseInterface
    {
        $to_return = [];
        if ($this->request->getPost('id') != null) {
            $this->fullCalendar_model->delete_event($this->request->getPost('id'));
            $to_return = [
                'status' => 'ok'
            ];
        }
        return $this->response->setJSON($to_return);
    }
}
