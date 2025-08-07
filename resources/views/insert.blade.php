
@extends('layouts.main')
@section('title', 'Add Database')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    @endpush



    <style>
        .form-container {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh; /* Set the height to the full viewport height */
        }

        .form-container form {
          background-color: #f1f1f1;
          padding: 20px;
          border-radius: 5px;
        }
      </style>

      <div class="form-container">
        <form action="{{ route('insert') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="text" id="fdid" name="fdid" required>
          <label for="fdid">FDID:</label><br>

          <input type="text" id="name" name="name" required>
          <label for="name">Name:</label>
          <br>

          <input type="text" id="sex" name="sex" required>
          <label for="sex">Sex:</label>
          <br>

          <input type="text" id="phoneNumber" name="phoneNumber" required>
          <label for="phoneNumber">Phone Number:</label>
          <br>

          <input type="file" id="importImage" name="importImage" required>
          <label for="importImage">Image:</label>
          <br>

          <input type="submit" value="Upload">
        </form>
      </div>

      @if (session('success'))
          <p style="color:green;">{{ session('success') }}</p>
      @elseif (session('error'))
          <p style="color:red;">{{ session('error') }}</p>
      @endif
</body>
</html>

    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
         <!--get role wise permissiom ajax script-->
        <script src="{{ asset('js/get-role.js') }}"></script>
    @endpush
@endsection
