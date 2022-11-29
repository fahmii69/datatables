<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form</h1>
            </div>
            <div class="modal-body">
                <!-- START FORM -->
                <div class="alert alert-danger d-none"></div>
                <div class="alert alert-success d-none"></div>

                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_tlp" class="col-sm-4 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_tlp" name="no_tlp">
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_company">Company :</label>
                    <select name="id_company" id="id_company" class="form-control">
                        <option>Pilih company</option>
                        @foreach ($companies as $tes)
                        <option value="{{$tes->id}}">{{ $tes->company_name}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- AKHIR FORM -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary tombol-simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>