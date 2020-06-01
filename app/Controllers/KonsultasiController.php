<?php namespace App\Controllers;

use App\Libraries\Utils;
use App\Models\DetailKonsultasiModel;
use App\Models\FileModel;
use App\Models\KonsultasiModel;
use App\Models\NotifikasiModel;
use App\Models\PeriodeModel;
use App\Models\ProgramStudiModel;
use App\Models\TopikKonsultasiModel;
use App\Models\UserModel;
use Ciqrcode;

ini_set('maximum_execution_time', 0);

class KonsultasiController extends BaseController
{
	public function __construct()
  {
    helper('text');

    $this->konsultasi = new KonsultasiModel();
    $this->detailKonsultasi = new DetailKonsultasiModel();
    $this->topik = new TopikKonsultasiModel();
    $this->prodi = new ProgramStudiModel();
    $this->user = new UserModel();
    $this->file = new FileModel();
    $this->fileController = new FileController();
    $this->periode = new PeriodeModel();
    $this->notifikasi = new NotifikasiModel();
    $this->qrcode = new Ciqrcode();
    $this->session = session();
  }

	public function index()
	{
    $data['title'] = 'Daftar Konsultasi';
    $data['konsultasi'] = $this->konsultasi->withRelations()->getResult();
    $data['topik'] = $this->topik->asObject()->findAll();
    $data['prodi'] = $this->prodi->asObject()->findAll();
		return view('pages/konsultasi/index', $data);
  }
  
  public function create()
  {
    $data['title'] = 'Buat Konsultasi';
    $data['topik'] = $this->topik->asObject()->findAll();
    $data['prodi'] = $this->prodi->asObject()->findAll();
    $data['user'] = $this->user->asObject()->find(session()->get('id'));
    $data['dosen'] = $this->user->where('role_id', 2)->asObject()->findAll();
    $data['periode'] = $this->periode->asObject()->findAll();
    return view('pages/konsultasi/create', $data);
  }

  public function store()
  {
    $user['nim'] = $this->request->getPost('nim');
    $user['prodi_id'] = $this->request->getPost('prodi_id');
    $user['tahun_masuk'] = $this->request->getPost('tahun_masuk');
    $user['nomor_telepon'] = $this->request->getPost('nomor_telepon');
    $user['alamat'] = $this->request->getPost('alamat');
    $this->user->update($this->session->get('id'), $user);

    $konsultasi['periode_id'] = $this->request->getPost('periode_id');
    $konsultasi['user_id'] = session()->get('id');
    $konsultasi['dosen_id'] = $this->request->getPost('dosen_id');
    $konsultasi['file_id'] = $this->fileController->store($this->request->getFile('file'));

    $id = $this->konsultasi->store($konsultasi);
    $this->konsultasi->update($id, ['qr_code' => $this->generateQR($id)]);

    $detail['konsultasi_id'] = $id;
    $detail['topik_id'] = $this->request->getPost('topik_id');
    $detail['topik_bahasan'] = $this->request->getPost('topik_bahasan');
    $detail['tanggal_dibuat'] = Utils::now();
    $this->detailKonsultasi->store($detail);

    $notifikasi['from'] = session()->get('id');
    $notifikasi['to'] = $this->request->getPost('dosen_id');
    $notifikasi['pesan'] = session()->get('nama') . " telah mengajukan konsultasi kepada Anda.";
    $notifikasi['sudah_dibaca'] = false;
    $notifikasi['konsultasi_id'] = $id;
    $this->notifikasi->store($notifikasi);

    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" konsultasi="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
    return redirect()->to(base_url('konsultasi'));
  }

  public function show($id)
  {
    $data['title'] = 'Detail Konsultasi';
    $data['konsultasi'] = $this->konsultasi->withRelations($id)->getRow();
    $data['detail'] = $this->detailKonsultasi->getByKonsultasiID($id)->getResult();
    $data['topik'] = $this->topik->asObject()->findAll();
    $data['prodi'] = $this->prodi->asObject()->findAll();
    $data['dosen'] = $this->user->where('role_id', 2)->asObject()->findAll();
    $data['periode'] = $this->periode->asObject()->findAll();
    return view('pages/konsultasi/detail', $data);
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Konsultasi';
    $data['konsultasi'] = $this->konsultasi->find($id);
    return view('pages/konsultasi/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('konsultasi/'. $id .'/edit'));
    } else {
      $this->konsultasi->update($id, $this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" konsultasi="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('konsultasi/'. $id .'/edit'));
    }
  }

  public function destroy($id)
  {
    $this->konsultasi->delete($id);
    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" konsultasi="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil dihapus!</div></div>');
    return redirect()->to(base_url('konsultasi'));
  }

  public function report($id)
  {
    $data['title'] = 'Laporan Konsultasi';
    $data['konsultasi'] = $this->konsultasi->withRelations($id)->getRow();
    $data['detail'] = $this->detailKonsultasi->getByKonsultasiID($id, 'asc')->getResult();
    $data['topik'] = $this->topik->asObject()->findAll();
    $data['prodi'] = $this->prodi->asObject()->findAll();
    $data['dosen'] = $this->user->where('role_id', 2)->asObject()->findAll();
    $data['periode'] = $this->periode->asObject()->findAll();
    return view('pages/konsultasi/report', $data);
  }

  public function generateQR($id)
  {
    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = WRITEPATH . 'cache'; //string, the default is application/cache/
    $config['errorlog']     = WRITEPATH . 'logs'; //string, the default is application/logs/
    $config['imagedir']     = './qrcode/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
    $config['white']        = array(70, 130, 180);
  
    $this->qrcode->initialize($config);

    $name = random_string('alnum', 16) . '.png';
    
    $params['data'] = base_url('konsultasi/'. $id .'/report'); //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = $config['imagedir'].$name; //simpan image QR CODE ke folder assets/images/
    
    $this->qrcode->generate($params); // fungsi untuk generate QR CODE

    return $name;
  }
}