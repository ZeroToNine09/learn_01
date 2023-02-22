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
  <title>Book Management｜Edit</title>
  <style>
    h2 {
      padding: 1rem 2rem;
      border-left: 5px solid #000;
      background: #f4f4f4;
    }

    .cp_iptxt {
      position: relative;
      margin: 40px 3%;
    }

    .cp_iptxt input[type='text'] {
      font: 15px/24px sans-serif;
      box-sizing: border-box;
      width: 100%;
      padding: 0.3em;
      transition: 0.3s;
      letter-spacing: 1px;
      color: #000000;
      border: none;
      border-bottom: 2px solid #1b2538;
      background: transparent;
    }

    .ef input[type='text']:focus {
      border-bottom: 2px solid #da3c41;
      outline: none;
    }
  </style>
</head>

<body>
  <a href="/books">Back</a>
  <h2>Book Management｜Edit</h2>
  <form
    action="{{ route('books.update', $book->id) }}"
    method="post"
  >
    @csrf
    @method('PUT')
    <div style="text-align: center">
      <div class="cp_iptxt">
        <label class="ef">
          <input
            type="text"
            name="no"
            placeholder="Book No"
            value="{{ old('no', $book->no) }}"
          >
        </label>
        <label class="ef">
          <input
            type="text"
            name="title"
            value="{{ old('title', $book->title) }}"
            placeholder="Title"
          >
        </label>
        <label class="ef">
          <input
            type="text"
            name="start_date"
            value="{{ old('start_date', $book->start_date) }}"
            placeholder="Lending start date"
          >
        </label>
        <label class="ef">
          <input
            type="text"
            name="end_date"
            value="{{ old('end_date', $book->end_date) }}"
            placeholder="Lending end date"
          >
        </label>
      </div>
      <button type="submit">Update</button>
    </div>
  </form>
  <br>
  <div style="text-align: center">
    <form
      action="{{ route('histories.store') }}"
      method="post"
      style="display: inline"
    >
      @csrf
      <select name="user_id" @if (!!$history) disabled @endif>
        @foreach ($users as $user)
        <option value="{{ $user->id }}" @if (!!$history && $history->user_id === $user->id) selected @endif>{{ $user->name }}</option>
        @endforeach
      </select>
      <input
        type="hidden"
        name="book_id"
        value="{{ $book->id }}"
      >
      <input
        type="hidden"
        name="checkout_date"
        value="{{ now() }}"
      >
      <button type="submit" @if (!!$history) disabled @endif>Lend</button>
    </form>
    @if (!!$history)
    <form
      action="{{ route('histories.update', $history->id) }}"
      method="post"
      style="display: inline"
    >
      @csrf
      @method('PUT')
      <input
        type="hidden"
        name="book_id"
        value="{{ $book->id }}"
      >
      <input
        type="hidden"
        name="return_date"
        value="{{ now() }}"
      >
      <button type="submit">Return</button>
    </form>
    @endif
  </div>
</body>

</html>
