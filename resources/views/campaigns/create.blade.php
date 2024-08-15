@extends('partials.template')

@section('content')

    <div class="row">
        <div class="col-md-7 offset-2">
            <div class="card card-plain">
                <div class="card-header">
                    <h3>Create_Campaign</h3>
                    <p class="mb-0">Enter the elements of this campaign</p>
                    <form id="campaign-form" method="POST" action="{{ route('campaigns.store') }}">
                        @csrf
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" required>
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Start_Date</label>
                            <input type="date" class="form-control" name="start_date">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">End_Date</label>
                            <input type="date" class="form-control" name="end_date" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg bg-gradient-success btn-lg w-50">Create Campaign</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection

