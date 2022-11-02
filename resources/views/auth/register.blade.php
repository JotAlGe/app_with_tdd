<form action="{{ route('register') }}" method="post">
    @csrf
    <label>
        Name:
        <input type="text" name="name">
        @error('name')
        {{ $message }}
        @enderror
    </label>
    <label>
        Email:
        <input type="email" name="email">
        @error('email')
        {{ $message }}
        @enderror
    </label>
    <label>
        Password:
        <input type="password" name="password">
        @error('password')
        {{ $message }}
        @enderror
    </label>
    <label>
        Password Confirmation:
        <input type="password" name="password_confirmation">
        @error('password_confirmation')
        {{ $message }}
        @enderror
    </label>
    <button type="submit">Register</button>
</form>
