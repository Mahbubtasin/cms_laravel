@include('includes.home_header')

<!-- Navigation -->
@include('includes.home_nav')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <!-- Blog Post -->

                @yield('content')

            <!-- Pager -->
            <div class="row">
                <div class="col-sm-offset-5">
                    {{$posts->render()}}
                </div>
            </div>

        </div>

        @include('includes.home_sidebar')

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
