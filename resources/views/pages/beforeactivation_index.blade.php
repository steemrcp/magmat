@extends('layouts.app-beforeactivation')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="block block-expenses-general">

        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="column main" role="main">
            @yield('page')
        </div>
    </div>
</div>

<main id="main-content" class="page-main">
    <div class="columns">
        <div class="column main" role="main">
            <section class="main-section">

                <div class="block block-vendors-add">
                    <h2>Welcome to Magmat</h2>

                    <br>
                    <div class="alert alert-danger"

                        <p>Activate your account to start using Magmat</p>
                        <p style="size: 12px">To activate, login to your email and click on the activation button</p>
                      <p>

                      <form class="" action="account/activate/resend" method="post">
                          <button type="submit">Resend Activation Link</button>
                      </form>

                      </p>
                    </div>
                </div>

            </section>
        </div>
    </div>
</main>
@endsection


@section('after_scripts')
<script>
    $(function() {
        $('.sites-toggle').dropdown();
    });
    $(function() {
        $('.top-info-toggle').dropdown();
    });
</script>

<script type="text/javascript">


</script>

@endsection
