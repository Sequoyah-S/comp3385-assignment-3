<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Client</title>
</head>
<body>
    <h1>Add New Client</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('clients.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label for="telephone">Telephone:</label>
            <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}">
        </div>

        <div>
            <label for="address">Address:</label>
            <textarea id="address" name="address">{{ old('address') }}</textarea>
        </div>

        <div>
            <label for="company_logo">Company Logo:</label>
            <input type="file" id="company_logo" name="company_logo" accept="image/*">
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
