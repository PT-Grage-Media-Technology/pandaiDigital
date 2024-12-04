@extends('pengajar.layout')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <form id="filterForm" action="{{ route('pengajar.invite.store')}}" class="mb-1" method="POST">
                @csrf
                <div class="d-flex justify-content-between">
                    <div class="input-group" style="max-width: 300px;">
                        <label for="typeFilter">Pilih Type</label>
                        <select class="form-control" id="typeFilter" name="type">
                            <option value="">Pilih Type</option>
                            <option value="Invite">Invite</option>
                            <option value="Request">Request</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <div class="input-group" style="max-width: 300px;">
                        <label for="trainerSelect">Pilih Trainer</label>
                        <select class="form-control" id="trainerSelect" name="id_trainer">
                            <option value="">Pilih Trainer</option>
                            @foreach($trainer as $t)
                                <option value="{{ $t->id_trainer }}">{{ $t->nama_trainer }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection