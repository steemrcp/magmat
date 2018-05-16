<title>Signup</title>


@extends('layout.basic')
@section('content')
        <main class="page-main" id="main-content">
            <div class="columns">
                <div class="column main" role="main">
                    <section class="main-section">
                        <div class="block accounts-form-logo">
                            <img alt="" src="images/logo-account.svg"/>
                        </div>
                        <div class="block block-signup">
                            <div class="inner">
                            @include('_messages')
                                 <div class="content">
                                    <div class="inner">
                                        <h4>
                                            Sign Up
                                         </h4>

                                          <form class="" action="/create-account" method="post">

                                            {{ csrf_field() }}

                                            <div class="form-group {{ $errors->has('email')? 'has-error':''}}">
                                                <label class="sr-only" for="work_email">
                                                    Email address
                                                </label>
                                                @if(isset($_GET['email_from_home_page']))
                                                    <input name="email" value="{{ $_GET['email_from_home_page'] }}" class="form-control"  placeholder="email" disabled />
                                                @elseif(isset($_GET['email_from_footer']))
                                                    <input name="email" value="{{ $_GET['email_from_footer'] }}" class="form-control"  placeholder="email" disabled />
                                                @else
                                                     <input name="email" class="form-control" id="work_email" placeholder="Work Email" type="email">
                                                @endif

                                                </input>
                                               @if($errors->has('email'))
                                               <span class="help-block">{{ $errors->first('email') }} </span>
                                               @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('password')? 'has-error':''}}">
                                                <label class="sr-only" for="password">
                                                    Password
                                                </label>
                                                <input class="form-control" value="{{ old('password')}}"  id="password" name="password" placeholder="Password" type="password">
                                                </input>
                                                @if($errors->has('password'))
                                               <span class="help-block">{{ $errors->first('password') }} </span>
                                               @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('company')? 'has-error':''}}">
                                                <label class="sr-only" for="company_name">
                                                    Company
                                                </label>
                                                <input class="form-control" value="{{ old('company')}}" id="company_name" name="company" placeholder="Company Name" type="text">
                                                </input>
                                                @if($errors->has('email'))
                                               <span class="help-block">{{ $errors->first('company') }} </span>
                                               @endif
                                            </div>
                                             <div class="form-group  {{ $errors->has('tos')? 'has-error':''}}">

                                          <div class="checkbox">
                                              <label>
                                                  <input name="tos" type="checkbox" value=true "{{old('tos')}}">
                                                  <p style="font-size: 0.8em" class="text-muted">By activating your account, you agree to our <a href="#">terms</a> and <a href="#">privacy policy</a>.
                                                  </p>
                                                  @if($errors->has('tos'))
                                                      <span class="help-block">Please agree to the terms above creating account</span>
                                                  @endif
                                              </label>
                                          </div>
                                          </div>
                                            <div class="actions">
                                                <button class="btn btn-default" type="submit">
                                                    Create account
                                                </button>
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
