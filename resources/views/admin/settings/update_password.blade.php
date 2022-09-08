@extends('admin.inc.layout')
@section('update_password')
    active
@endsection
@section('content')
    <!-- partial -->
    <div class="content-wrapper">
        <h4 class="card-title">Settings</h4>
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-description">
                            Password Update form
                        </p>
                        <form class="forms-sample" method="post" action={{ url('admin/settings/password_update') }}>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Name"
                                    value="{{ $adminDetails['name'] }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email"
                                    value="{{ $adminDetails['email'] }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsertype1">Type</label>
                                <input type="text" class="form-control" id="exampleInputUsertype1" placeholder="Type"
                                    value="{{ $adminDetails['type'] }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" class="form-control" placeholder="Current Password"
                                    name="current_password" id="current_password">
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" placeholder="New Password" name="new_password"
                                    onchange="matchPassword();" id="new_password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm Password"
                                    name="confirm_password" onchange="matchPassword();" id="confirm_password">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection

@section('script')
    <script>
        // function matchPassword() {
        //     var pw1 = document.getElementById("new_password");
        //     var pw2 = document.getElementById("confirm_password");
        //     if (pw1.value != pw2.value) {
        //         pw1.style.border = "1px solid #ff0000";
        //         pw2.style.border = "1px solid #ff0000";
        //     } else {
        //         pw1.style.border = "1px solid #00ff00";
        //         pw2.style.border = "1px solid #00ff00";
        //     }
        // }

        $(document).ready(function() {
            $("#current_password").keyup(function() {
                var current_password = $("#current_password").val();
                $.ajax({
                    type: 'post',
                    url: 'admin/settings/check-current-password',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        current_password: current_password
                    },
                    success: function(data) {
                        console.log("ready!");
                        alert(data);
                    },
                    error: function() {
                        alert("Error");
                        console.log("Error!");
                    }
                });
            })
        });
    </script>
@endsection
