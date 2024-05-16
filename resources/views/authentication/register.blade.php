@extends('layouts.app')

@section('content')
    <form action="/register" method="POST">
        {{-- Name --}}
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password">
        {{-- End name --}}
        {{-- Gender --}}
        <br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female" checked>
        <label for="female">Female</label><br>
        {{-- End genders --}}

        {{-- Checkboxes --}}

        <input type="checkbox" id="privacy" name="acceptPrivacy">
        <label for="privacy">I accept the privacy policy</label><br>
        <input type="checkbox" id="newsletter" name="acceptNewsletter">
        <label for="newsletter">I agree to receive newsletter</label><br>
        {{-- End checkboxes --}}

        {{-- Submit button --}}
        <input type="submit" value="Submit">
        {{-- End submit button --}}



    </form>
@endsection
