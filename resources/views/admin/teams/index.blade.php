@extends('layouts.master')
@section('content')
    <main id="main" data-aos="fade-in">
        <h4>TEAM</h4>
        <span class="ms-auto"><a href="/teams/create" class="btn btn-info btn-sm"><i class="bx bx-plus-circle"></i>Add Member</a></span>

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" style="margin-top: 10px">
            <div class="container">
                <h2>Team</h2>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= team Section ======= -->
        <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">

                <div class="row" data-aos="zoom-in" data-aos-delay="100" style="margin-bottom: 10px">
                    @foreach($teams as $team)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member border border-info">
                            <img src="{{asset('team_members/'.$team->img_url)}}" class="img-fluid" alt="">
                            <div class="member-content">
                                <h4>{{$team->name}}</h4>
                                <span>{{$team->designation}}</span>
                                <p>
                                    {{$team->description}}
                                </p>
                                <div class="social">
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-instagram"></i></a>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End team Section -->
    {{$teams->links()}}
    </main><!-- End #main -->
@endsection

@section('scripts')
    <script src="https://cdn.tiny.cloud/1/w8dqey6uixp0kz6hhgyrarwqftbqhgb56qd925sf5bednkmt/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
@endsection