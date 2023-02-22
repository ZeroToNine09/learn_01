<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
  >
  <meta
    http-equiv="X-UA-Compatible"
    content="ie=edge"
  >
  <title>Lending history</title>
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
  <h2>Lending history</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Book renter</th>
      <th>Title</th>
      <th>Lending date</th>
      <th>Return date</th>
    </tr>
    @foreach ($histories as $history)
    <tr>
      <td>{{ $history->id }}</td>
      <td></td>
      <td>{{ $history->book->title }}</td>
      <td>{{ $history->checkout_date }}</td>
      <td>{{ $history->return_date }}</td>
    </tr>
    @endforeach
  </table>
</body>

</html>
