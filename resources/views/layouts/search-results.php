@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            
            <h1>Posts</h1>  

            @if(count($results) > 0)
           
                    <div class="table-responsive">          
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->title}}</td> 
                                </tr>
                            @endforeach
                            </tbody>    
                        </table>
                    </div>
            @else
                <p>Sorry, no results found.</p>
            @endif

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

@endsection