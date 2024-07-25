<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="create-campaign-container">
        <h1>Create Campaign</h1>

        <form id="campaign-form" method="POST" action="{{ route('campaigns.store') }}">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required><br>
            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea><br>
            <label for="start-date">Start Date</label>
            <input type="date" id="start-date" name="start_date" required><br>
            <label for="end-date">End Date</label>
            <input type="date" id="end-date" name="end_date" required><br>
            <button type="submit">Create Campaign</button>
        </form>
    </div>
    </body>
</html>
