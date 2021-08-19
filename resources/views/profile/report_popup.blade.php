<!-- Modal -->
<div id="ReportModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <form id="reportForm" method="POST" action="">
                    <div class="container report-form">
                        <h4>Report Profile</h4>
                        <p>We won't tell Username</p>

                        <ul class="report tab-report">
                            <li class="reportBtn" onclick="nextPrev(1)" tabindex="2" data-reason="0">
                                <ul class="avatars">
                                    <li>
                                        <button class="btn round-icon"><i data-eva="message-square-outline"></i>
                                        </button>
                                    </li>
                                </ul>
                                <div class="meta">
                                    <h5>Innappropriate Messages</h5>
                                </div>
                            </li>
                            <li class="reportBtn" onclick="nextPrev(1)" tabindex="2" data-reason="1">
                                <ul class="avatars">
                                    <li>
                                        <button class="btn round-icon"><i data-eva="image-outline"></i></button>
                                    </li>
                                </ul>
                                <div class="meta">
                                    <h5>Innappropriate Photos</h5>
                                </div>
                            </li>
                            <li class="reportBtn" onclick="nextPrev(1)" tabindex="2" data-reason="2">
                                <ul class="avatars">
                                    <li>
                                        <button class="btn round-icon"><i data-eva="alert-circle-outline"></i></button>
                                    </li>
                                </ul>
                                <div class="meta">
                                    <h5>Feels like Spam</h5>
                                </div>
                            </li>
                            <li class="reportBtn" onclick="nextPrev(1)" tabindex="2" data-reason="3">
                                <ul class="avatars">
                                    <li>
                                        <button class="btn round-icon"><i data-eva="alert-triangle-outline"></i>
                                        </button>
                                    </li>
                                </ul>
                                <div class="meta">
                                    <h5>Other</h5>
                                </div>
                            </li>
                        </ul>


                        <ul class="report tab-report">
                            <li id="blockBtn">
                                <ul class="avatars">
                                    <li>
                                        <button class="btn round-icon"><i data-eva="close-outline"></i></button>
                                    </li>
                                </ul>
                                <div class="meta">
                                    <h5>Block Profile</h5>
                                    <span>Do not show profile</span>
                                </div>
                            </li>
                            <li id="reportBtn">
                                <ul class="avatars">
                                    <li>
                                        <button class="btn round-icon"><i data-eva="alert-circle-outline"></i></button>
                                    </li>
                                </ul>
                                <div class="meta">
                                    <h5>Report Profile</h5>
                                    <span>Do nothing and report to us</span>
                                </div>
                                <div class="meta">
                                    <input type="text" >
                                </div>
                            </li>
                        </ul>
                        <hr>
                        <div style="overflow:auto;">
                            <div>

                                <button type="button" class="btn button w-100" id="nextBtn" data-dismiss="modal"
                                        aria-label="Cancel">Cancel
                                </button>
                                <button type="button" class="btn button w-100" id="prevBtn" onclick="nextPrev(-1)"
                                        data-dismiss="modal" aria-label="Cancel">Cancel
                                </button>
                            </div>
                        </div>

                        <!-- Circles which indicates the steps of the form: -->
                        <div class="stepper hidden">
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>


@if(isset($model))
<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    var profile_id = '{{ $model->getUser()->id }}';
    var reason = -1;

    // TODO: Maybe implement where they can type something with other? IDK probs not
        // We could but lots of other stuff to do first!
    $(document).on('click', '#reportBtn', function (e) {
        $('#ReportModal').modal('hide');
        // TODO: EzPzzz
        nextPrev(-1);

        $.ajax({
            url: '/report_profile',
            type: 'POST',
            dataType: 'json',
            data: {
                profile_id: profile_id,
                reason: reason,
                _token: token
            },
        }).done(function (msg) {
            if(msg['success']) {
                Swal.fire({
                    type: 'success',
                    title: 'Success',
                    text: 'This model has been reported successfully. Thank you for your help.',
                });
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: msg['msg'],
                });
            }
        });
    });

    $(document).on('click', '.reportBtn', function (e) {
        reason = $(this).attr('data-reason');
    });

    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab-report");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").classList.add('hidden');
            document.getElementById("nextBtn").classList.remove('hidden');
        } else {
            document.getElementById("prevBtn").classList.remove('hidden');
            document.getElementById("nextBtn").classList.add('hidden');

        }

        if (n != (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Cancel";
        }

        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab-report");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            document.getElementById("reportForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab-report");
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
@endif