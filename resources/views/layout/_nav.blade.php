<nav>
    <ul>
        <li>
            <a href="{{url('/about')}}">
                About
            </a>
        </li>
        <li>
            <a href="{{url('/pricing')}}">
                Pricing
            </a>
        </li>
        <li>
            <a href="{{url('/sign-in')}}">
                Sign in
            </a>
        </li>
    </ul>
    <a class="btn {{url('/about')? 'btn-primary-light': 'btn-primary' }} sign-in" href="{{url('/sign-up')}}">
        Sign up
    </a>
</nav>
