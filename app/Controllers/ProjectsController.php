<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\ProjectEntity;
use App\Models\ProjectModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class ProjectsController extends BaseController
{
    /**
     * @var \App\Models\ProjectModel $model
     */
    protected $model;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->model = new ProjectModel();
        \session();
    }

    public function index()
    {
        $view = $this->request->getGet('view') ?? 'calendar';
        $message = \session()->getFlashdata('message') ?? '';

        if ($view == 'calendar') {
            $data = \json_encode($this->model->getProjects());
            return \view('Projects/calendar', \compact('message', 'data'));
        } else {
            $data = $this->model->findAll();
            return \view('Projects/list', \compact('message', 'data'));
        }
    }

    public function new()
    {
        $formTitle = 'Create New Project';
        $formMethod = 'POST';
        $formAction = \base_url('projects/create');
        $row = new ProjectEntity();
        return \view('Projects/form', \compact('formTitle', 'formMethod', 'formAction'));
    }

    public function create()
    {
        $row = new ProjectEntity();
        $row->fill($this->request->getPost());

        if ($this->model->insert($row)) {
            return \redirect()->to(\base_url())->with('message', 'Data berhasil ditambahkan');
        }

        return \redirect()->to(\base_url())->with('message', 'Gagal menambahkan data');
    }

    public function edit($id = '')
    {
        $formTitle = "Edit Project {$id}";
        $formMethod = 'PUT';
        $formAction = \base_url("projects/update/{$id}");
        $row = $this->model->find($id);
        return \view('Projects/form', \compact('formTitle', 'formMethod', 'formAction', 'row'));
    }

    public function update($id = '')
    {
        if (!$row = $this->model->find($id)) return \redirect()->to(\base_url())->with('message', 'Resource not found');
        $data = new ProjectEntity();
        $data->fill($this->request->getPost());

        if ($this->model->update($row->id, $data)) {
            return \redirect()->to(\base_url())->with('message', 'Data berhasil diupdate');
        }

        return \redirect()->to("projects/edit/{$id}")->with('message', 'Gagal mengupdate data');
    }
}
