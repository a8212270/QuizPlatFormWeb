@extends('master')

@section('content')
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>qtitle</th>
                <th>answer</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>John</td>
                    <td>john@gmail.com</td>
                    <td>London, UK</td>
                </tr>
                <tr>
                    <td>Wayne</td>
                    <td>wayne@gmail.com</td>
                    <td>Manchester, UK</td>
                </tr>
                <tr>
                    <td>Andy</td>
                    <td>andy@gmail.com</td>
                    <td>Merseyside, UK</td>
                </tr>
                <tr>
                    <td>Danny</td>
                    <td>danny@gmail.com</td>
                    <td>Middlesborough, UK</td>
                </tr>
                <tr>
                    <td>Frank</td>
                    <td>frank@gmail.com</td>
                    <td>Southampton, UK</td>
                </tr>
                <tr>
                    <td>Scott</td>
                    <td>scott@gmail.com</td>
                    <td>Newcastle, UK</td>
                </tr>
                <tr>
                    <td>Rickie</td>
                    <td>rickie@gmail.com</td>
                    <td>Burnley, UK</td>
                </tr>
            </tbody>
    </table>
@stop

@section('footer')
    <script language="JavaScript">
        $(document).ready(function(){ 
          $("#users-table").dataTable();
          });
    </script>
@stop