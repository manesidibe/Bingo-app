@extends('partials.template')

@section('content')
<div id="campaigns-campaigns_list">
    @include('campaigns.partials.campaigns_list', ['campaigns' => $campaigns])
</div>
@endsection
