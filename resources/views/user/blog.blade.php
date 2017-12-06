@extends('user.layouts.app')
@section('bg-img', asset('user/img/home-bg.jpg'))
@section('heading','Creative Learning Post')
@section('sub-heading','Learning is continuous process to death')
@section('css')
<style>
.pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: .25rem;
}
.pagination li {
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #0275d8;
    background-color: #fff;
    border: 1px solid #ddd;
}
</style>
@endsection

@section('main-content')
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($posts as $post)
                <div class="post-preview">
                    <a href="{{ route('user.post.show',$post->slug) }}">
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $post->subtitle }}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">Start Bootstrap</a>
                    on {{ $post->created_at->diffForHumans() }}</p>
                </div>
                <hr>
            @endforeach
            <!-- Pager -->
            <div class="clearfix">
                {{ $posts->links() }}                
            </div>
        </div>
    </div>
</div>
<hr>
@endsection