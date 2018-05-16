<title>Signin</title>

@extends('layout.basic')
@section('content')
    <main class="page-main" id="main-conten">
        <div class="columns">
            <div class="column main" role="main">
                <section class="main-section">
                    <div class="block accounts-form-logo">
                        <img alt="" src="images/logo-account.svg"/>
                    </div>
                    <div class="block block-signin">
                        <div class="inner">
                        @include('_messages')
                            <div class="content">
                                <div class="inner">
                                    <h4>
                                        Sign In
                                    </h4>

                                      <form class="" action="account/login" method="post">
                                        <div class="form-group {{ $errors->has('email')? 'has-error':''}}">
                                            <label class="sr-only" for="work_email">
                                                Email address
                                            </label>
                                            <input class="form-control" value="{{ old('email') }}" name="email" id="work_email" placeholder="Work Email" type="email" required>
                                            </input>
                                            @if($errors->has('email'))
                                            <span class="help-block">{{ $errors->first('email') }} </span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->has('password')? 'has-error':''}}">
                                            <label class="sr-only" for="password">
                                                Password
                                            </label>
                                            <input class="form-control" value="{{ old('password') }}" name="password" id="password" placeholder="Password" type="password" required>
                                            </input>
                                            @if($errors->has('password'))
                                            <span class="help-block">{{ $errors->first('password') }} </span>
                                            @endif
                                        </div>
                                        <div class="actions">
                                            <button type="submit" class="btn btn-default">
                                                Sign In
                                            </button>
                                            <a class="forgot-password" href="/forget-password">
                                                Forgot Password?
                                            </a>
                                        </div>
                                      </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
