@extends('dinas-2.layout')

@section('content')
<div class="row">
        <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
        <div class="col-lg-4">
            <h3>Hasil Polling</h3>
            <hr>
            @foreach($jawaban as $jp)
            <div class="hasil-polling">
                @php
                    $totalRating = $jawaban->sum('rating');
                @endphp
                <p>{{ $jp->pilihan }}: {{ round(($jp->rating / $totalRating) * 100, 2) }}%</p>
            </div>
            @endforeach
        </div>
    </div>
@endsection