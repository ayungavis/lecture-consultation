<?php namespace App\Controllers;

use App\Libraries\Utils;
use App\Models\DetailKonsultasiModel;
use App\Models\KonsultasiModel;
use App\Models\NotifikasiModel;

class DetailKonsultasiController extends BaseController
{
	public function __construct()
  {
    $this->konsultasi = new KonsultasiModel();
    $this->detailKonsultasi = new DetailKonsultasiModel();
    $this->notifikasi = new NotifikasiModel();
    $this->session = session();
  }

	public function index()
	{
    $data['title'] = 'Daftar Detail Konsultasi';
    $data['detail'] = $this->detailKonsultasi->withRelations()->getResult();
		return view('pages/detail-konsultasi/index', $data);
  }
  
  public function create()
  {
    $data['title'] = 'Buat Detail Konsultasi';
    return view('pages/detail-konsultasi/create', $data);
  }

  public function store()
  {
    if (!$this->validate($this->detailKonsultasi->getValidationRules())) {
      return redirect()->to(base_url('konsultasi/'. $this->request->getPost('konsultasi_id')));
    } else {
      $attributes = $this->request->getPost();
      unset($attributes['user_id']);
      $this->detailKonsultasi->insert($attributes);

      $notifikasi['from'] = session()->get('id');
      $notifikasi['to'] = $this->request->getPost('user_id');
      $notifikasi['pesan'] = session()->get('nama') . " telah mengajukan topik bahasan baru kepada Anda.";
      $notifikasi['sudah_dibaca'] = false;
      $notifikasi['konsultasi_id'] = $this->request->getPost('konsultasi_id');
      $this->notifikasi->store($notifikasi);

      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('konsultasi/'. $this->request->getPost('konsultasi_id')));
    }
  }

  public function show($id)
  {
    $data['title'] = 'Detail Detail Konsultasi';
    $data['detail'] = $this->detailKonsultasi->withRelations($id)->getRow();
    return view('pages/detail-konsultasi/detail', $data);
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Detail Konsultasi';
    $data['detail'] = $this->detailKonsultasi->find($id);
    return view('pages/detail-konsultasi/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate($this->detailKonsultasi->getValidationRules())) {
      return redirect()->to(base_url('konsultasi/'. $this->request->getPost('konsultasi_id')));
    } else {
      $attributes = $this->request->getPost();
      $attributes['tanggal_dibalas'] = Utils::now();
      unset($attributes['user_id']);
      $this->detailKonsultasi->update($id, $attributes);

      $notifikasi['from'] = session()->get('id');
      $notifikasi['to'] = $this->request->getPost('user_id');
      $notifikasi['pesan'] = session()->get('nama') . " telah membalas topik bahasan Anda.";
      $notifikasi['sudah_dibaca'] = false;
      $notifikasi['konsultasi_id'] = $this->request->getPost('konsultasi_id');
      $this->notifikasi->store($notifikasi);

      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('konsultasi/'. $this->request->getPost('konsultasi_id')));
    }
  }

  public function destroy($id)
  {
    $this->detailKonsultasi->delete($id);
    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil dihapus!</div></div>');
    return redirect()->to(base_url('detail-konsultasi'));
  }
}