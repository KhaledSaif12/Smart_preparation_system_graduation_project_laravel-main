<!-- resources/views/create-database.blade.php -->
@extends('layouts.main')
@section('title', 'Add User')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    @endpush

    <!DOCTYPE html>
<html>
<head>
    <title>إنشاء قاعدة بيانات</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .success {
            color: green;
            border: 1px solid green;
        }
        .error {
            color: red;
            border: 1px solid red;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        input[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>إنشاء قاعدة بيانات</h1>
        <form action="{{ route('database.create') }}" method="POST">
            @csrf
            <label for="name">الاسم:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <input type="submit" value="إنشاء">
        </form>

        @if (session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="message error">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <h1>قائمة مكتبات الوجه</h1>
        @if (isset($data))
            <table>
                <tr>
                    <th>معرف الوجه (ID)</th>
                    <th>معرف الوجه (FDID)</th>
                    <th>الاسم</th>
                    <th>الإجراءات</th>
                </tr>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['fdid'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>
                            <form method='post' action="{{ route('database.delete') }}" style='display:inline;'>
                                @csrf
                                <input type='hidden' name='fdid' value="{{ $item['fdid'] }}" />
                                <input type='submit' value='حذف' onclick='return confirm("هل أنت متأكد أنك تريد حذف هذا العنصر؟");' />
                            </form>
                            <form method='post' action="{{ route('database.update') }}" style='display:inline;'>
                                @csrf
                                <input type='hidden' name='fdid' value="{{ $item['fdid'] }}" />
                                <input type='text' name='name' value="{{ $item['name'] }}" />
                                <input type='submit' value='تعديل' />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif

        @if (isset($error))
            <div class="message error">{{ $error }}</div>
        @endif
    </div>
</body>
</html>


    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
         <!--get role wise permissiom ajax script-->
        <script src="{{ asset('js/get-role.js') }}"></script>
    @endpush
@endsection
