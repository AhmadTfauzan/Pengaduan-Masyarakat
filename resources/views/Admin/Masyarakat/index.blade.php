@extends('layouts.admin')

@section('title', 'Halaman Masyarakat')

@section('css')
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Masyarakat')

@section('content')
   <table id="masyarakatTable" class="table">
      <thead>
         <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Telp</th>
            <th>Detail</th>
            <th>Action</th> {{-- Add a new column for the delete button --}}
         </tr>
      </thead>
      <tbody>
         @foreach ($masyarakat as $k => $v)
            <tr>
               <td>{{ $k += 1 }}</td>
               <td>{{ $v->nik }}</td>
               <td>{{ $v->nama }}</td>
               <td>{{ $v->username }}</td>
               <td>{{ $v->telp }}</td>
               <td><a href="{{ route('masyarakat.show', $v->nik) }}" style="text-decoration: none">LIHAT</a></td>
               <td>
                  {{-- Add the delete button with a form for each row --}}
                  <form action="{{ route('masyarakat.destroy', $v->nik) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger">DELETE</button>
                  </form>
               </td>
            </tr>
         @endforeach
      </tbody>
   </table>
@endsection

{{-- Javascript --}}
@section('js')
   <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
   <script>
      $(document).ready(function () {
         $('#masyarakatTable').DataTable();
      });
   </script>
@endsection
