@extends('template.painel-viagens')
@section('title', 'Painel Viagens')
@section('content')
<?php
@session_start();
if (@$_SESSION['nivel_usuario'] != 7 {
    echo "<script language='javascript'> window.location='./' </script>";
}
?>
Home da Viagens
@endsection
