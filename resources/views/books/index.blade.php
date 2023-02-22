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
  <title>Book Management</title>
  <style>
    h2 {
      padding: 1rem 2rem;
      border-left: 5px solid #000;
      background: #f4f4f4;
    }

    .search_container {
      box-sizing: border-box;
    }

    .search_container input[type="text"] {
      background: #ccddf5;
      border: none;
      height: 35px;
      padding: 0 10px;
    }

    .search_container input[type="text"]:focus {
      outline: 0;
    }

    .search_container input[type="submit"] {
      cursor: pointer;
      border: none;
      background: #3879D9;
      color: #fff;
      outline: none;
      height: 35px;
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
  <h2>Book Management</h2>
  <form
    action="{{ route('books.index') }}"
    method="get"
    class="search_container"
  >
    <input
      type="text"
      size="25"
      name="title"
      placeholder="Title"
      value="{{ $title }}"
    ><input
      type="submit"
      value="Search"
    >
  </form>
  <table>
    <tr>
      <th>ID</th>
      <th>Book No</th>
      <th>Title</th>
      <th>Lending start date</th>
      <th>Lending end date</th>
      <th>Is Lending</th>
      <th colspan="2">Action</th>
    </tr>
    @foreach ($books as $book)
    <tr>
      <td>{{ $book->id }}</td>
      <td>{{ $book->no }}</td>
      <td>{{ $book->title }}</td>
      <td>{{ $book->start_date }}</td>
      <td>{{ $book->end_date }}</td>
      <td>{{ '' }}</td>
      <td>
        <form
          action="{{ route('books.edit', $book->id) }}"
          method="get"
        >
          <button type="submit">Edit</button>
        </form>
      </td>
      <td>
        <form
          action="{{ route('books.destroy', $book->id)}}"
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
      action="{{ route('books.create') }}"
      method="get"
    >
      <button type="submit">Add new</button>
    </form>
  </div>
</body>

</html>
