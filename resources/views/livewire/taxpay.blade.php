<div class="d-flex align-content-center mt-5 mx-5">
    <div class="container bg-light p-3" style="width: 40%">
        <div class="card">
            <div class="card-header text-center fw-bold bg-info">
                Lapor Omset Harian
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="pt-3">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <form>
                    <div class="mb-2">
                        <select class="form-select" aria-label="Default select example" wire:model="jenis_pajak">
                            <option selected>-Pilih Jenis Pajak-</option>
                            <option value="Pajak Hiburan">Pajak Hiburan</option>
                            <option value="Pajak Restoran">Pajak Restoran</option>
                            <option value="Pajak Hotel">Pajak Hotel</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control text-end" placeholder="Jumlah Omset"
                            wire:model="jumlah_omset">
                    </div>
                    <div class="row">
                        <div class="col-6 d-grid">
                            @if ($updateData == false)
                                <button type="button" class="btn btn-primary" wire:click="store">Lapor</button>
                            @else
                                <button type="button" class="btn btn-warning" wire:click="update">Update</button>
                            @endif
                        </div>
                        <div class="col-6 d-grid">
                            @if ($updateData == false)
                                <button type="reset" class="btn btn-danger">Reset</button>
                            @else
                                <button type="reset" class="btn btn-danger" disabled>Reset</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <h2>Riwayat Lapor Pajak</h2>
                <div class="pb-3 pt-3">
                    <input type="text" class="form-control mb-3 w-25" placeholder="Cari.." wire:model="katakunci">
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <td>Tanggal</td>
                            <td>Jenis Pajak</td>
                            <td class="text-end">Jumlah Omset</td>
                            <td class="text-center">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataLapor as $key => $value)
                            <tr>
                                <td>{{ $value->tanggal }}</td>
                                <td>{{ $value->jenis_pajak }}</td>
                                <td class="text-end">{{ number_format($value->jumlah_omset, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <a wire:click="edit({{ $value->id }})" class="btn btn-warning">Edit</a>
                                    <a wire:click="delete({{ $value->id }})" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $dataLapor->links() }}
            </div>
        </div>
    </div>
</div>
