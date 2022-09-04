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
                                <label for="exampleInputPassword1">Current Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Current Password" name="current_password" id="current_password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword2">New Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword2"
                                    placeholder="New Password" name="new_password" onchange="matchPassword();" id="new_password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword3">Confirm Password</label>
                                <input type="password" class="form-control" id="exampleInputConfirmPassword3"
                                    placeholder="Confirm Password" name="confirm_password" onchange="matchPassword();"
                                    id="confirm_password">
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
        function matchPassword() {
            var pw1 = document.getElementById("new_password").value;
            var pw2 = document.getElementById("confirm_password").value;
            if (pw1 == pw2) {
                alert("Password == successfully");
                console.log(pw1);

            } else {
                console.log(pw2);
                alert("Password created successfully");
            }
        }
    </script>
@endsection
