@extends('layouts.app')
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
                    <p>You have not been added to any department, please contact the administrator.</p>
                    <!-- <a href="/settings/departments"><button type="button" class="btn btn-default">Add a department</button></a> -->
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

@endsection
