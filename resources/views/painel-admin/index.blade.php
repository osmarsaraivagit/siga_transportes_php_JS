@extends('template.painel-admin')
@section('title', 'Painel Administrativo')
@section('content')
<?php
@session_start();
if (@$_SESSION['nivel_usuario'] != 1) {
    echo "<script language='javascript'> window.location='./' </script>";
}
?>
Home do Admin
@endsection
