@extends('layouts.app-fox')

@section('content')

            <div class="layout">
				<!-- Start of Sign In -->
				<div class="main order-md-1">
					<div class="start">
						<div class="container">
                        <a href="{{ url('/') }}" id="mainlogo"><img class="logo" src="{{ asset('images/company/hottestapp2.png') }}"></a>
							<div class="col-md-12">
								<div class="content">
 
                                    <form id="regForm" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    @honeypot
                                                                     
                                    
                                    <div class="tab-reg {{ $errors->has('email') ? ' active' : '' }}">
                                    <h1>Register</h1>
                                        <div class="form-group">
											<input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email Address" name="email" value="{{ old('email') }}" tabindex="3" required autofocus>
                                            <button class="btn icon"><i class="material-icons">mail_outline</i></button>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>                                       
                                  
                                        <div class="form-group">
											<input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" tabindex="5" name="password" required>
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif                                       
										<div class="form-group">
											<input type="password" id="password-confirm" class="form-control" placeholder="Repeat Password" name="password_confirmation" tabindex="6" required>
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
                                        </div>
                                    </div>                                 

                                    <!--<div class="tab-reg topper" id="model-tab">
                                   
                                        <h1>Account type</h1>
    
                                        <div id="account-type" class="btn-group toggle-tab mb-20" data-toggle="buttons">
                                            <button class="btn btn-primary" id="is-agent-btn">
                                                <input type="radio" name="agent" id="is-agent" value="agent">
                                                <div class="material-icons">assignment_ind</div>
                                                Agent
                                            </button>
                                            <button class="btn btn-primary active" id="is-user-btn">
                                                <input type="radio" name="user" id="is-user" value="user">
                                                <div class="material-icons">person</div>
                                                User
                                            </button>
                                            <button class="btn btn-primary" id="is-model-btn">
                                                <input type="radio" name="model" id="is-model" value="model">
                                                <div class="material-icons">stars</div>
                                                Model
                                            </button>
                                        </div>

                                       
                                        <p class="dec-is" id="desc-is"></p>
                                    </div> -->

                                    <div class="tab-reg topper" id="username-tab">

                                        <h1 id="title-is">Username</h1>

                                        <div class="form-group">
                                            <input type="text" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Username" name="name" value="{{ old('name') }}" tabindex="4" required>
                                            <button class="btn icon"><i class="material-icons">person_outline</i></button>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif                                            
                                        </div>   
                                                                                                                
                                    </div>  

                               
                                    <div class="tab-reg" id="age-verify">
                                    <h1>Age</h1>
                                        <div class="form-group">
											<input type="date" id="dob" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" placeholder="Birthday" name="dob" value="{{ old('dob') }}" tabindex="1" required>
                                            <button class="btn icon"><i class="material-icons">lock_outline</i></button>
                                            @if ($errors->has('dob'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('dob') }}</strong>
                                                </span>
                                            @endif                                          
                                        </div> 
                                        <p>Must be 18+ to view VIP content.</p>                                                                              
                                    </div>                                    

                                    <div style="overflow:auto;">
                                    <div>
                                        
                                        <button type="button" class="btn button w-100" id="nextBtn" onclick="nextPrev(1)" tabindex="2">Next</button>
                                        <button type="button" class="btn" id="prevBtn" onclick="nextPrev(-1)">previous</button>
                                    </div>
                                    </div>

                                    <!-- Circles which indicates the steps of the form: -->
                                    <div class="stepper">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    </div>

                                    </form>

                                        <div class="callout" id="alreadyhave">
											<span>Have an account? <a href="login">Login</a></span>
										</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sign In -->
				<!-- Start of Sidebar -->
				<div class="aside order-md-2" id="sidebar2">
					<div class="container">
						<div class="col-md-12">
							<div class="preference">
								<h2>Lookin Fire!</h2>
								<p>Already have an account?</p>
								<a href="/login" class="btn button">Sign In</a>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sidebar -->
            </div> <!-- Layout -->
            

@endsection
@section('js_after')
    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    $(document).on('click', '#nextBtn', function (e) {
        if($(this).text() === 'Register') {
            $('#regForm').submit();
        }

        // TODO: Robert I had to move this up here that way I know when they are registering.
        // When it was below it would call "DONE REGISTERING!" before it was done because the button
        // would change it's text to Register before the click was detected so it thought
        // it was clicking Register, if that makes sense lol
        var x = document.getElementsByClassName("tab-reg");
        if(currentTab == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Register";
        }
    });

    function showTab(n) {
      // This function will display the specified tab of the form ...
      var x = document.getElementsByClassName("tab-reg");
      x[n].style.display = "block";
      // ... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
        document.getElementById("sidebar2").classList.remove('hidden');
        document.getElementById("mainlogo").classList.remove('hidden');
      } else {
        document.getElementById("prevBtn").style.display = "inline";
        document.getElementById("sidebar2").classList.add('hidden');
        document.getElementById("alreadyhave").style.display = "none";
        document.getElementById("mainlogo").classList.add('hidden');

      }

      if (n != (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Continue";
      }

      // ... and run a function that displays the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab-reg");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form... :
      if (currentTab >= x.length) {
        //...the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab-reg");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
            // TODO: Rob I had to comment this out, kept throwing errors
          // y[i].className += " is-invalid";
          // and set the current valid status to false:
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class to the current step:
      x[n].className += " active";
    }

    </script>
@endsection
