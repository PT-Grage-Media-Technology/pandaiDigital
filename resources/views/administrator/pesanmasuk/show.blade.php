@extends('administrator.layout')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card card-shadow">
    <div class="card-header">
        <h3 class="mb-0">Detail Pesan Masuk</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" style="border: none; border-collapse: collapse;">
                <tbody>
                    <tr>
                        <th style="padding: 5px">Nama Pengirim</th>
                        <td style="padding: 5px">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $pesan->nama }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px">Email Pengirim</th>
                        <td style="padding: 5px">
                            <input type="text" class="form-control" id="email" name="email" value="{{ $pesan->email }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px">Subjek Pesan</th>
                        <td style="padding: 5px">
                            <input type="text" class="form-control" id="subjek" name="subjek" value="{{ $pesan->subjek }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px">Isi Pesan</th>
                        <td style="padding: 5px">
                            <textarea class="form-control" name="pesan" id="pesan" readonly>{{ $pesan->pesan }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px">Balas Pesan</th>
                        <td style="padding: 5px">
                            <form action="{{ route('administrator.pesanmasuk.sendReply', $pesan->id_hubungi) }}" method="POST">
                                @csrf
                                <textarea class="form-control" name="balasan" id="balasan" cols="30" rows="10"></textarea>
                                <div class="mt-4 d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">Kirimkan Balasan</button>
                                    <a href="{{ route('administrator.pesanmasuk.index') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
