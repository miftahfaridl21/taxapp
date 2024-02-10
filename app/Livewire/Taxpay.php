<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Taxreport;
use Livewire\WithPagination;

class Taxpay extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tanggal;
    public $jenis_pajak;
    public $jumlah_omset;
    public $user_id = 1;
    public $tax_id;

    public $updateData = false;

    public function store()
    {
        $this->tanggal = date('Y-m-d');
        $rules = [
            'tanggal' => 'required',
            'jenis_pajak' => 'required',
            'jumlah_omset' => 'required',
            'user_id' => 'required'
        ];
        $messages = [
            'jenis_pajak.required' => 'Field Jenis Pajak harus diisi',
            'jumlah_omset.required' => 'Field Jumlah Omset harus diisi',
        ];

        $validated = $this->validate($rules, $messages);

        Taxreport::create($validated);

        $this->bersihkanform();

        session()->flash('status', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Taxreport::findOrFail($id);
        $this->jenis_pajak = $data->jenis_pajak;
        $this->jumlah_omset = $data->jumlah_omset;

        $this->updateData = true;
        $this->tax_id = $id;
    }

    public function update()
    {
        $rules = [
            'jenis_pajak' => 'required',
            'jumlah_omset' => 'required',
        ];
        $messages = [
            'jenis_pajak.required' => 'Field Jenis Pajak harus diisi',
            'jumlah_omset.required' => 'Field Jumlah Omset harus diisi',
        ];

        $validated = $this->validate($rules, $messages);
        $data = Taxreport::findOrFail($this->tax_id);
        $data->update($validated);

        $this->updateData = false;
        $this->bersihkanform();

        session()->flash('status', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        Taxreport::findOrFail($id)->delete();

        $this->bersihkanform();

        session()->flash('status', 'Data berhasil dihapus');
    }

    public function bersihkanform()
    {
        $this->jenis_pajak = '';
        $this->jumlah_omset = '';
    }

    public function render()
    {
        $data = Taxreport::orderBy('tanggal', 'asc')->paginate(2);
        return view('livewire.taxpay', ['dataLapor' => $data]);
    }
}
