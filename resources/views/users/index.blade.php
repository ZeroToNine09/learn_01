<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge"
    >
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>利用者</title>
    <style>
        h2 {
            padding: 1rem 2rem;
            border-left: 5px solid #000;
            background: #f4f4f4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        table th,
        table td {
            padding: 10px 0;
            text-align: center;
        }

        table tr:nth-child(odd) {
            background-color: #eee
        }
    </style>
</head>

<body>
<a href="/">Back</a>
<h2>User management</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Role</th>
        <th>Rental Count</th>
        <th>Register date</th>
        <th>Update date</th>
        <th colspan="2">Action</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
            <td></td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <td>
                <form
                    action="{{ route('users.edit', $user->id) }}"
                    method="get"
                >
                    <button type="submit">Edit</button>
                </form>
            </td>
            <td>
                <form
                    action="{{ route('users.destroy', $user->id)}}"
                    method="post"
                >
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<br>
<div style="text-align: center">
    <form
        action="{{ route('users.create') }}"
        method="get"
    >
        <button type="submit">Add new</button>
    </form>
</div>
</body>

</html>
