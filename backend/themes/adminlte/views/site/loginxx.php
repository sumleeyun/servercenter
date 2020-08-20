



<div class="container-fluid h-100 login_page">
            <div class="row h-100 align-items-center justify-content-center">
        <div class="col-md-6"><div class="pr-4">
 <img src="/static/img/login.svg?ver=41500" alt="Login">
</div>
</div>
        <div class="col-md-3">
            <div class="panel-header text-color h4"><i class="app-icon pg-icon"></i> pgAdmin 4</div>
            <div class="panel-body">
                <div class="d-block text-color pb-3 h5">Login</div>
                <form action="/login" method="POST" name="login_user_form">
    <input id="next" name="next" type="hidden" value="/">
<input id="csrf_token" name="csrf_token" type="hidden" value="IjZmZTg1YzFhZTI2YmQ2NDM1ZmZhNDY2OTQ1YjlmNDgzZGM0MmU2NzQi.XpqY9g.Eg_QG5rEDBqYJt_GFO4BcUOV3eY">
        <div class="form-group mb-3 ">
    <input class="form-control" placeholder="Email Address" name="email" type="text" autofocus="">
    </div>

    <div class="form-group mb-3 ">
    <input class="form-control" placeholder="Password" name="password" type="password" autofocus="">
    </div>

    <button class="btn btn-primary btn-block btn-login" type="submit" value="Login">Login</button>
    <div class="form-group row mb-3 c user-language">
        <div class="col-7"><span class="help-block"><a href="/browser/reset_password" class="text-white">Forgotten your password</a>?</span></div>
        <div class="col-5">
            <select class="form-control" name="language" value="en">
                                <option value="en" selected="">English</option>
                                <option value="zh">Chinese (Simplified)</option>
                                <option value="fr">French</option>
                                <option value="de">German</option>
                                <option value="it">Italian</option>
                                <option value="ja">Japanese</option>
                                <option value="ko">Korean</option>
                                <option value="pl">Polish</option>
                                <option value="ru">Russian</option>
                                <option value="es">Spanish</option>
                             </select>
        </div>
    </div>
</form>
            </div>
        </div>
    </div>
</div>