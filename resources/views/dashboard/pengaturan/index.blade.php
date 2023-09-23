@include('layouts.header');
@include('layouts.sidebar');


<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                </div>
                <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
                    <h1>404</h1>
                    <h2>The page you are looking for doesn't exist.</h2>
                    <img src="{{ asset('NiceAdmin') }}/assets/img/not-found.svg" class="img-fluid py-5"
                        alt="Page Not Found">
    
                </section>

            </div>
        </div>
    </section>
</main>

@include('layouts.footer');