<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['M_shop', 'M_admin', 'M_varian']);
    }

    private function is_admin() {
        return (bool) $this->session->userdata('admin_logged_in');
    }

    private function require_admin() {
        if (!$this->is_admin()) {
            $this->session->set_flashdata('error', 'Silakan login sebagai admin terlebih dahulu.');
            redirect('auth');
        }
    }

    private function do_upload($field = 'gambar') {
        if (empty($_FILES[$field]['name'])) return null;
        $config = array(
            'upload_path'   => './upload/items/',
            'allowed_types' => 'gif|jpg|jpeg|png|webp',
            'max_size'      => 5120,
            'file_name'     => time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $_FILES[$field]['name']),
            'detect_mime'   => FALSE,
        );
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($field)) {
            $this->session->set_flashdata('error', strip_tags($this->upload->display_errors()));
            return false;
        }
        return $this->upload->data('file_name');
    }

    // ── HOME ─────────────────────────────────────────────────────────
    public function index() {
        $this->require_admin();
        $data['barang']        = $this->M_shop->get_all();
        $data['total_produk']  = $this->M_shop->count_all();
        $data['produk_baru']   = $this->M_shop->count_new();
        $data['kategori_list'] = $this->M_shop->get_kategori_list();
        $this->load->view('shop/header', $data);
        $this->load->view('shop/home', $data);
        $this->load->view('shop/footer');
    }

    // ── KATALOG ──────────────────────────────────────────────────────
    public function katalog($kategori = null) {
        $data['kategori_list']  = $this->M_shop->get_kategori_list();
        $data['aktif_kategori'] = $kategori;
        $data['total_produk']   = $this->M_shop->count_all();
        if ($kategori) {
            $decoded            = rawurldecode($kategori);
            $data['barang']     = $this->M_shop->get_by_kategori($decoded);
            $data['page_title'] = $decoded;
        } else {
            $data['barang']     = $this->M_shop->get_all();
            $data['page_title'] = 'Semua Produk';
        }
        $this->load->view('shop/header_katalog', $data);
        $this->load->view('shop/katalog', $data);
        $this->load->view('shop/footer');
    }

    // ── CREATE ───────────────────────────────────────────────────────
    public function create() {
        $this->require_admin();
        $this->load->view('shop/header');
        $this->load->view('shop/create');
        $this->load->view('shop/footer');
    }

    public function store() {
        $this->require_admin();
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('deskripsi',   'Deskripsi',   'required');
        $this->form_validation->set_rules('harga',       'Harga',       'required|numeric');
        $this->form_validation->set_rules('kategori',    'Kategori',    'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('shop/header');
            $this->load->view('shop/create');
            $this->load->view('shop/footer');
            return;
        }
        $gambar = '';
        $upload = $this->do_upload('gambar');
        if ($upload === false) { redirect('shop/create'); return; }
        if ($upload !== null)  $gambar = $upload;

        $kategori = $this->input->post('kategori');
        $this->M_shop->insert(array(
            'nama_barang'       => $this->input->post('nama_barang'),
            'deskripsi'         => $this->input->post('deskripsi'),
            'harga'             => $this->input->post('harga'),
            'kategori'          => $kategori,
            'gambar'            => $gambar,
            'kategori_snapshot' => $kategori,
        ));
        $new_id = $this->db->insert_id();
        $this->session->set_flashdata('success', 'Barang berhasil ditambahkan! Silakan tambahkan varian produk.');
        redirect('shop/varian/' . $new_id);
    }

    // ── EDIT ─────────────────────────────────────────────────────────
    public function edit($id) {
        $this->require_admin();
        $data['barang'] = $this->M_shop->get_by_id($id);
        if (!$data['barang']) redirect('shop');
        $data['varian']        = $this->M_varian->get_option($id);
        $data['varian_fields'] = $this->M_varian->get_fields_by_kategori($data['barang']->kategori);
        $this->load->view('shop/header', $data);
        $this->load->view('shop/update', $data);
        $this->load->view('shop/footer');
    }

    public function update($id) {
        $this->require_admin();
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('deskripsi',   'Deskripsi',   'required');
        $this->form_validation->set_rules('harga',       'Harga',       'required|numeric');
        $this->form_validation->set_rules('kategori',    'Kategori',    'required');
        if ($this->form_validation->run() == FALSE) {
            $data['barang']        = $this->M_shop->get_by_id($id);
            $data['varian']        = $this->M_varian->get_option($id);
            $data['varian_fields'] = $this->M_varian->get_fields_by_kategori($data['barang']->kategori);
            $this->load->view('shop/header', $data);
            $this->load->view('shop/update', $data);
            $this->load->view('shop/footer');
            return;
        }
        $lama          = $this->M_shop->get_by_id($id);
        $gambar        = $lama->gambar;
        $kategori_lama = isset($lama->kategori_snapshot) ? $lama->kategori_snapshot : $lama->kategori;
        $kategori_baru = $this->input->post('kategori');
        if ($kategori_lama !== $kategori_baru) {
            $this->M_varian->delete_by_barang($id);
        }
        $upload = $this->do_upload('gambar');
        if ($upload === false) { redirect('shop/edit/' . $id); return; }
        if ($upload !== null) {
            if ($gambar && file_exists('./upload/items/' . $gambar)) unlink('./upload/items/' . $gambar);
            $gambar = $upload;
        }
        $this->M_shop->update($id, array(
            'nama_barang'       => $this->input->post('nama_barang'),
            'deskripsi'         => $this->input->post('deskripsi'),
            'harga'             => $this->input->post('harga'),
            'kategori'          => $kategori_baru,
            'gambar'            => $gambar,
            'varian_id'         => null,
            'kategori_snapshot' => $kategori_baru,
        ));
        $this->session->set_flashdata('success', 'Barang berhasil diupdate!');
        redirect('shop');
    }

    // ── DELETE ───────────────────────────────────────────────────────
    public function delete($id) {
        $this->require_admin();
        $b = $this->M_shop->get_by_id($id);
        if ($b && $b->gambar && file_exists('./upload/items/' . $b->gambar)) unlink('./upload/items/' . $b->gambar);
        $this->M_shop->delete($id);
        $this->session->set_flashdata('success', 'Barang berhasil dihapus!');
        redirect('shop');
    }

    public function delete_all() {
        $this->require_admin();
        foreach ($this->M_shop->get_all() as $item) {
            if ($item->gambar && file_exists('./upload/items/' . $item->gambar)) unlink('./upload/items/' . $item->gambar);
        }
        $this->M_shop->delete_all();
        $this->session->set_flashdata('success', 'Semua barang berhasil dihapus!');
        redirect('shop');
    }

    // ── SEARCH ───────────────────────────────────────────────────────
    public function search() {
        $keyword = $this->input->get('q');
        if (empty(trim($keyword))) redirect('shop/katalog');
        $data['barang']         = $this->M_shop->search($keyword);
        $data['keyword']        = $keyword;
        $data['kategori_list']  = $this->M_shop->get_kategori_list();
        $data['aktif_kategori'] = null;
        $data['total_produk']   = $this->M_shop->count_all();
        $data['page_title']     = 'Hasil pencarian: ' . $keyword;
        $this->load->view('shop/header_katalog', $data);
        $this->load->view('shop/katalog', $data);
        $this->load->view('shop/footer');
    }

    // ── VARIAN ───────────────────────────────────────────────────────
    public function varian($barang_id) {
    $this->require_admin();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header('Expires: Sat, 01 Jan 2000 00:00:00 GMT');
        $data['barang'] = $this->M_shop->get_by_id($barang_id);
        if (!$data['barang']) redirect('shop');
        $data['varian']        = $this->M_varian->get_option($barang_id);
        $data['varian_fields'] = $this->M_varian->get_fields_by_kategori($data['barang']->kategori);
        $this->load->view('shop/header', $data);
        $this->load->view('shop/varian', $data);
        $this->load->view('shop/footer');
    }

    public function varian_store($barang_id) {
        $this->require_admin();
        $barang = $this->M_shop->get_by_id($barang_id);
        if (!$barang) redirect('shop');

        $fields = $this->M_varian->get_fields_by_kategori($barang->kategori);
        $labels = array_keys($fields);
        $values = array();
        foreach ($labels as $label) {
            $fname    = 'field_' . strtolower(str_replace(' ', '_', $label));
            $values[] = $this->input->post($fname) ? $this->input->post($fname) : '-';
        }

        $gambar_varian = '';
        $upload = $this->do_upload('gambar_varian');
        if ($upload === false) { redirect('shop/varian/' . $barang_id); return; }
        if ($upload !== null) $gambar_varian = $upload;

        $this->M_varian->insert(array(
            'barang_id'    => $barang_id,
            'field_label'  => implode(' | ', $labels),
            'field_value'  => implode(' | ', $values),
            'harga'        => $this->input->post('harga'),
            'stok'         => $this->input->post('stok'),
            'diskon'       => 0,
            'harga_diskon' => 0,
            'gambar'       => $gambar_varian,
        ));
        $this->session->set_flashdata('success', 'Varian berhasil ditambahkan!');
        redirect('shop/varian/' . $barang_id);
    }

    public function varian_edit($id) {
        $this->require_admin();
        $v = $this->M_varian->get_by_id($id);
        if (!$v) redirect('shop');
        $data['varian_item']   = $v;
        $data['barang']        = $this->M_shop->get_by_id($v->barang_id);
        $data['varian_fields'] = $this->M_varian->get_fields_by_kategori($data['barang']->kategori);
        $this->load->view('shop/header', $data);
        $this->load->view('shop/varian_edit', $data);
        $this->load->view('shop/footer');
    }

    public function varian_update($id) {
        $this->require_admin();
        $v      = $this->M_varian->get_by_id($id);
        $barang = $this->M_shop->get_by_id($v->barang_id);
        $fields = $this->M_varian->get_fields_by_kategori($barang->kategori);

        $labels = array_keys($fields);
        $values = array();
        foreach ($labels as $label) {
            $fname    = 'field_' . strtolower(str_replace(' ', '_', $label));
            $values[] = $this->input->post($fname) ? $this->input->post($fname) : '-';
        }

        $stok         = (int)   $this->input->post('stok');
        $harga        = (float) $this->input->post('harga');
        $harga_diskon = (float) $this->input->post('harga_diskon');
        $aktif_diskon = ($stok < 5 && $harga_diskon > 0) ? 1 : 0;

        $gambar_varian = isset($v->gambar) ? $v->gambar : '';
        $upload = $this->do_upload('gambar_varian');
        if ($upload === false) { redirect('shop/varian_edit/' . $id); return; }
        if ($upload !== null) {
            if ($gambar_varian && file_exists('./upload/items/' . $gambar_varian)) {
                unlink('./upload/items/' . $gambar_varian);
            }
            $gambar_varian = $upload;
        }

        if ($this->input->post('hapus_gambar') && $gambar_varian) {
            if (file_exists('./upload/items/' . $gambar_varian)) unlink('./upload/items/' . $gambar_varian);
            $gambar_varian = '';
        }

        $this->M_varian->update($id, array(
            'field_label'  => implode(' | ', $labels),
            'field_value'  => implode(' | ', $values),
            'harga'        => $harga,
            'stok'         => $stok,
            'diskon'       => $aktif_diskon,
            'harga_diskon' => $aktif_diskon ? $harga_diskon : 0,
            'gambar'       => $gambar_varian,
        ));
        $this->session->set_flashdata('success', 'Varian berhasil diupdate!');
        redirect('shop/varian/' . $v->barang_id);
    }

    public function varian_delete($id) {
        $this->require_admin();
        $v = $this->M_varian->get_by_id($id);
        if (!$v) { $this->session->set_flashdata('error', 'Varian tidak ditemukan!'); redirect('shop'); }
        if (!empty($v->gambar) && file_exists('./upload/items/' . $v->gambar)) {
            unlink('./upload/items/' . $v->gambar);
        }
        $this->M_varian->delete($id);
        $this->session->set_flashdata('success', 'Varian berhasil dihapus!');
        redirect('shop/varian/' . $v->barang_id);
    }

    // ── DETAIL AJAX ──────────────────────────────────────────────────
    public function detail($id) {
        $barang = $this->M_shop->get_by_id($id);
        if (!$barang) {
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'not found'));
            return;
        }
        $varian      = $this->M_varian->get_option($id);
        $varian_data = array();
        foreach ($varian as $v) {
            $labels = $v->field_label ? explode(' | ', $v->field_label) : array();
            $values = $v->field_value ? explode(' | ', $v->field_value) : array();
            $specs  = array();
            foreach ($labels as $i => $label) {
                $specs[$label] = isset($values[$i]) ? $values[$i] : '-';
            }
            $varian_data[] = array(
                'id'           => (int) $v->id,
                'specs'        => $specs,
                'harga'        => (int) $v->harga,
                'harga_diskon' => isset($v->harga_diskon) ? (int) $v->harga_diskon : 0,
                'stok'         => (int) $v->stok,
                'diskon'       => isset($v->diskon) ? (int) $v->diskon : 0,
                'gambar'       => (!empty($v->gambar)) ? base_url('upload/items/' . $v->gambar) : '',
            );
        }
        $result = array(
            'id'          => (int) $barang->id,
            'nama_barang' => $barang->nama_barang,
            'deskripsi'   => $barang->deskripsi,
            'harga'       => (int) $barang->harga,
            'kategori'    => $barang->kategori,
            'gambar'      => $barang->gambar ? base_url('upload/items/' . $barang->gambar) : '',
            'varian'      => $varian_data,
        );
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}