
<h2>Join Us Today</h2>
<img id="bcLogo" src="{{ asset('/favicon.png') }}" 
    alt="Business Comparison Logo." width="50" height="50"/>
<form action="{{ route('signup') }}" method="POST" enctype="multipart/form-data">
           
    @csrf

    <label>First Name:
        <input 
        class="field" 
        type="text" 
        name="first_name" 
        value="{{ old('first_name') }}"
        placeholder="Max">
        @error('first_name')
            <div class="error">{{ $message }}</div>
        @enderror
    </label>

    <label>Last Name:
        <input 
        class="field" 
        type="text" 
        name="last_name" 
        value="{{ old('last_name') }}"
        placeholder="Thomas">
        @error('last_name')
            <div class="error">{{ $message }}</div>
        @enderror
    </label>

    <label>Email:
        <input 
        class="field" 
        type="email" 
        name="email" 
        value="{{ old('email') }}"
        placeholder="your@email.com">
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
    </label>

    <label>Confirm Email:
        <input 
        class="field" 
        type="email" 
        name="email_confirmation" 
        value="{{ old('email_confirmation') }}"
        placeholder="your@email.com">
        @error('email_confirmation')
            <div class="error">{{ $message }}</div>
        @enderror
    </label>

    <label>Password:
        <input 
        class="field" 
        type="password" 
        name="password">
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror
    </label>

    <label>Confirm Password:
        <input 
        class="field" 
        type="password" 
        name="password_confirmation">
        @error('password_confirmation')
            <div class="error">{{ $message }}</div>
        @enderror
    </label>

    <label>Profile Image:
        <input 
        class="field" 
        type="file" 
        name="profile_image"
        required>
        @error('profile_image')
            <div class="error">{{ $message }}</div>
        @enderror
    </label>

    <p id="viewTerms">Click Here to Read our Terms and Conditions.</p>
    <label class="termsCheck">
        I accept the Terms and Conditions.
        <input 
        type="checkbox" 
        name="terms_and_conditions" 
        {{ old('terms_and_conditions') ? 'checked' : '' }}>      
        @error('terms_and_conditions')
            <div class="error">{{ $message }}</div>
        @enderror
    </label>
    <br>

    <input class="submitBtn" type="submit" value="Create Account">
</form>
<div id="terms-modal" class="modal">
    <div class="modal-content">
        <span id="close-modal" class="close-btn">&times;</span>
        @include('/form/termsconditions')
    </div>
</div>