<div class="row">
    <div class="col-6">
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-login" style="padding-top:15% ;">
                <div class="modal-content">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Login</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="email" required="required">
                            </div>
                            <div class="form-group mt-3">
                                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <label class="float-left form-check-label mt-2"><input type="checkbox" name="remember_me"> Remember me</label>
                            <a href="{{ route('register') }}" class="float-right">Create an Account</a>
                            <button type="submit" class="btn btn-primary btn-block">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
