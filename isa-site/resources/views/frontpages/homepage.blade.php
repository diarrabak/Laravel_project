@extends('layouts.app')

@section('content')

<div class="header">
    <img class="department-image home-page" src="/storage/images/doSRplUaMEZvGtbU6xU6Nu2T0j9v0YHuaPV5lmBy.jpg" alt='home page image' />

    <h1 class="department depart-header front">Welcome to ISA Mali</h1>
    <p class="department depart-desc">Hello</p>
</div>
<!--div>
    <p> Here {{session('email')}}</p>
    <p> Here {{session('name')}}</p>
    @if(null!==session('roles') && count(session('roles'))>=1)
     @for($i=0; $i< count(session('roles')); $i++)
    <p> Here {{session('roles')[$i]}}</p>
    @endfor
    @endif

</div-->
<article class="presentation">
    <h2 class="col-12">Welcome message from Prof Kone, the director</h2>
    <img src="/storage/images/niGhc5Bqgtm1EFCSQOQP2PGrmVMuhTQ8Pz3m0tSh.jpg" alt='Picture of the director' />

    <p class="director-message">
        The Institute of Applied Sciences (ISA) of the University of Sciences, Techniques and Technologies of Bamako (USTTB) offers professional license-level training programs covering the field of applied sciences.
        These programs correspond to the needs of the national economy and to the most exciting jobs in Mali: those in industry, services and laboratories.
        Since its creation in 2011, ISA has been committed to providing its future graduates with a good training in the field of Applied Sciences in addition
        to learning about working methods in companies. The institute also offers continuous training to personnel in industries, laboratories and services,
        which allows them to acquire new skills and increase the performance of national and international companies working in Mali.
        Dear future students, with a competent and experienced faculty, ISA aims to prepare for your future by offering you quality and recognized training,
        corresponding to your aspirations in order to promote your integration into a heterogeneous and evolving professional world.
    </p>
</article>

<div class="row">

    <h2 class="col-12"> Discover our institute</h2>

    <article class="card col-sm-10 col-md-5 col-lg-4">
        <img class="card-img-top" src="/storage/images/2p8Xu5knOY2D7rLGNc9JP6Zk2WzmS4kUKY3dPSe1.jpg" alt='Departments' />
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('departments.index') }}"> Departments </a></h5>

        </div>


    </article>

    <article class="card col-sm-10 col-md-5 col-lg-4">
        <img class="card-img-top" src="/storage/images/jTjPP9wqIhh6zYRlNv40fz7Gw6gbEw1ka4u0UvgP.jpg" alt='Laboratories' />
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('laboratories.index') }}"> Laboratories</a></h5>

        </div>


    </article>

    <article class="card col-sm-10 col-md-5 col-lg-4">
        <img class="card-img-top" src="/storage/images/vphoP1ANXVt38TLFEOEBuc1e55iUvOnUeZZdphJG.png" alt='Academic groups' />
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('academicgroups.index') }}"> Academic groups</a></h5>

        </div>


    </article>

</div>


<div class="row">

    <h2 class="col-12"> Students corner</h2>

    <article class="card col-sm-10 col-md-5 col-lg-4">
        <img class="card-img-top" src="/storage/images/admission.jpg" alt='Admission to the programs' />
        <div class="card-body">
            <h5 class="card-title"><a href="{{ url('/student') }}"> Admissions </a></h5>

        </div>


    </article>

    <article class="card col-sm-10 col-md-5 col-lg-4">
        <img class="card-img-top" src="/storage/images/new-main.jpg" alt='news from the school' />
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('informations.index') }}"> News</a></h5>

        </div>


    </article>

    <article class="card col-sm-10 col-md-5 col-lg-4">
        <img class="card-img-top" src="/storage/images/alumni.jpg" alt='Alumni picture' />
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('testimonials.index') }}"> Alumni</a></h5>

        </div>


    </article>

</div>
@endsection