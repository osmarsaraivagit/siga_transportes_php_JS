@extends('template.painel-financeiro')
@section('title', 'Painel Financeiro')
@section('content')
<?php
@session_start();
if (@$_SESSION['nivel_usuario'] != 6) {
    echo "<script language='javascript'> window.location='./' </script>";
}
?>
Home da Financeiro
@endsection
    