<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archived Campaigns</title>
    <link rel="stylesheet" href="{{ asset('css/archive.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function restoreCampaign(campaignId) {
            axios.put(`/campaigns/${campaignId}/restore`)
                .then(response => {
                    alert('Campaign restored successfully!');
                    window.location.reload(); // Refresh the page to show updated data
                })
                .catch(error => console.error('Error restoring campaign:', error));
        }
    </script>
</head>
<body>
<div class="dashboard-container">
    <h1>Archived Campaigns</h1>

    @if ($campaigns->isEmpty())
        <p>No archived campaigns found.</p>
    @else
        <ul>
            @foreach ($campaigns as $campaign)
                <li>
                    {{ $campaign->name }} ({{ $campaign->start_date }} - {{ $campaign->end_date }})
                    <button onclick="restoreCampaign({{ $campaign->id }})">Restore</button>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
</div>
</body>
</html>
