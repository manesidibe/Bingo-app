<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Campaign</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
<div class="dashboard-container">
    <h1>Edit Campaign</h1>

    <form id="update-campaign-form" method="POST" action="{{ route('campaigns.update', $campaign->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" id="update-campaign-id" name="campaign_id" value="{{ $campaign->id }}">
        <label for="update-name">Name</label>
        <input type="text" id="update-name" name="name" value="{{ $campaign->name }}" required><br>
        <label for="update-description">Description</label>
        <textarea id="update-description" name="description" required>{{ $campaign->description }}</textarea><br>
        <label for="update-start-date">Start Date</label>
        <input type="date" id="update-start-date" name="start_date" value="{{ $campaign->start_date }}" required><br>
        <label for="update-end-date">End Date</label>
        <input type="date" id="update-end-date" name="end_date" value="{{ $campaign->end_date }}" required><br>
        <button type="submit">Update Campaign</button>
        <a href="{{ route('campaigns.index') }}">Cancel</a>
    </form>
</div>
</body>
</html>
