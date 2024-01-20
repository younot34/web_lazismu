@extends('layouts.master')
@section('title','Input donasi')
@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if ($message = Session::get('sukses'))
                    <div class="alert alert-success alert-block mx-2 my-2">
                        <p><i class="bi bi-check-circle-fill"></i><strong> Donasi Berhasil! </strong>{{ $message }}</p>
                    </div>
                    @endif
                <div class="card">
                    <div class="card-body d-flex">
                        <div class="thumbnail rounden w-25">
                            <img src="{{ asset('dist/img/lazismu.png') }}" alt="" width="150">
                        </div>
                        <div class="body ml-3">
                            <h4>Anda berdonasi untuk {{ $programDonasi->nama_program }}</h4>
                            <p>{!! $programDonasi->deskripsi !!}</p>
                        </div>
                    </div>
                </div>
            <form action="{{ route('donasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="bg-light rounded d-flex align items center p-3">
                            <h1 class="font-weight-bold w-25">Rp.</h1>
                            <input type="number" class="form-control @error('jml_donasi') is-invalid
                            @enderror" value="{{ old('jml_donasi') }}" name="jml_donasi" placeholder="Masukan nominal donasi" value="0">
                        @error('jml_donasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="user_id">Donatur</label>
                            <select name="id_donatur" id="" class="form-control select2">
                                {{-- <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option> --}}
                                <option value="">--Cari Donatur--</option>
                                @foreach ($donatur as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_donatur }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#donaturModal"><i class="bi bi-person-add"></i> Tambah donatur</div>
                        <div class="form-group">
                            <label for="nama_donatur">Nama Donatur</label>
                            <input type="text" class="form-control" name="nama_donatur">
                        </div>
                        <div class="form-group">
                            <label for="user_id">Akun yang dipilih</label>
                            <select name="id_akun" id="id_akun" class="form-control @error('id_akun') is-invalid
                            @enderror" value="{{ old('id_akun') }}">
                                @foreach ($akun as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $programDonasi->id_akun ? 'selected' : '' }}>{{ $item->nama_akun }}</option>
                                @endforeach
                            </select>
                        @error('id_akun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="user_id">Program yang dipilih</label>
                            <select name="programdonasi_id" id="programdonasi_id" class="form-control @error('programdonasi_id') is-invalid
                            @enderror" value="{{ old('programdonasi_id') }}">
                                <option value="{{ $programDonasi->id }}">{{ $programDonasi->nama_program }}</option>
                            </select>
                        @error('programdonasi_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                        <label for="">Keterangan <small style="color: red">*opsional</small></label>
                        <textarea class="form-control" id="editor" name="keterangan" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Lanjutkan pembayaran</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="donaturModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah donatur</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="card card-md" method="POST" action="{{ route('donatur.store') }}">
                @csrf
				<div class="card-body">
                    <div>
                        <label class="form-label">Nama Lengkap</label>
                        <x-text-input id="name" class="block mt-1 w-full form-control" type="text" name="nama_donatur" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name_donatur')" class="mt-2" />
                    </div>
					<div class="mb-3 my-2">
                        <label class="form-label">Email</label>
                        <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
					</div>
					<div class="mb-3">
					<label class="form-label">Password</label>
						<x-text-input id="password" class="block mt-1 w-full form-control"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
					</div>
                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                            <x-text-input id="password_confirmation" class="block mt-1 w-full form-control"
                                type="password"
                                name="password_confirmation" required />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
					<div class="form-footer">
					<button type="submit" class="btn btn-primary w-100">Buat akun baru</button>
					</div>
				</div>
			</form>
        </div>
        </div>
    </div>
</div>
@section('select')
    <script type="text/javascript">
    $(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection
@endsection
