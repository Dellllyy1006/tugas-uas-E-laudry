<?php
/**
 * Package Controller
 */

declare(strict_types=1);

class PackageController extends Controller
{
    public function __construct()
    {
        $this->requireLogin();
    }
    
    /**
     * List all packages
     */
    public function index(): void
    {
        $this->setTitle('Data Paket');
        $this->setMenu('packages');
        
        $packages = Package::all();
        
        $this->view('packages/index', [
            'packages' => $packages
        ]);
    }
    
    /**
     * Show create form
     */
    public function create(): void
    {
        $this->setTitle('Tambah Paket');
        $this->setMenu('packages');
        
        $this->data['csrf_token'] = $this->generateCsrf();
        $this->view('packages/create');
    }
    
    /**
     * Store new package
     */
    public function store(): void
    {
        if (!$this->isPost()) {
            $this->redirect('/index.php?url=package');
        }
        
        $data = [
            'name' => $this->sanitize($this->post('name', '')),
            'type' => $this->post('type', 'kg'),
            'price' => (float) $this->post('price', 0),
            'description' => $this->sanitize($this->post('description', '')),
            'is_active' => $this->post('is_active', 0) ? 1 : 0
        ];
        
        if (empty($data['name']) || $data['price'] <= 0) {
            Session::flash('error', 'Nama dan harga harus diisi dengan benar');
            $this->redirect('/index.php?url=package/create');
        }
        
        Package::create($data);
        Session::flash('success', 'Paket berhasil ditambahkan');
        $this->redirect('/index.php?url=package');
    }
    
    /**
     * Show edit form
     */
    public function edit(int $id): void
    {
        $package = Package::find($id);
        if (!$package) {
            Session::flash('error', 'Paket tidak ditemukan');
            $this->redirect('/index.php?url=package');
        }
        
        $this->setTitle('Edit Paket');
        $this->setMenu('packages');
        
        $this->data['csrf_token'] = $this->generateCsrf();
        $this->view('packages/edit', [
            'package' => $package
        ]);
    }
    
    /**
     * Update package
     */
    public function update(int $id): void
    {
        if (!$this->isPost()) {
            $this->redirect('/index.php?url=package');
        }
        
        $package = Package::find($id);
        if (!$package) {
            Session::flash('error', 'Paket tidak ditemukan');
            $this->redirect('/index.php?url=package');
        }
        
        $data = [
            'name' => $this->sanitize($this->post('name', '')),
            'type' => $this->post('type', 'kg'),
            'price' => (float) $this->post('price', 0),
            'description' => $this->sanitize($this->post('description', '')),
            'is_active' => $this->post('is_active', 0) ? 1 : 0
        ];
        
        if (empty($data['name']) || $data['price'] <= 0) {
            Session::flash('error', 'Nama dan harga harus diisi dengan benar');
            $this->redirect('/index.php?url=package/edit/' . $id);
        }
        
        Package::update($id, $data);
        Session::flash('success', 'Paket berhasil diupdate');
        $this->redirect('/index.php?url=package');
    }
    
    /**
     * Delete package
     */
    public function delete(int $id): void
    {
        $package = Package::find($id);
        if (!$package) {
            Session::flash('error', 'Paket tidak ditemukan');
            $this->redirect('/index.php?url=package');
        }
        
        if (Package::hasTransactions($id)) {
            Session::flash('error', 'Paket tidak dapat dihapus karena sudah digunakan dalam transaksi');
            $this->redirect('/index.php?url=package');
        }
        
        Package::delete($id);
        Session::flash('success', 'Paket berhasil dihapus');
        $this->redirect('/index.php?url=package');
    }
    
    /**
     * Toggle active status
     */
    public function toggle(int $id): void
    {
        $package = Package::find($id);
        if (!$package) {
            if ($this->isAjax()) {
                $this->json(['success' => false, 'message' => 'Paket tidak ditemukan']);
            }
            Session::flash('error', 'Paket tidak ditemukan');
            $this->redirect('/index.php?url=package');
        }
        
        Package::toggleActive($id);
        
        if ($this->isAjax()) {
            $this->json(['success' => true, 'message' => 'Status berhasil diubah']);
        }
        
        Session::flash('success', 'Status paket berhasil diubah');
        $this->redirect('/index.php?url=package');
    }
}
