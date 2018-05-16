<title>Signup</title>

@extends('layout.basic')
@section('content')
    <main id="main-content" class="page-main">
        <div class="columns">
            <div class="column main" role="main">
                <section class="main-section">
                    <div class="block accounts-form-logo">

                    </div>
                    <div class="block  block-create-account">
                        <div class="inner">
                        @include('_messages')
                            <div class="content">
                                <div class="inner">
                                    <h4>Please enter your correct details</h4>

                                        <div class="form-group">
                                          <label class="sr-only" for="email">Name</label>
                                          <input type="email" value="{{ Auth::user()->email}}" class="form-control" id="email" placeholder="email" disabled>
                                        </div>

                                        <form class="form-group" action="account/update-basic" method="post">
                                          <div class="form-inline">
                                              <div class="form-group">
                                                  <label class="sr-only" for="first_name">Name</label>
                                                  <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control" id="exampleInputNamel3" placeholder="First Name">
                                              </div>
                                              <div class="form-group">
                                                  <label class="sr-only" for="last_name">Last Name</label>
                                                  <input type="text" name="last_name"  value="{{old('last_name')}}" class="form-control" id="exampleInputLastName3" placeholder="Last Name">
                                              </div>
                                          </div>
                                          <div class="actions">
                                              <button type="submit" class="btn btn-default">Update</button>
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
