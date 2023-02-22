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
    <title>User management｜Update</title>
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
<a href="/users">Back</a>
<h2>User management｜Update</h2>

<form
    action="{{ route('users.update', $user->id) }}"
    method="post"
>
    @csrf
    @method('PUT')
    <div style="text-align: center">
        <div class="cp_iptxt">
            <label class="ef">
                <input
                    type="text"
                    name="email"
                    placeholder="Email"
                    value="{{ old('name', $user->email) }}"
                >
            </label>
            <label class="ef">
                <input
                    type="text"
                    name="name"
                    placeholder="Full Name"
                    value="{{ old('name', $user->name) }}"
                >
            </label>
            <label class="ef">
                <input
                    type="text"
                    name="password"
                    placeholder="Password"
                    value="{{ old('password', '') }}"
                >
            </label>
            <label>
                @foreach($roles as $role)
                    <div class="form-check">
                        <input class="form-check-input" name="roles" type="radio" value="{{ $role->id}}"
                               id="roles:{{$role->id}}" {{old('roles') ? "checked" : ($user->hasRole($role->name) ? "checked": "")}}>
                        <label class="form-check-label" for="roles:{{$role->id}}">
                            @if (Lang::has('app.roles.' . $role->name))
                                {!! __('app.roles.' . $role->name) !!}
                            @else
                                {{ ucfirst($role->name) }}
                            @endif
                        </label>
                    </div>
                @endforeach
            </label>
        </div>
        <button type="submit">Update</button>
    </div>
</form>
</body>

</html>
